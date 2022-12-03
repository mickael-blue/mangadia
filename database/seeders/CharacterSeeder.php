<?php

namespace Database\Seeders;

use App\Models\Manga;
use App\Models\Category;
use App\Models\Character;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Character::factory()
            ->count(25)
            ->create();
    }
}
