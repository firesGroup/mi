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
// $factory->define(App\adminGroup::class, function (Faker\Generator $faker) {
//     return [
//         'group_name' => $faker->name,
//         'group_desc' => $faker->paragraph,
//         'role_list' => str_random(1),
//         'status' => str_random(1),
//     ];
// });
// $factory->define(App\adminRole::class, function (Faker\Generator $faker) {
//     $gid = \App\adminGroup::lists('id')->toArray();
//     return [
//         'group_id' => $faker->randomElement($gid),
//         'role_name' => $faker->name,
//         'role_desc' => $faker->paragraph,
//         'role' => str_random(1),
//         'status' => str_random(1),
//     ];
// });

// $factory->define(App\admin::class, function (Faker\Generator $faker) {
//     $userIds = \App\adminGroup::lists('id')->toArray();
//     return [
//         'gid' => $faker->randomElement($userIds),
//         'username' => $faker->name,
//         'password' => bcrypt(str_random(10)),
//         'status' => str_random(1),
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
//         'mid' => $faker->randomElement($userIds),
//         'sex' =>$faker->internetExplorer,
//         'birthday' => $faker->dateTime,
//         'avator' => $faker->imageUrl(),
//     ];
// });

//===================================
//潘珺使用:
// $factory->define(App\order::class, function (Faker\Generator $faker) {
//     return [
// //         'order_sn' => str_random(10),
// //         'mid' => str_random(1),
// //         'user' => $faker->name,
// //         'phone' => str_random(11),
// //         'address' => $faker->paragraph,
// //         'total' => str_random(3),
// //         'order_status' => str_random(1),
      
//          'cid'=> $faker->randomDigitNotNull,
//         'bid'=> $faker->randomDigitNotNull,
//         'p_name'=> $faker->sentence,
//         'price' => $faker->randomFloat(),
//         'market_price' => $faker->randomFloat(),
//     ];
// });
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
