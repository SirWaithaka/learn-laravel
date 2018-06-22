<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Laptops
        for ($i = 0; $i <= 30; $i ++) {
            Product::create([
                'name' => 'Laptop '. $i,
                'slug' => 'laptop-'. $i,
                'details' => [13, 14, 15][array_rand([13,14,15])] . ' inch, ' . [1,2,3][array_rand([1,2,3])] . ' TB, SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        // Desktops
        for ($i = 0; $i <= 9; $i ++) {
            Product::create([
                'name' => 'Desktop '. $i,
                'slug' => 'desktop-'. $i,
                'details' => [24, 25, 27][array_rand([24,25,27])] . ' inch, ' . [1,2,3][array_rand([1,2,3])] . ' TB, SSD, 32GB RAM',
                'price' => rand(249999, 449999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(2);
        }

        // Phones
        for ($i = 0; $i <= 9; $i ++) {
            Product::create([
                'name' => 'Phone '. $i,
                'slug' => 'phone-'. $i,
                'details' => [16, 32, 64][array_rand([16,32,64])] . 'GB, 5.' . [7,8,9][array_rand([7,8,9])] . ' inch screen, 4Ghz Quad Core',
                'price' => rand(74999, 144999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(3);
        }

        // Tablets
        for ($i = 0; $i <= 9; $i ++) {
            Product::create([
                'name' => 'Tablet '. $i,
                'slug' => 'tablet-'. $i,
                'details' => [16, 32, 64][array_rand([16,32,64])] . 'GB, 5.' . [10,11,12][array_rand([10,11,12])] . ' inch screen, 4Ghz Quad Core',
                'price' => rand(49999, 149999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(4);
        }

        // TVs
        for ($i = 0; $i <= 9; $i ++) {
            Product::create([
                'name' => 'TV '. $i,
                'slug' => 'tv-'. $i,
                'details' => [46, 50, 60][array_rand([7,8,9])] . ' inch Screen, Smart Tv, 4K',
                'price' => rand(79999, 144999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(5);
        }

        // Cameras
        for ($i = 0; $i <= 9; $i ++) {
            Product::create([
                'name' => 'Camera '. $i,
                'slug' => 'camera-'. $i,
                'details' => 'Full Frame DSLR, with 18-55mm kit lens',
                'price' => rand(74999, 249999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(6);
        }

        // Appliances
        for ($i = 0; $i <= 9; $i ++) {
            Product::create([
                'name' => 'Appliance '. $i,
                'slug' => 'appliance-'. $i,
                'details' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
                'price' => rand(74999, 144999),
                'description' => 'Lorem '.$i.' ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
            ])->categories()->attach(7);
        }
    }
}
