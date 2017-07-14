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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Expense::class, function(Faker\Generator $faker) {
	return [
		'expense_type_id' => $faker->numberBetween(1, 10),
		'amount' => $faker->numberBetween(5, 300),
		'description' => $faker->word,
		'date' => $faker->dateTimeThisYear()
	];
});

$factory->define(App\Income::class, function(Faker\Generator $faker) {
	return [
		'description' => "Income",
		'amount' => $faker->numberBetween(5, 300),
		'date' => $faker->dateTimeThisYear()
	];
});
