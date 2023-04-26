<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalog = Catalog::query()->get();

        foreach ($catalog as $item){
            Category::query()->create([
                'title' => fake()->jobTitle(),
                'catalog_id' => $item->id
            ]);
        }
    }
}
