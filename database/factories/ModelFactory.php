<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'client_id' => $faker->numberBetween(1, 10),
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->company,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => 'http://example.com',
        'memo' => $faker->sentence,
    ];
});


$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'client_id' => $faker->numberBetween(1, 10),
        'name' => $faker->sentence(3),
        'description' => $faker->sentence(15),
        'duration' => $faker->numberBetween(30, 120),
        'memo' => $faker->text(20),
        'start_date' => $faker->dateTimeBetween('-6 months', 'now'),
    ];
});


$factory->define(App\Backlog::class, function (Faker\Generator $faker) {
    return [
        'project_id' => $faker->numberBetween(1, 20),
        'user_id' => $faker->numberBetween(1, 3),
        'title' => $faker->sentence(5),
    ];
});
