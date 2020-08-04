<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department_Kpi
 * @package App\Models
 * @version June 26, 2020, 12:11 pm UTC
 *
 * @property integer $department_id
 * @property integer $kpi_id
 */
class Department_Kpi extends Model
{
    use SoftDeletes;

    public $table = 'department__kpis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'department_id',
        'kpi_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
        'kpi_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'department_id' => 'required',
        'kpi_id' => 'required'
    ];

    
}
