<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grade
 * @package App\Models
 * @version June 25, 2020, 2:59 pm UTC
 *
 * @property string $name
 */
class Grade extends Model
{
    use SoftDeletes;

    public $table = 'grades';


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

    public function employees(){
        return $this->hasMany(Employee::class, 'grade_id','id');
    }


}
