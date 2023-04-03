<?php

namespace Database\Seeders;

use App\Models\ProductCategoryTable;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategoryTable::create([
            'CategoryName' => 'เมาส์',
        ]);
        ProductCategoryTable::create([
            'CategoryName' => 'คีย์บอร์ด',
        ]);
        ProductCategoryTable::create([
            'CategoryName' => 'จอมอนิเตอร์',
        ]);
    }
}
