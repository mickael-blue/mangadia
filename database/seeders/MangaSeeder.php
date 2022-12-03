<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Manga;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = Category::factory()
            ->count(1)
            ->create();

        $manga = Manga::factory()
            ->count(3)
            ->hasAttached($category, ['category_id' => 1])
            ->create();


    }
}
