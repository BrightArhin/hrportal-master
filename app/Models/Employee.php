<?php

namespace App\Models;

use App\Events\EmployeeSave;
use App\Events\EmployeeUpdate;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Employee
 * @package App\Models
 * @version June 26, 2020, 10:52 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $employee1s
 * @property date_last_promotion date date
 * @property \App\Models\Location $location
 * @property \App\Models\Department $department
 * @property \App\Models\Grade $grade
 * @property \App\Models\Rank $rank
 * @property \App\Models\Job $job
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @property integer $employee_id
 * @property integer $supervisor_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $birth_date
 * @property string $date_first_appointment
 * @property string $date_last_promotion
 * @property string $status
 * @property integer $location_id
 * @property integer $grade_id
 * @property integer $rank_id
 * @property integer $job_id
 * @property string $role
 */
class Employee extends Authenticatable implements \Illuminate\Contracts\Auth\Authenticatable
{
    use SoftDeletes;
    use Notifiable;


    public $table = 'employees';

    protected $primaryKey ='employee_id';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'supervisor_id',
        'name',
        'staff_number',
        'email',
        'password',
        'birth_date',
        'date_first_appointment',
        'date_last_promotion',
        'status',
        'isAdmin',
        'isSupervisor',
        'location_id',
        'department_id',
        'qualification_id',
        'grade_id',
        'rank_id',
        'job_id',
        'role_id'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'supervisor_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'birth_date' => 'date',
        'date_first_appointment' => 'date',
        'date_last_promotion' => 'date',
        'status' => 'string',
        'isAdmin'=> 'integer',
        'isSupervisor'=> 'integer',
        'location_id' => 'integer',
        'department_id' => 'integer',
        'grade_id' => 'integer',
        'rank_id' => 'integer',
        'job_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'date_first_appointment' => 'required|date',
        'status' => 'required',
        'location_id' => 'required',
        'department_id' => 'required',
        'grade_id' => 'required',
        'job_id' => 'required',

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function supervisors()
    {
        return $this->belongsToMany(\App\Models\Employee::class, 'employee__employees', 'employee_id', 'supervisor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function employees()
    {
        return $this->belongsToMany(\App\Models\Employee::class, 'employee__employees', 'supervisor_id', 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/


    public function qualification()
    {
        return $this->belongsTo(\App\Models\Qualification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grade()
    {
        return $this->belongsTo(\App\Models\Grade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rank()
    {
        return $this->belongsTo(\App\Models\Rank::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function job()
    {
        return $this->belongsTo(\App\Models\Job::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }

    public function appraisals(){
        return $this->hasMany(\App\Models\Appraisal::class, 'employee_id', 'employee_id');
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
}
