<?php

namespace App\Http\Controllers;

use App\Events\AppraisalCompleteEvent;
use App\Events\EmployeeAppraised;
use App\Events\EmployeeApproved;
use App\Events\PendingAppraisals;
use App\Models\Appraisal;
use App\Models\AppraisalTimeline;
use App\Models\Employee;
use App\Models\EmployeeComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class EmployeeAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $i=0;
        global $status;
        $status ='';
        if(Auth::user()){
            $appraisals = Appraisal::whereEmployeeId(Auth::user()->employee_id)->where('year', Carbon::now()->year)->get();
            $timeline = AppraisalTimeline::latest()->first();
            if(count($appraisals) >= 1 || (Carbon::now()->month > $timeline->end_month || Carbon::now()->month < $timeline->start_month )){
                $status = "Appraisal forms Locked. Check again next year";
            }
            $employee = Auth::user()->load('department');
            $department =$employee->department()->with('kpis')->first();
            return view('client.employee', compact(['employee', 'department', 'i', 'status']));
        }

        return redirect('/login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       $appraisal = Auth::user()->appraisals()->create(['supervisor_id'=>Auth::user()->supervisor_id,
           'date_of_appraisal'=>Carbon::now(),'year'=> Carbon::now()->isoFormat('YYYY') ,'status'=>'Pending']);
       $appraisal->employeescores()->create($request->all());
       $supervisor = Employee::whereEmployeeId(Auth::user()->supervisor_id)->first();
       if($supervisor){
         PendingAppraisals::dispatch($supervisor);
           return redirect('/home');
       }

       flash('Scores submitted successfully.')->success();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param $emp_appraise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($emp_appraise)
    {

        $appraisal = Appraisal::whereId($emp_appraise)->with('supervisorscores')->first() ;
        $sup_rating = $appraisal->sup_rating;
         $supervisor_scores = $appraisal->supervisorscores()->first();
         $sumScores = $supervisor_scores->score_1+$supervisor_scores->score_2+
                      $supervisor_scores->score_4+$supervisor_scores->score_4+
                      $supervisor_scores->score_5;
         $avg = $sumScores/5;
        $employee_scores = $appraisal->employeescores()->first();
        $appraisal->load('comment.supervisor_comment');
        $sup_comment = $appraisal->comment->filter(function($comment){
            if($comment->supervisor_comment !== null ){
                return $comment;
            }
        });
        $sup_comment = $sup_comment->all();
        $sup_comment = $sup_comment[0];

         return view('client.dashboards.show_evaluated', compact(['supervisor_scores', 'employee_scores', 'sumScores', 'avg', 'sup_comment', 'sup_rating']));
    }


    public function showdisapproval($emp_appraise){
        $appraisals = Appraisal::whereId($emp_appraise)->whereStatus('Disapproved')->with('supervisorscores')->get() ;
        $comment = EmployeeComment::where('appraisal_id', $appraisals->id);
        $supervisor_scores = $appraisals->supervisorscores()->first();
        $employee_scores = $appraisals->employeescores()->first();
        return view('client.dashboards.disapproved',compact(['supervisor_scores', 'employee_scores', 'comment']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $emp_appraise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $emp_appraise)
    {
            $appraisal = Appraisal::find($emp_appraise);
            $employee = Employee::where('employee_id', $appraisal->supervisor_id)->first();
             AppraisalCompleteEvent::dispatch($appraisal);
             EmployeeApproved::dispatch($employee);

            return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchToBeApprovedAppraisals(){
        $appraisal = Auth::user()->appraisals()->whereStatus('Evaluated')->first();

            return view('client.dashboards.approve', compact('appraisal'));


    }

    public function getDisapprovedAppraisals(){
        $appraisals = Auth::user()->appraisals()->whereStatus('Disapproved')->with('supervisorscores', 'employeescores')->get();
            return view('client.dashboards.disapproved', compact('appraisals'));


    }

    public function pendingAppraisals(){
        $appraisals = Auth::user()->appraisals()->whereStatus('Pending')->get();
        return view('client.dashboards.pending', compact('appraisals'));


    }

    public function getApprovedAppraisals(){
       $appraisals = Appraisal::where(function($query){
           $query->where('employee_id', Auth::user()->employee_id);
               $query->where('status', 'Completed');
        })->orWhere(function($query){
            $query->where('employee_id', Auth::user()->employee_id);
            $query->where('status', 'Disapproved');
        })->get();

        return view('client.dashboards.approved', compact('appraisals'));


    }

    public function appraisalDetails($id){
        $appraisal = Appraisal::whereId($id)->first();
        $sup_rating = $appraisal->sup_rating;
        $appraisal->load('employeescores', 'supervisorscores', 'comment.employee_comment', 'comment.supervisor_comment');
        $employee_scores = $appraisal->employeescores;
        $supervisor_scores = $appraisal->supervisorscores;
        $sumScores = $supervisor_scores->score_1+$supervisor_scores->score_2+
            $supervisor_scores->score_4+$supervisor_scores->score_4+
            $supervisor_scores->score_5;
        $avg = $sumScores/5;
        $emp_comment =$appraisal->comment->filter(function($comment){
            if($comment->employee_comment !== null ){
                return $comment;
            }
        });
        $sup_comment = $appraisal->comment->filter(function($comment){
            if($comment->supervisor_comment !== null ){
                return $comment;
            }
        });

        $sup_comment = $sup_comment->all();
        $sup_comment = $sup_comment[0];


        return view('client.dashboards.disapproved_details', compact(['employee_scores','supervisor_scores',
            'sumScores', 'avg', 'emp_comment', 'sup_comment', 'sup_rating']));
    }

    public function pendingDetails($id){
        $appraisal = Appraisal::whereId($id)->first();
        $appraisal->load('employeescores');
        $employee_scores = $appraisal->employeescores;
        return view('client.dashboards.pending_details', compact(['employee_scores']));
    }



}
