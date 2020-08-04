<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Appraisal
 * @package App\Models
 * @version June 25, 2020, 2:27 pm UTC
 *
 * @property \App\Models\Employee $employee
 * @property \App\Models\Employee $supervisor
 * @property string $date_of_appraisal
 * @property unsigned $employee_id
 * @property integer $supervisor_id
 */
class Appraisal extends Model
{
    use SoftDeletes;

    public $table = 'appraisals';


    protected $dates = ['deleted_at'];




    public $fillable = [
        'date_of_appraisal',
        'year',
        'status',
        'recommended',
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
        'date_of_appraisal' => 'date',
        'supervisor_id' => 'integer',
        'recommended'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date_of_appraisal' => 'required|date',
        'employee_id' => 'required',
        'supervisor_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supervisor()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'supervisor_id', 'supervisor_id');
    }

    public function kpis(){
        return $this->belongsToMany(Kpi::class,'appraisal_kpi','appraisal_id','kpi_id');
    }

    public function employeescores(){
        return $this->hasOne(EmployeeScore::class, 'appraisal_id', 'id');
    }

    public function supervisorscores(){
        return $this->hasOne(SupervisorScore::class, 'appraisal_id', 'id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'appraisal_id', 'id');
    }
}
