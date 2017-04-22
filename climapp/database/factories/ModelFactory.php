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
/**
 * Factory definition for model App\City.
 */
$factory->define(App\City::class, function ($faker) {
    return [
        'id_state' => $faker->fillable,
    ];
});

/**
 * Factory definition for model App\CityPerson.
 */
$factory->define(App\CityPerson::class, function ($faker) {
    return [
        'id_city' => $faker->fillable,
        'id_person' => $faker->fillable,
    ];
});

/**
 * Factory definition for model App\Person.
 */
$factory->define(App\Person::class, function ($faker) {
    return [
        // Fields here
    ];
});

/**
 * Factory definition for model App\TUser.
 */
$factory->define(App\TUser::class, function ($faker) {
    return [
        // Fields here
    ];
});
