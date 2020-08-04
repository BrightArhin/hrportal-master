<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmployeeScore
 * @package App\Models
 * @version July 3, 2020, 6:00 pm UTC
 *
 * @property \App\Models\Appraisal $appraisal
 * @property integer $appraisal_id
 * @property number $score_1
 * @property integer $kpi_id_1
 * @property number $score_2
 * @property integer $kpi_id_2
 * @property number $score_3
 * @property integer $kpi_id_3
 * @property number $score_4
 * @property integer $kpi_id_4
 * @property number $score_5
 * @property integer $kpi_id_5
 */
class EmployeeScore extends Model
{
    use SoftDeletes;

    public $table = 'employee_scores';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'appraisal_id',
        'score_1',
        'kpi_1',
        'score_2',
        'kpi_2',
        'score_3',
        'kpi_3',
        'score_4',
        'kpi_4',
        'score_5',
        'kpi_5'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'appraisal_id' => 'integer',
        'score_1' => 'decimal:2',
        'kpi_1' => 'string',
        'score_2' => 'decimal:2',
        'kpi_2' => 'string',
        'score_3' => 'decimal:2',
        'kpi_3' => 'string',
        'score_4' => 'decimal:2',
        'kpi_4' => 'string',
        'score_5' => 'decimal:2',
        'kpi_5' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function appraisal()
    {
        return $this->belongsTo(\App\Models\Appraisal::class, 'appraisal_id', ' id');
    }
}
