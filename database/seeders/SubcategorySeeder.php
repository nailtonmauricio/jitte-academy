<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Subcategory::where('id', 1)->exists()) {
            Subcategory::create([
                'category_id' => 1,
                'name' => 'Programação',
            ]);
        }
    }
}
