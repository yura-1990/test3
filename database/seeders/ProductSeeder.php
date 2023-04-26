<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::query()->get();

        foreach ($category as $item){
            Product::query()->create([
                'title' => fake()->jobTitle,
                'category_id' => $item->id
            ]);
        }
    }
}
