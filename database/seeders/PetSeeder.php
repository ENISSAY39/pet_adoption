<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $pets = [
            // 🐶 DOGS
            ['name' => 'Rex', 'breed' => 'Labrador', 'age' => 3, 'adopted' => false, 'species_id' => 1],
            ['name' => 'Bella', 'breed' => 'Husky', 'age' => 2, 'adopted' => true, 'species_id' => 1],
            ['name' => 'Max', 'breed' => 'Golden Retriever', 'age' => 4, 'adopted' => false, 'species_id' => 1],
            ['name' => 'Rocky', 'breed' => 'Beagle', 'age' => 1, 'adopted' => false, 'species_id' => 1],
            ['name' => 'Charlie', 'breed' => 'German Shepherd', 'age' => 5, 'adopted' => true, 'species_id' => 1],
            ['name' => 'Daisy', 'breed' => 'Poodle', 'age' => 2, 'adopted' => false, 'species_id' => 1],
            ['name' => 'Buddy', 'breed' => 'Bulldog', 'age' => 6, 'adopted' => true, 'species_id' => 1],
            ['name' => 'Milo', 'breed' => 'Border Collie', 'age' => 3, 'adopted' => false, 'species_id' => 1],

            // 🐱 CATS
            ['name' => 'Luna', 'breed' => 'Persian', 'age' => 1, 'adopted' => false, 'species_id' => 2],
            ['name' => 'Moka', 'breed' => 'Siamese', 'age' => 4, 'adopted' => true, 'species_id' => 2],
            ['name' => 'Chloe', 'breed' => 'Maine Coon', 'age' => 3, 'adopted' => false, 'species_id' => 2],
            ['name' => 'Nala', 'breed' => 'Sphynx', 'age' => 2, 'adopted' => true, 'species_id' => 2],
            ['name' => 'Simba', 'breed' => 'Bengal', 'age' => 5, 'adopted' => false, 'species_id' => 2],
            ['name' => 'Cleo', 'breed' => 'British Shorthair', 'age' => 2, 'adopted' => true, 'species_id' => 2],
            ['name' => 'Oliver', 'breed' => 'Scottish Fold', 'age' => 1, 'adopted' => false, 'species_id' => 2],

            // 🐦 BIRDS
            ['name' => 'Kiwi', 'breed' => 'Parrot', 'age' => 2, 'adopted' => true, 'species_id' => 3],
            ['name' => 'Sunny', 'breed' => 'Canary', 'age' => 1, 'adopted' => false, 'species_id' => 3],
            ['name' => 'Coco', 'breed' => 'Cockatiel', 'age' => 3, 'adopted' => true, 'species_id' => 3],
            ['name' => 'Echo', 'breed' => 'African Grey', 'age' => 4, 'adopted' => false, 'species_id' => 3],
            ['name' => 'Hedwig', 'breed' => 'Owl', 'age' => 5, 'adopted' => false, 'species_id' => 3],
        ];

        foreach ($pets as $pet) {
            Pet::create($pet);
        }
    }
}
