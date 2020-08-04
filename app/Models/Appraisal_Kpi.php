<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Appraisal_Kpi
 * @package App\Models
 * @version June 26, 2020, 12:21 pm UTC
 *
 * @property integer $appraisal_id
 * @property integer $kpi_id
 */
class Appraisal_Kpi extends Model
{
    use SoftDeletes;

    public $table = 'appraisal__kpis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'appraisal_id',
        'kpi_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'appraisal_id' => 'integer',
        'kpi_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'appraisal_id' => 'required',
        'kpi_id' => 'required'
    ];

    
}
