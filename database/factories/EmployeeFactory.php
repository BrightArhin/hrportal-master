<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Department;
use App\Models\Employee;
use App\Models\Grade;
use App\Models\Job;
use App\Models\Location;
use App\Models\Qualification;
use App\Models\Rank;
use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) use($factory) {

    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'birth_date' => $faker->date('Y-m-d'),
        'date_first_appointment' => $faker->date('Y-m-d'),
        'date_last_promotion' => $faker->date('Y-m-d'),
        'status' => $faker->randomElement(['Active', 'InActive']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
