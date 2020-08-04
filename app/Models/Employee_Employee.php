<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee_Employee
 * @package App\Models
 * @version June 26, 2020, 12:30 pm UTC
 *
 * @property integer $employee_id
 * @property integer $supervisor_id
 */
class Employee_Employee extends Model
{
    use SoftDeletes;

    public $table = 'employee__employees';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'supervisor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'supervisor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required',
        'supervisor_id' => 'required'
    ];

    
}
