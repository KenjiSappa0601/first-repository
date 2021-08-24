<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Spot;
use Faker\Generator as Faker;

$factory->define(Spot::class, function (Faker $faker) {
    $pref = config('app.pref');
    return [
        'name' => $faker->title,
        'body' => $faker->paragraph,
        'prefecture' => $faker->randomElement($pref),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
