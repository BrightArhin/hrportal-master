<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Kpi_Role;
use Faker\Generator as Faker;

$factory->define(Kpi_Role::class, function (Faker $faker) {

    return [
        'kpi_id' => $faker->randomDigitNotNull,
        'role_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
