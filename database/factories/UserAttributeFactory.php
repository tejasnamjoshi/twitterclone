<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserAttribute;
use Faker\Generator as Faker;

$factory->define(UserAttribute::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'isAdmin' => 0
    ];
});
