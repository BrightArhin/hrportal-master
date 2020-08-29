<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppraisalTimeline extends Model
{
    public $table = 'appraisal_timelines';
    protected $fillable = [
        'start_month',
        'end_month'
    ];
    protected $casts = [
        'start_month' => 'integer',
        'end_month' => 'integer'
    ];
}
