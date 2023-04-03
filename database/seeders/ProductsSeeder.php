<?php

namespace Database\Seeders;

use App\Models\ProductsTable;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'ProductName' => 'เมาส์ Logitech Wired Mouse M100R USB (Box)',
                'ProductPrice' => 199,
                'category_id' => 1
            ],
            [
                'ProductName' => 'เมาส์ไร้สาย Logitech Bluetooth Mouse MX Master 3S Graphite',
                'ProductPrice' => 4190,
                'category_id' => 1
            ],
            [
                'ProductName' => 'เมาส์ไร้สาย Logitech Bluetooth Vertical Mouse Lift Black',
                'ProductPrice' => 2190,
                'category_id' => 1
            ],
            [
                'ProductName' => 'เมาส์ไร้สาย Logitech Signature M650 Graphite',
                'ProductPrice' => 1090,
                'category_id' => 1
            ],

            [
                'ProductName' => 'คีย์บอร์ด Logitech Bluetooth Keyboard MX Keys',
                'ProductPrice' => 4490,
                'category_id' => 2
            ],
            [
                'ProductName' => 'คีย์บอร์ด Logitech Bluetooth Keyboard Multi-Device',
                'ProductPrice' => 1299,
                'category_id' => 2
            ],
            [
                'ProductName' => 'คีย์บอร์ดไร้สาย Logitech Bluetooth Keyboard POP',
                'ProductPrice' => 3690,
                'category_id' => 2
            ],
            [
                'ProductName' => 'คีย์บอร์ดเกมมิ่ง Logitech Gaming Keyboard G Pro',
                'ProductPrice' => 4190,
                'category_id' => 2
            ],

            [
                'ProductName' => 'LG TV OLED55C1PTB',
                'ProductPrice' => 69990,
                'category_id' => 3
            ],
            [
                'ProductName' => 'SAMSUNG TV UHD 4K UA65AU8100KXXT 65 inch',
                'ProductPrice' => 26990,
                'category_id' => 3
            ],
            [
                'ProductName' => 'LG TV NanoCell 4K 43NANO75TPA 43 inch',
                'ProductPrice' => 8990,
                'category_id' => 3
            ],
            [
                'ProductName' => 'Xiaomi Mi TV P1 32 inch Black',
                'ProductPrice' => 4990,
                'category_id' => 3
            ],
        ];

        ProductsTable::insert($products);
    }
}
