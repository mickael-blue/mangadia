<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MangaSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CharacterSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MangadiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            MangaSeeder::class,
            CharacterSeeder::class,
        ]);
    }
}
