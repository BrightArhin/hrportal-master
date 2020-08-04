<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version June 25, 2020, 11:50 am UTC
 *
 * @property string $name
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class ,'role_id','id');
    }

    public function kpis()
    {
        return $this->belongsToMany(\App\Models\Kpi::class, 'kpi__roles','role_id','kpi_id');
    }



}
