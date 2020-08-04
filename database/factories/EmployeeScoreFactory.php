<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EmployeeScore;
use Faker\Generator as Faker;

$factory->define(EmployeeScore::class, function (Faker $faker) {

    return [
        'appraisal_id' => $faker->randomDigitNotNull,
        'score_1' => $faker->word,
        'kpi_id_1' => $faker->randomDigitNotNull,
        'score_2' => $faker->word,
        'kpi_id_2' => $faker->randomDigitNotNull,
        'score_3' => $faker->word,
        'kpi_id_3' => $faker->randomDigitNotNull,
        'score_4' => $faker->word,
        'kpi_id_4' => $faker->randomDigitNotNull,
        'score_5' => $faker->word,
        'kpi_id_5' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
