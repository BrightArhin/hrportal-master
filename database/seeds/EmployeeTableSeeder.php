<?php

use App\Models\Employee;
use App\Models\Location;
use App\Models\Role;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Employee::class, 6)->create();

        $roles = Role::all();
        $employees = Employee::all();
        $locations=Location::all();

//        Location::all()->each(function ($location) use ($employees) {
//            $location->employees()->create($employees->random()->toArray());
//        });


        Employee::all()->each(function ($employee) use ($roles, $locations) {
            $employee->roles()->attach($roles->random(rand(1, 2))->pluck('id')->toArray());
           $locations->random(1)->employees()->associate($employee);
//           $employee->location()->associate($locations->random(1)->pluck('id'));

        });
    }
}
