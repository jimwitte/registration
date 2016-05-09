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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->safeEmail,
        'position' => array_rand(array_flip(['SM','ASM','CM','DL','CA'])),
        'unitType' => array_rand(array_flip(['Troop','Crew','Pack','Team'])),
        'unitNumber' => rand(1, 1199),
        'council' => array_rand(array_flip(['Prairielands','Sagamore','Mid America'])),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'paymentMethod' => array_rand(array_flip(['Credit Card','Unit Acct','Check', 'Cash'])),
        'isInstructor' => array_rand(array_flip([1,0])),
        'isAdmin' => FALSE,
        'archived' => FALSE,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Session::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words($nb = 3, $asText = true),
        'startTime' => array_rand(array_flip(['09:00','10:00','11:00','13:00','14:00','15:00'])),
        'archived' => FALSE,
        'capacity' => rand(15, 25),
        'location' => 'Room ' . rand(100,399),
        'description' => $faker->sentences($nb=6,$asText=true),
    ];
});
