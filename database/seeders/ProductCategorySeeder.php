<?php

namespace Database\Seeders;

use App\Models\ProductCategoryTable;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'CategoryName' => 'เมาส์',
                'CategoryStatus' => 1,
                'CategoryMaxRequest' => 1
            ],
            [
                'CategoryName' => 'คีย์บอร์ด',
                'CategoryStatus' => 1,
                'CategoryMaxRequest' => 1
            ],
            [
                'CategoryName' => 'จอมอนิเตอร์',
                'CategoryStatus' => 1,
                'CategoryMaxRequest' => -1
            ],
            [
                'CategoryName' => 'หูฟัง',
                'CategoryStatus' => 0,
                'CategoryMaxRequest' => 1
            ],
            [
                'CategoryName' => 'โต๊ะ',
                'CategoryStatus' => 0,
                'CategoryMaxRequest' => 1
            ],
            [
                'CategoryName' => 'เก้าอี้',
                'CategoryStatus' => 0,
                'CategoryMaxRequest' => 1
            ]
        ];

        ProductCategoryTable::insert($category);
    }
}
