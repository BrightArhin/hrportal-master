<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rank;
use Faker\Generator as Faker;

$factory->define(Rank::class, function (Faker $faker) {

    return [
        'name' => $faker->randomElement(['Director', 'Manager', 'Supervisor', 'Officer']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
