<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Appraisal;
use Faker\Generator as Faker;

$factory->define(Appraisal::class, function (Faker $faker) {

    return [
        'date_of_appraisal' => $faker->word,
        'employee_id' => $faker->word,
        'supervisor_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
