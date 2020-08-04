<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Appraisal;
use App\Models\Kpi;
use App\Models\Score;
use Faker\Generator as Faker;

$factory->define(Score::class, function (Faker $faker) use($factory) {

    return [
        'appraisal_id' => factory(Appraisal::class)->create()->id,
        'staff_score' => $faker->numberBetween(0,100),
        'supscore' => $faker->numberBetween(0,100),
        'kpi_name' => factory(Kpi::class)->create(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
