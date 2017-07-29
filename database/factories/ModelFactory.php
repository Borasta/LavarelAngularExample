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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\StatusAlert::class, function (Faker\Generator $faker) {
    return [
        'status' => str_random(10),
    ];
});

$factory->define(App\Office::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Alert::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text,
        'office_id' => rand(1, App\Office::all()->count()),
        'status_alert_id' => rand(1, App\StatusAlert::all()->count()),
    ];
});

$factory->define(App\StatusRound::class, function (Faker\Generator $faker) {
    return [
        'status' => str_random(10),
    ];
});

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Round::class, function (Faker\Generator $faker) {
    return [
        'office_id' => rand(1, App\Office::all()->count()),
        'employee_id' => rand(1, App\Employee::all()->count()),
        'status_round_id' => rand(1, App\StatusRound::all()->count()),
    ];
});
