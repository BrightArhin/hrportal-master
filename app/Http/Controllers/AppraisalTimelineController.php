<?php

namespace App\Http\Controllers;

use App\Models\AppraisalTimeline;
use Illuminate\Http\Request;

class AppraisalTimelineController extends Controller
{
    //
    public function changeDate(Request $request){
        $input = $request->all();
        $appraisalTimeLine = new AppraisalTimeline();
        $appraisalTimeLine->start_month = $request->start_date;
        $appraisalTimeLine->end_month = $request->end_date;
        $appraisalTimeLine->save();
        return response()->json(['message'=>'Timeline set successfully']);
    }
}
