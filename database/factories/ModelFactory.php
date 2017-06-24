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
//===================
//王明使用::
// $factory->define(App\Entity\AdminGroup::class, function (Faker\Generator $faker) {
//     $roleIds = \App\Entity\AdminRole::lists('id')->toArray();
//     return [
//         'group_name' => $faker->name,
//         'group_desc' => $faker->paragraph,
//         'role_list' => $faker->randomElement($roleIds).','.$faker->randomElement($roleIds),
//         'status' => rand(0,1),
//     ];
// });

// $factory->define(App\Entity\AdminRole::class, function (Faker\Generator $faker) {
//     return [
//         'role_name' => $faker->name,
//         'role_desc' => $faker->paragraph,
//         'role' => 'controller@'.str_random(5),
//         'status' => rand(0,1),
//     ];
// });

// $factory->define(App\Entity\Admin::class, function (Faker\Generator $faker) {
//     $userIds = \App\Entity\AdminGroup::lists('id')->toArray();
//     return [
//         'group_id' => $faker->randomElement($userIds),
//         'username' => $faker->name,
//         'password' => bcrypt(str_random(10)),
//         'status' => rand(0,1),
//         'add_time' => $faker->dateTime(),
//         'last_ip' => $faker->ipv4,
//         'last_time' => $faker->dateTime(),
//     ];
// });

//=================
//龙彪使用::
// $factory->define(App\Entity\Member::class, function (Faker\Generator $faker) {
//     return [
//         'nick_name' => $faker->name,
//         'email' => $faker->safeEmail,
//         'phone' => $faker->phoneNumber,
//         'status' => $faker->internetExplorer,
//         'last_ip' => $faker->ipv4,
//         'password' => str_random(9),
//         'remember_token' => str_random(10),
//     ];
// });


//$factory->define(App\Entity\MemberDetail::class, function (Faker\Generator $faker) {
//     $userIds = \App\Entity\Member::lists('id')->toArray();
//     return [
//         'member_id' => $faker->randomElement($userIds),
//         'sex' =>rand(0, 1),
//         'birthday' => $faker->dateTime,
//         'avator' => $faker->imageUrl(),
//     ];
// });

//===================================
//潘珺使用:
// $factory->define(App\order::class, function (Faker\Generator $faker) {
//     return [
//          'order_sn' => str_random(10),
//          'mid' => str_random(1),
//          'user' => $faker->name,
//          'phone' => str_random(11),
//          'address' => $faker->paragraph,
//          'total' => str_random(3),
//         'order_status' => str_random(1),
//         'pay_status' => str_random(1),
//         'shipments_status' => str_random(1),

//          'cid'=> $faker->randomDigitNotNull,
//         'bid'=> $faker->randomDigitNotNull,
//         'p_name'=> $faker->sentence,
//         'price' => $faker->randomFloat(),
//         'market_price' => $faker->randomFloat(),
//     ];
// });
//潘珺使用comment:
//$factory->define(App\comment::class, function (Faker\Generator $faker) {
//    return [
//        'mid' => $faker->randomDigitNotNull,
//        'pid' => $faker->sentence,
//        'images' => $faker->imageUrl(),
//        'content' => str_random(15),
//        'star' => str_random(1),
//        'is_hide' => str_random(1),
//        'type' => str_random(1),
//    ];
//});
// $factory->define(App\order::class, function (Faker\Generator $faker) {
//     return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//         'order_sn' => str_random(10),
//         'mid' => str_random(1),
//         'user' => $faker->name,
//         'phone' => str_random(11),
//         'delivery' => str_random(11),
//         'delivery_orderid' => str_random(20),
//         'address' => $faker->paragraph,
//         'total' => str_random(3),
//         'order_status' => str_random(1),
//     ];
// }); 

//===============================
//肖开文使用::
// $factory->define(App\Entity\Product::class, function (Faker\Generator $faker) {
// //    return [
//        'name' => $faker->name,
// //        'email' => $faker->safeEmail,
// //        'password' => bcrypt(str_random(10)),
// //        'remember_token' => str_random(10),
//     ];
// });
// $factory->define(App\Entity\ProductDetail::class, function (Faker\Generator $faker) {
//     return [
//        'pid'=> rand(8,40),
//        'p_index_image' => $faker->imageUrl(),
//        'summary' => $faker->paragraph,
//         'description' => $faker->sentence,
//         'remind_title' => $faker->paragraph,
//         'store' => $faker->randomDigitNotNull,
//         'sell_num' => $faker->randomDigitNotNull,
//         'click_num' => $faker->randomDigitNotNull,
//     ];
// });
