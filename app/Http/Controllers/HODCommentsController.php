<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Comment;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HODCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id)
    {
        $comment = Comment::create(['appraisal_id'=>$id]);
        $comment->h_o_d_comment()->create(['message'=>$request->message]);
        $appraisal = Appraisal::find($id);
        $appraisal->hod_commented = 1;
        if($request->promotion_status){
            $appraisal->promotion_status = $request->promotion_status;
        }
        $appraisal->save();
        return redirect('/hod_comments_list');
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

    public function displayDepartments()
    {
        $departments = Department::all();
        return view('client.dashboards.hod_comment', compact('departments'));
    }

    public function empAppraisalDetails($id){
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

        return view('client.dashboards.hod_comment_form', compact(['employee_scores','supervisor_scores',
            'sumScores', 'avg', 'emp_comment', 'sup_comment', 'appraisal','sup_rating']));
    }

    public function hod_comments_list()
    {
        $appraisals = array();
        $department = Department::find(Auth::user()->department_id);

        foreach ($department->employees as $employee) {
            if (count($employee->appraisals) > 0) {
                $appraisal = Appraisal::whereEmployeeId($employee->employee_id)->where(function ($query) {
                    $query->whereStatus('Completed')
                        ->where('hod_commented',"0")
                        ->where(function ($query) {
                            $query->where('year', Carbon::now()->year);
                        })->orWhere(function ($query) {
                            $query->whereStatus('Disapproved')
                                ->where('hod_commented',"0")
                                ->where(function ($query) {
                                    $query->where('year', Carbon::now()->year);
                                });
                        });
                })->first();
                array_push($appraisals, $appraisal);

            }
        }

        return view('client.dashboards.hod_comments_appraisal_list', compact('appraisals'));
    }


}
