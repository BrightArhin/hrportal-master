<?php

namespace App\Observers;


 use App\Models\Department;
 use App\Models\Employee;

class EmployeeObserver
{
    /**
     * Handle the employee "created" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function created(Employee $employee)
    {
//        dd($employee->first_name);
    }

    /**
     * Handle the employee "updated" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
//        $data = $employee->getAttributes();
//        $department = Department::find($data['department_id']);
//
//        $employee->worksIn()->associate($department);
//
//        $employee->push();
    }




    /**
     * Handle the employee "deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "restored" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "force deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
