<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kpi_Role
 * @package App\Models
 * @version June 26, 2020, 12:04 pm UTC
 *
 * @property integer $kpi_id
 * @property integer $role_id
 */
class Kpi_Role extends Model
{
    use SoftDeletes;

    public $table = 'kpi__roles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kpi_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kpi_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kpi_id' => 'required',
        'role_id' => 'required'
    ];

    
}
