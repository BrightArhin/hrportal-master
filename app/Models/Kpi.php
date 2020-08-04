<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kpi
 * @package App\Models
 * @version June 25, 2020, 12:02 pm UTC
 *
 * @property string $name
 */
class Kpi extends Model
{
    use SoftDeletes;

    public $table = 'kpis';


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

    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class,'kpi__roles','kpi_id','role_id');
    }

    public function departments()
    {
        return $this->belongsToMany(\App\Models\Department::class, 'department__kpis','kpi_id','department_id');
    }

    public function appraisals(){
        return $this->belongsToMany(Appraisal::class,'appraisal__kpis','kpi_id','appraisal_id');
    }

    public function scores(){
        return $this->hasMany(Score::class,'kpi_id','id');
    }
}
