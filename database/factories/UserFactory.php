<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'lname'     =>  $faker->name,
        'fname'     =>  $faker->name,
        'email'     =>  $faker->unique()->freeEmail,
        'password'  =>  $password ?: $password = bcrypt('secret1234'),
        'gender'    =>  1,
        'username'  =>  $faker->name,
        'image'     =>  'img/defaults/avatars/default-male.jpg',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Profile::class, function (Faker $faker) {
   
    return [
        'user_id'           =>  factory(App\User::class)->create()->id, 
        'birthday'          =>  '1996-06-15', 
        'phone'            =>  '08107654663', 
        'marital_status'    =>  1, 
        'current_address'   =>  'Ikeja, Lagos, Nigeria', 
        'city'              =>  $faker->city, 
        'state_id'          =>  25, 
        'country_id'        =>  149, 
        'about'             =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'online_status'     =>  0,
    ];
});