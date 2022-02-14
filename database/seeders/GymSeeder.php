<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gym;

class GymSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $gyms = [
            ['Sport 24', 'Milano'],
            ['Tutto Sport', 'Genova'],
            ['Super Muscle', 'Palermo'],
            ['Top Sport', 'Roma'],
            ['Kung Fu Palestra', 'Torino'],
            ['Sporting Club', 'Venezia'],
            ['The Gym Top 45', 'Milano'],
            ['Best Gym', 'Aosta'],
        ];

        foreach ($gyms as $gym) {
            Gym::create([
                'name' => $gym[0],
                'city' => $gym[1],
            ]);
        }
    }
}
