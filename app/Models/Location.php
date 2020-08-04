<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 * @package App\Models
 * @version June 25, 2020, 2:58 pm UTC
 *
 * @property string $name
 */
class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';


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
        return $this->hasMany(Employee::class,'location_id','id');
    }



}
