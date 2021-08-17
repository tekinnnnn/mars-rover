<?php

namespace Database\Seeders;

use App\Models\Plateau;
use App\Models\Rover;
use Illuminate\Database\Seeder;

class PlateauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plateau::factory()
            ->count(20)
            ->has(Rover::factory())
            ->create();
    }
}
