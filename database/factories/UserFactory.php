<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    static $kategori = 1;
    return [
        'role' => 1,
        'kategori_id' => $kategori++,
        'nama' => $faker->name,
        'email' => $faker->email,
        'alamat' => $faker->address,
        'jenis_kelamin' => 1,
        'password' => bcrypt('12345'), // password
        'no_telp' => '1234567',
        'status_hire' => 0,
        'rating' => 1,
    ];
});
