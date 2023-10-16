<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Seeding dữ liệu cho bảng products
        $products = [
            [
                'name' => 'Product 1',
                'image' => '1.jpg',
                'price' => 100,
                'description' => 'Description of product 1',
                'category' => 'bonsai',
            ],
            [
                'name' => 'Product 2',
                'image' => '2.jpg',
                'price' => 150,
                'description' => 'Description of product 2',
                'category' => 'indoor-plants',
            ],

        ];

        // Sử dụng Eloquent để tạo các bản ghi trong bảng products
        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}

