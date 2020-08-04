<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SupervisorScore
 * @package App\Models
 * @version July 3, 2020, 6:10 pm UTC
 *
 * @property \App\Models\Appraisal $appraisal
 * @property integer $appraisal_id
 * @property number $score_1
 * @property integer $kpi_id_1
 * @property number $score_2
 * @property integer $kpi_id_3
 * @property number $score_3
 * @property integer $kpi_id_2
 * @property number $score_4
 * @property integer $kpi_id_4
 * @property number $score_5
 * @property integer $kpi_id_5
 */
class SupervisorScore extends Model
{
    use SoftDeletes;

    public $table = 'supervisor_scores';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'appraisal_id',
        'score_1',
        'kpi_id_1',
        'score_2',
        'kpi_id_3',
        'score_3',
        'kpi_id_2',
        'score_4',
        'kpi_id_4',
        'score_5',
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
        'score_1' => 'decimal:2',
        'kpi_id_1' => 'integer',
        'score_2' => 'decimal:2',
        'kpi_id_3' => 'integer',
        'score_3' => 'decimal:2',
        'kpi_id_2' => 'integer',
        'score_4' => 'decimal:2',
        'kpi_id_4' => 'integer',
        'score_5' => 'decimal:2',
        'kpi_id_5' => 'integer'
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
        return $this->belongsTo(\App\Models\Appraisal::class, 'appraisal_id', 'id');
    }
}
