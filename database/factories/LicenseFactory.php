<?php

use App\License;
use Faker\Generator as Faker;

$factory->define(License::class, function (Faker $faker) {
    return [
        'key' => $faker->uuid,
        'company' => $faker->company,
        'domain' => $faker->domainName,
        'customer_id' => function() {
            return factory('App\Customer')->create()->id;
        },
        'transaction_id' => $faker->md5
    ];
});
