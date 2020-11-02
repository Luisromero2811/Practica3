<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comentarios::class, function (Faker $faker) {
    return [
        'Comentarios' => $faker->sentence(5),
        'id_producto' => App\Producto::get('id')->random(),
        'id_personas' => App\Personas::get('id')->random(),
    ];
});
