<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // テーブルのクリア
    DB::table('products')->truncate();

     //データ用意
    $products = [
                  [
                  'p_name' => 'りんご',
                  'p_detail' => '青森県産のりんごです。',
                  'p_price' => 150,
                  'image1' => 'apple1.png',
                  'image2' => 'apple2.png',
                  'image3' => 'apple3.png'
                  ],
                  [
                  'p_name' => 'バナナ',
                  'p_detail' => '南国のバナナです。',
                  'p_price' => 130,
                  'image1' => 'banana1.png',
                  'image2' => 'banana2.png',
                  'image3' => 'banana3.png'
                  ],
                  [
                  'p_name' => 'いちご',
                  'p_detail' => '栃木県産のいちごです。',
                  'p_price' => 500,
                  'image1' => 'strawberry1.png',
                  'image2' => 'strawberry2.png',
                  'image3' => 'strawberry3.png'
                  ],
                  [
                  'p_name' => 'みかん',
                  'p_detail' => '愛媛県産のみかんです。',
                  'p_price' => 400,
                  'image1' => 'orange1.png',
                  'image2' => 'orange2.png',
                  'image3' => 'orange3.png'
                  ],
                ];

    // 登録
    foreach(($products) as $product) {
      \App\Models\Product::create($product);
    }
    }
}