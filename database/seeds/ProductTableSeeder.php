<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://www.bhphotovideo.com/images/images2500x2500/apple_z0sh_mlh4231_bh_macbook_pro_15_inch_with_1294036.jpg',
            'title' => 'MacBook Pro 15"',
            'description' => 'A good computer',
            'price' => 2800
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/image/AppleInc/aos/published/images/m/bp/mbp13touch/space/mbp13touch-space-select-201807?wid=1808&hei=1680&fmt=jpeg&qlt=80&.v=1529520060550',
            'title' => 'MacBook Pro 13"',
            'description' => 'A good computer',
            'price' => 1900
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/image/AppleInc/aos/published/images/m/ac/macbook/air/macbook-air-201810-gallery4?wid=4000&hei=3072&fmt=jpeg&qlt=80&op_usm=0.5,0.5&.v=1541629418397',
            'title' => 'MacBook Air 13"',
            'description' => 'A good computer, color salmon',
            'price' => 2200
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://www.bhphotovideo.com/images/images2500x2500/apple_mrec2ll_a_13_3_macbook_air_with_1441819.jpg',
            'title' => 'MacBook Air 13"',
            'description' => 'A good computer, plateado',
            'price' => 2200
        ]);
        $product->save();
    }
}
