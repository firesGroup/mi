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

$factory->define(App\adminGroup::class, function (Faker\Generator $faker) {
    return [
        'group_name' => $faker->name,
        'group_desc' => $faker->paragraph,
        'role_list' => str_random(1),
        'status' => str_random(1),
    ];
});

$factory->define(App\adminRole::class, function (Faker\Generator $faker) {
    $userIds = \App\adminGroup::lists('id')->toArray();
    return [
        'group_id' => $faker->randomElement($userIds),
        'role_name' => $faker->name,
        'role_desc' => $faker->paragraph,
        'role' => str_random(1),
        'status' => str_random(1),
    ];
});

$factory->define(App\admin::class, function (Faker\Generator $faker) {
    $userIds = \App\adminGroup::lists('id')->toArray();
    return [
        'gid' => $faker->randomElement($userIds),
        'username' => $faker->name,
        'password' => bcrypt(str_random(10)),
        'status' => str_random(1),
    ];
});
