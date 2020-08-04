<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 * @package App\Models
 * @version June 25, 2020, 12:06 pm UTC
 *
 * @property string $name
 */
class Department extends Model
{
    use SoftDeletes;

    public $table = 'departments';


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

    public function kpis()
    {
        return $this->belongsToMany(Kpi::class, 'department__kpis','department_id','kpi_id');
    }

    public function employees(){
        return $this->hasMany(Employee::class,'department_id','id');
    }


}
