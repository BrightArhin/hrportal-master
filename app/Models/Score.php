<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Score
 * @package App\Models
 * @version June 25, 2020, 6:36 pm UTC
 *
 * @property \App\Models\Appraisal $appraisal
 * @property integer $appraisal_id
 * @property number $staff_score
 * @property number $supscore
 * @property string $kpi_name
 */
class Score extends Model
{
    use SoftDeletes;

    public $table = 'scores';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'appraisal_id',
        'staff_score_1',
        'supervisor_score_1',
        'kpi_id_1',
        'staff_score_2',
        'supervisor_score_2',
        'kpi_id_2',
        'staff_score_3',
        'supervisor_score_3',
        'kpi_id_3',
        'staff_score_4',
        'supervisor_score_4',
        'kpi_id_4',
        'staff_score_5',
        'supervisor_score_5',
        'kpi_id_5'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'appraisal_id' => 'integer',
        'staff_score' => 'decimal:2',
        'supscore' => 'decimal:2',
        'kpi_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'appraisal_id' => 'required',
        'staff_score' => 'required',
        'supscore' => 'required',
        'kpi_name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function appraisal()
    {
        return $this->belongsTo(\App\Models\Appraisal::class, 'appraisal_id', 'id');
    }

    public function kpi(){
        return $this->belongsTo(Kpi::class,'kpi_id','id');
    }
}
