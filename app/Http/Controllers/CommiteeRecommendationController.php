<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Comment;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class CommiteeRecommendationController extends Controller
{

    public function showdepartments()
    {
        $departments = Department::all();
        return view('client.dashboards.commitee_recommendation', compact('departments'));
    }

    public function recommendation_list($id)
    {
        $appraisals = array();
        $department = Department::find($id);

        foreach ($department->employees as $employee) {
            if (count($employee->appraisals) > 0) {
                $appraisal = Appraisal::whereEmployeeId($employee->employee_id)->where(function ($query) {
                    $query->whereStatus('Completed')
                        ->where('recommended',"0")
                        ->where(function ($query) {
                            $query->where('year', Carbon::now()->year);
                        })->orWhere(function ($query) {
                            $query->whereStatus('Disapproved')
                                ->where('recommended',"0")
                                ->where(function ($query) {
                                    $query->where('year', Carbon::now()->year);
                                });
                            });
                })->first();
                array_push($appraisals, $appraisal);
            }
        }

        return view('client.dashboards.recommendation_appraisal_list', compact('appraisals'));
    }

    public function appraisalDetails($id){
        $appraisal = Appraisal::whereId($id)->first();
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

        return view('client.dashboards.recommendation_form', compact(['employee_scores','supervisor_scores',
            'sumScores', 'avg', 'emp_comment', 'sup_comment', 'appraisal']));
    }

    public function store(Request $request, $id){
        $comment = Comment::create(['appraisal_id'=>$id]);
        $comment->commitee_recommendation()->create(['recommendation'=>$request->recommendation]);
        $appraisal = Appraisal::find($id);
        $appraisal->recommended = "1";
        $appraisal->save();
        return redirect('/committee');
    }




}

