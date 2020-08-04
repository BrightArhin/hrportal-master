<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Score_Kpi
 * @package App\Models
 * @version June 29, 2020, 9:53 am UTC
 *
 * @property integer $score_id
 * @property integer $kpi_id
 */
class Score_Kpi extends Model
{
    use SoftDeletes;

    public $table = 'score__kpis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'score_id',
        'kpi_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'score_id' => 'integer',
        'kpi_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'score_id' => 'required',
        'kpi_id' => 'required'
    ];

    
}
