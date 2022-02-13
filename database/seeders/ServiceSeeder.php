<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $services = [
            ['Piscina', 'Benessere'],
            ['Sauna', 'Benessere'],
            ['Crossfit', 'Palestra'],
            ['Personal Trainer', 'Palestra'],
            ['Macchinetta Caffè', 'Varie'],
            ['Sala svago', 'Varie'],
            ['Zumba', 'Palestra'],
            ['Dispenser acqua gratuito', 'Varie']
        ];

        foreach ($services as $service) {
            Service::create([
                'service_name' => $service[0],
                'type' => $service[1],
            ]);
        }
    }
}
