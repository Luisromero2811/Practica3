<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Personas::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name(),
        'Edad' => $faker->numberBetween($min = 1, $max = 29),
        'Correo' => $faker->email(),
        'password'=>$faker->ean13(),
    ];
});
