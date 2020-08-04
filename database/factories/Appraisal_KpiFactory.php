<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Appraisal_Kpi;
use Faker\Generator as Faker;

$factory->define(Appraisal_Kpi::class, function (Faker $faker) {

    return [
        'appraisal_id' => $faker->randomDigitNotNull,
        'kpi_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
