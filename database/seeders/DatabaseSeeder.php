<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Manga;
use App\Models\Category;
use App\Models\Character;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->count(2)
            ->create();

        $category = Category::factory()
            ->count(1)
            ->create();

        Manga::factory()
            ->count(3)
            ->hasAttached($category, ['category_id' => 1])
            ->create();

        Character::factory()
        ->count(25)
        ->create();
    }
}
