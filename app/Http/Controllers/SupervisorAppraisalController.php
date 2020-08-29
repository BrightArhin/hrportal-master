<?php

namespace App\Http\Controllers;

use App\Events\AppraisalEvaluatedEvent;
use App\Events\EmployeeAppraised;
use App\Events\SupervisorAppraised;
use App\Events\YearlyAppraisal;
use App\Listener\SendReminder;
use App\Listener\UpdateAppraisalStatus;
use App\Models\Appraisal;
use App\Models\Comment;
use App\Models\Department;
use App\Models\Employee;
use App\Models\SupervisorScore;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorAppraisalController extends Controller
{

    public function __construct()
    {
        $this->middleware('isSupervisor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $i=0;
        if(Auth::user()){
            $employee = Auth::user()->load('department');
            $department =$employee->department()->with('kpis')->first();
            $employees = Auth::user()->load(['employees.appraisals' => function($query){
                $query->where('status', 'Pending')->orderBy('created_at', 'desc');
            }]);

            $emp= $employees->employees->map(function($item){
                return $item;
            });


            $appraisals =  $emp->flatMap(function($item){
                return $item->appraisals->all();
            });

//        dd($appraisals);

            return view('client.dashboards.evaluate', compact(['appraisals', 'department', 'i']));
        }
        return redirect('/');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function getEmployeeAppraisalForm($id){
        $i=0;
        $appraisal =Appraisal::find($id)->load('employee','employeescores');
        $employeescores = $appraisal->employeescores;
        $employee = $appraisal->employee;
        $appraisal_id = $appraisal->id;
        return view('client.supervisor_employee', compact(['employee', 'appraisal_id', 'employeescores']));
    }

    public function storeEmployeeAppraisal(Request $request){

        $appraisal = Appraisal::find($request->appraisal_id);
        $employee = Employee::whereEmployeeId($appraisal->employee_id)->first();
        if($request->development_prospects !=  '' || $request->require_training !=  ''){
            $comment = $appraisal->comment()->create();
            $comment->supervisor_comment()->create(['development_prospects'=>$request->development_prospects,
                'require_training'=>$request->require_training]);
        }

        $supScore = new SupervisorScore();
        $supScore->create($request->except(['development_prospect', 'require_training']));

        AppraisalEvaluatedEvent::dispatch($appraisal);
        EmployeeAppraised::dispatch($employee);

        return redirect('client/sup_appraise ');
    }

    public function getAppraisedEmployees(Request $request){

        global $i;
        $i =0;
        $department = Department::whereId(Auth::user()->department_id)->first();
        $employees = $department->load(['employees.appraisals'=> function($query)  {
            $query->where('status', 'Completed')->where(function ($query)  {
                $query->where('year',Carbon::now()->year);
            })->orwhere(function($query){
                $query->where('status', 'Disapproved')->where(function ($query){
                    $query->where('year',Carbon::now()->year);
                });
            });
        }]);


        $the_employee_list = $employees->employees->filter(function($employee){
            if(!$employee->appraisals->isEmpty()){
                return $employee;
            }
        });
        $employee_list = array_values($the_employee_list->all());


        $the_appraisals = array();
        foreach ($employee_list as $list){
            array_push($the_appraisals, $list->appraisals[0]);
        }
        $supComments = array();
        $commitee_recommendation = array();
        $hod_comments = array();
        foreach ($the_appraisals as $appraisal){
            $comments = $appraisal->comment()->get();
            foreach ($comments as $comment){
                $appraisal = Appraisal::whereId($comment->appraisal_id)->first();
                $employee = $appraisal->employee()->first();
                if($comment->supervisor_comment){
                    $sup_comment = $comment->supervisor_comment()->first();
                    if($sup_comment->require_training !== ''){
                        if(!isset($supComments[$employee->employee_id])){
                            $supComments[$employee->employee_id] = $sup_comment->require_training;
                        }
                    }
                }
                if($comment->commitee_recommendation){
                    $recommendation = $comment->commitee_recommendation()->first();
                    if(!isset($commitee_recommendation[$employee->employee_id])){
                        $commitee_recommendation[$employee->employee_id] = $recommendation->recommendation;
                    }
                }

                if($comment->h_o_d_comment){
                    $hd_comment = $comment->h_o_d_comment()->first();
                    if(!isset($hod_comments[$employee->employee_id])){
                        $hod_comments[$employee->employee_id] = $hd_comment->message;
                    }
                }
            }
        }

       return view('client.dashboards.appraisal_report',compact(['employee_list', 'supComments' ,'the_appraisals', 'i', 'commitee_recommendation', 'hod_comments']));
    }

    public function searchForReport(Request $request){

        global $year;
        global $not_found;
        global $i;
        $i =0;
        $year = trim($request->year);
        $department = Department::whereId(Auth::user()->department_id)->first();
        $employees = $department->load(['employees.appraisals'=> function($query) use ($year) {
            $query->where('status', 'Completed')->where(function ($query) use ($year) {
                $query->where('year',$year);
            })->orwhere(function($query) use ($year) {
                $query->where('status', 'Disapproved')->where(function ($query) use ($year) {
                    $query->where('year',$year);
                });
            });
        }]);

        $the_employee_list = $employees->employees->filter(function($employee){
            if(!$employee->appraisals->isEmpty()){
                return $employee;
            }
        });

        $employee_list = array_values($the_employee_list->all());

        $the_appraisals = array();
        foreach ($employee_list as $list){
            array_push($the_appraisals, $list->appraisals[0]);
        }

       if(sizeof($the_appraisals) == 0){
           $not_found = 'No records found for '.$year;
       }

        $supComments = array();
        $commitee_recommendation = array();
        foreach ($the_appraisals as $appraisal){
            $comments = $appraisal->comment()->get();
            foreach ($comments as $comment){
                $appraisal = Appraisal::whereId($comment->appraisal_id)->first();
                $employee = $appraisal->employee()->first();
                if($comment->supervisor_comment){
                    $sup_comment = $comment->supervisor_comment()->first();
                    if($sup_comment->require_training !== ''){
                        if(!isset($supComments[$employee->employee_id])){
                            $supComments[$employee->employee_id] = $sup_comment->require_training;
                        }
                    }
                }
                if($comment->commitee_recommendation){
                    $recommendation = $comment->commitee_recommendation()->first();
                    if(!isset($commitee_recommendation[$employee->employee_id])){
                        $commitee_recommendation[$employee->employee_id] = $recommendation->recommendation;
                    }
                }
            }
        }

        return view('client.dashboards.appraisal_report',compact(['employee_list', 'supComments' ,'the_appraisals', 'i','commitee_recommendation', 'not_found']));
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

    public function sendAppraisalAlerts(){
        $message = '';
        $employees = Employee::all();
        foreach ($employees as $employee){
            try {
                YearlyAppraisal::dispatch($employee);
                $message = 'Email Alerts sent successfully';
            }catch (Exception $e){
                $message = 'There was an error sending the message';
            }
        }
        return response()->json(['message' => $message]);
    }

    public function getReports(){
        return view('client.dashboards.report_list');
    }

    public function changeRating(Request $request){
      $appraisal = Appraisal::find($request->id);
        if($request->sup_rating == null){
            $appraisal->sup_rating = NULL;
            $appraisal->save();
        } else{
          $appraisal->sup_rating = $request->sup_rating;
          $appraisal->save();
      }

      return response()->json(['message'=>$request->sup_rating]);
    }

    public function updateAverageCount(Request $request){
        $appraisal = Appraisal::find($request->id);
        $appraisal->average = $request->average;
        $appraisal->kpi_count = $request->count;
        $appraisal->save();
        return response()->json(['message'=>'Appraisal updated']);
    }
}
