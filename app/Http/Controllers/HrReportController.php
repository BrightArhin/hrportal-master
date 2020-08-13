<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HrReportController extends Controller
{
    //

    public function showAllDepts()
    {
        $departments = Department::all();
        return view('client.dashboards.dept_list', compact('departments'));
    }

    public function showAllDeptsIncomplete()
    {
        $departments = Department::all();
        return view('client.dashboards.incomplete_dept_list', compact('departments'));
    }

    public function index()
    {
        return view('client.dashboards.report_types');
    }

    public function getIncompleteReportForDepartment($id)
    {
        $pending_appraisals = array();
        $evaluated_appraisals = array();
        $department = Department::find($id);
        foreach ($department->employees as $employee) {
            if (count($employee->appraisals) > 0) {
                $appraisal = Appraisal::whereEmployeeId($employee->employee_id)->where('year', Carbon::now()->year)->first();
                if ($appraisal->status === 'Pending') {
                    array_push($pending_appraisals, $appraisal);
                } else if ($appraisal->status === 'Evaluated') {
                    array_push($evaluated_appraisals, $appraisal);
                }
            }
        }

        return $pending_appraisals;

        return view('client.dashboard.dept_report', compact(['pending_appraisals', 'evaluated_appraisals']));
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

        return view('client.dashboards.dept_report', compact(['employee_list', 'supComments', 'the_appraisals', 'i', 'commitee_recommendation']));
    }

    public function getInCompleteReport($id)
    {
        global $i;
        $i = 0;
        $department = Department::whereId($id)->first();
        $employees = $department->load(['employees.appraisals' => function ($query) {
            $query->where('status', 'Pending')->where(function ($query) {
                $query->where('year', Carbon::now()->year);
            })->orwhere(function ($query) {
                $query->where('status', 'Evaluated')->where(function ($query) {
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
            if($comments){
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

        }

        return view('client.dashboards.dept_report_incomplete', compact(['employee_list', 'supComments', 'the_appraisals', 'i', 'commitee_recommendation']));
    }
}
