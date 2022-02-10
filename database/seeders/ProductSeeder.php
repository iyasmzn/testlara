<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $categories = Category::all()->toArray();
        $productDetail = ProductDetail::all()->toArray();

        
        foreach ($productDetail as $key => $value) {
            $randCate = array_rand($categories);
            Product::create([
                'sku_product' => 'SKU-'.rand(1111,9999),           
                'id_category' => $categories[$randCate]['id'],           
                'id_product_detail' => $productDetail[$key]['id'],           
            ]);
        }
    }
}
