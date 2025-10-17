<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Species;

class SpeciesSeeder extends Seeder
{
    public function run(): void
    {
        Species::create(['name' => 'Dog']);
        Species::create(['name' => 'Cat']);
        Species::create(['name'=> 'bird']);
    }
}
