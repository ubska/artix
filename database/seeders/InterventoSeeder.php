<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intervento;
use App\Models\Client;
use Faker\Factory as Faker;


class InterventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Recupera tutti gli ID dei clienti esistenti
        $clientId = Client::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            Intervento::create([
                'client_id' => $faker->randomElement($clientId),
                'descrizione' => $faker->sentence(),
                'data_intervento' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'note' => $faker->optional()->paragraph(),
            ]);
        };
    }
}
