<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Member::class, function (Faker\Generator $faker) {
    return [
        'nick_name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'status' => $faker->internetExplorer,
        'last_ip' => $faker->ipv4,
        'remember_token' => str_random(10),
    ];
});
