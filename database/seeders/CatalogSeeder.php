<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Catalog 1'],
            ['title' => 'Catalog 2'],
            ['title' => 'Catalog 3'],
            ['title' => 'Catalog 4'],
            ['title' => 'Catalog 5'],
            ['title' => 'Catalog 6'],
            ['title' => 'Catalog 7'],
            ['title' => 'Catalog 8'],
        ];

        Catalog::query()->insert($data);
    }
}
