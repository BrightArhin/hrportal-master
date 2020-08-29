<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;

class YearlyReportController extends Controller
{
    //
    public function showAllDepts()
    {
        $departments = Department::all();
        return view('client.dashboards.sum_list', compact('departments'));
    }

    public function getCompleteReport($id)
    {

        global $i;
        $i = 0;
        $department = Department::whereId($id)->first();
        $employees = $department->load(['employees.appraisals' => function ($query) {
            $query->where('status', 'Completed')->where(function ($query) {
                $query->where('year', Carbon::now()->year);
            })->orwhere(function ($query) {
                $query->where('status', 'Disapproved')->where(function ($query) {
                    $query->where('year', Carbon::now()->year);
                });
            });
        }]);


        $the_employee_list = $employees->employees->filter(function ($employee) {
            if (!$employee->appraisals->isEmpty()) {
                return $employee;
            }
        });
        $employee_list = array_values($the_employee_list->all());


        $the_appraisals = array();
        foreach ($employee_list as $list) {
            array_push($the_appraisals, $list->appraisals[0]);
        }
        $supComments = array();
        $commitee_recommendation = array();
        foreach ($the_appraisals as $appraisal) {
            $comments = $appraisal->comment()->get();
            foreach ($comments as $comment) {
                $appraisal = Appraisal::whereId($comment->appraisal_id)->first();
                $employee = $appraisal->employee()->first();
                if ($comment->supervisor_comment) {
                    $sup_comment = $comment->supervisor_comment()->first();
                    if ($sup_comment->require_training !== '') {
                        if (!isset($supComments[$employee->employee_id])) {
                            $supComments[$employee->employee_id] = $sup_comment->require_training;
                        }
                    }
                }
                if ($comment->commitee_recommendation) {
                    $recommendation = $comment->commitee_recommendation()->first();
                    if (!isset($commitee_recommendation[$employee->employee_id])) {
                        $commitee_recommendation[$employee->employee_id] = $recommendation->recommendation;
                    }
                }
            }
        }

        return view('client.dashboards.sum_report', compact(['employee_list', 'supComments', 'the_appraisals', 'i', 'commitee_recommendation']));
    }
}
