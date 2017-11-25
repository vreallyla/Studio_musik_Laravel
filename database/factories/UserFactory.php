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
        'name' => $faker->name,
        'nama_band' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'alamat' => $faker->streetAddress,
        'no_telp' => $faker->name,
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\jenis_recorder::class, function (Faker $faker) {

    return [
        'nama_recorder' => $faker->unique()->randomElement(['Recorder Sopran', 'Recorder Sopranino', 'Recorder Alto']),
        'deskripsi' => $faker->sentence(30),
        'harga_recorder' => $faker->unique()->numerify($string = '####00000'),
        'batas_hari' => $faker->numberBetween($min = 1, $max = 3),

    ];
});

$factory->define(App\jen_alat::class, function (Faker $faker) {

    return [
        'status' => $faker->unique()->randomElement(['Baru', 'Lama']),


    ];
});

$factory->define(App\pengurus::class, function (Faker $faker) {
    static $password;

    return [
        'nama_pengurus' => $faker->name,
        'email' => $faker->unique()->companyEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'alamat' => $faker->streetAddress,
        'no_telp' => $faker->phoneNumber,
        'status_pengurus' => $faker->unique()->randomElement(['pegawai', 'owner']),
        'remember_token' => str_random(10),

    ];
});