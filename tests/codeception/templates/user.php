<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'username' => $faker->userName,
    'email' => $faker->email,
    'firstName' => $faker->firstName,
    'lastName' => $faker->lastName,
    'password' => Yii::$app->getSecurity()->generatePasswordHash('password_' . $index),
    'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
    'intro' => $faker->sentence(5),
];