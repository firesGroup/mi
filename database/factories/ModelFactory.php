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

$factory->define(App\Entity\Product::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];

    return[
        'cid'=> $faker->randomDigitNotNull,
        'bid'=> $faker->randomDigitNotNull,
        'p_name'=> $faker->sentence,
        'price' => $faker->randomFloat(),
        'market_price' => $faker->randomFloat(),
    ];
});
