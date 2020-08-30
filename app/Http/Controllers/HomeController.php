<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['isAdmin'])->except('index');
        $this->middleware(['auth']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        global $newToEval;
        global $appraise;
        $pendingMyApproval=  count(Auth::user()->load(['appraisals'=> function ($query){
            $query->whereStatus('Evaluated');
        }])->appraisals);


        $pendingEvaluation =  count(Auth::user()->load(['appraisals'=> function ($query){
            $query->whereStatus('Pending');
        }])->appraisals);

        $employees = Auth::user()->load(['employees.appraisals'=> function ($query){
            $query->whereStatus('Pending');
        }]);

        if($employees){
            $newToEval = count($employees->employees->flatMap->appraisals) ;
        }else{
            $newToEval = 0;
        }

        $approved =  count(Auth::user()->load(['appraisals'=> function ($query){
            $query->whereStatus('Completed')
            ->orWhere('status', 'Disapproved');
        }])->appraisals);

        $disapproved = count(Auth::user()->load(['appraisals'=> function ($query){
            $query->whereStatus('Disapproved');
        }])->appraisals);

        $appraisal = Appraisal::whereEmployeeId(Auth::user()->employee_id)->latest()->first();



        return view('client.dashboards.landing' ,compact(['pendingMyApproval','pendingEvaluation', 'newToEval',
            'disapproved', 'approved', 'appraisal']));
    }
}
