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

$factory->define(App\order::class, function (Faker\Generator $faker) {
    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
        'order_sn' => str_random(10),
        'mid' => str_random(1),
        'user' => $faker->name,
        'phone' => str_random(11),
        'address' => $faker->paragraph,
        'total' => str_random(3),
        'order_status' => str_random(1),

    ];
});
