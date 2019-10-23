<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace home\lrod\Develop\www\deroapi\database\factories;
use App\User;
use App\E14Card;
use App\Witness;
use App\Election;
use App\Candidate;
use App\VotingPlace;
use App\VotingTable;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->firstname,
        'lastname' => $faker->lastname,
        'color' => $faker->hexcolor,
        'number' => $faker->numberBetween(1,10),
        'image' => $faker->word,
        'political_party' => $faker->word,
        'election_id' => Election::all()->random(),  
    ];
});

$factory->define(Election::class, function (Faker $faker) {
    return [
        'scope' => $faker->randomElement(['ALCALDIA', 'GOBERNACION', 'CONCEJO']),
        'departament' => 'LA GUAJIRA',
        'municipality' => 'MAICAO'        
    ];
});

$factory->define(VotingPlace::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'code' => $faker->word,
        'departament' => 'LA GUAJIRA',
        'municipality' => 'MAICAO',      
        'zone' => $faker->numberBetween(1,99),
        'potencial' => $faker->numberBetween(1000,9000)        
    ];
});

$factory->define(Witness::class, function (Faker $faker) {
    return [
        'identification' => $faker->numberBetween(1000000, 9999999),
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'phone' => $faker->phoneNumber,
        'password' => Str::random(6),
        'status' => '1',
    ];
});


$factory->define(VotingTable::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(1,30),
        'status' => 'NORMAL', 
        'voting_place_id' => VotingPlace::all()->random()->id,
        'witness_id' => Witness::all()->random(),
    ];
});

$factory->define(E14Card::class, function (Faker $faker) {
    return [
        'blank_votes' => $faker->numberBetween(0,100),
    	'null_votes' => $faker->numberBetween(0,100),
    	'unmarks_votes'=> $faker->numberBetween(0,100),
    	'total_votes'=> $faker->numberBetween(0,100),
    	'is_recount'=> $faker->numberBetween(0,1),
    	'is_incineration'=> $faker->numberBetween(0,1),
    	'voting_table_id' => factory(VotingTable::class)->create()->id
    ];
});






