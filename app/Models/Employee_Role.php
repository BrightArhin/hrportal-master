<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee_Role
 * @package App\Models
 * @version June 26, 2020, 11:34 am UTC
 *
 * @property integer $employee_id
 * @property integer $role_id
 */
class Employee_Role extends Model
{
    use SoftDeletes;

    public $table = 'employee__roles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required',
        'role_id' => 'required'
    ];

    
}
