<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Client::create([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'phone_number' => $faker->phoneNumber(),
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address(),
            ]);
        }
    }
}
