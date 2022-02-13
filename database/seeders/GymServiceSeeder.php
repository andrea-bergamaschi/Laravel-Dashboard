<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GymService;


class GymServiceSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $all = [
            [1, 1], [1, 7], [1, 5],[1,4], [1,8], 
            [2, 2], [2, 8], [2, 1],
            [3, 8], [3, 7], [3, 4],
            [4, 7], [4, 6],
            [5, 6], [5, 5], [5, 1],
            [6, 5], [6, 4],
            [7, 3], [7, 4],
            [8, 2], [8, 3], [8, 7]
        ];

        foreach ($all as $pair) {
            GymService::create([
                'gym_id' => $pair[0],
                'service_id' => $pair[1]
            ]);
        }
    }
}
