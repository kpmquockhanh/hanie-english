<?php

use Faker\Generator as Faker;

$factory->define(\App\EducationProgram::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text()
    ];
});
