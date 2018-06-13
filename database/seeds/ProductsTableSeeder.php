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
        Product::create([
            'name' => 'Macbook',
            'slug' => 'macbook',
            'details' => '15 inch, 1TB ssd, 16GB ram',
            'price' => 2499,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
        ]);

        Product::create([
            'name' => 'Laptop 2',
            'slug' => 'laptop-2',
            'details' => '15 inch, 1TB ssd, 16GB ram',
            'price' => 2499,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
        ]);

        Product::create([
            'name' => 'Laptop 3',
            'slug' => 'laptop-3',
            'details' => '15 inch, 1TB ssd, 16GB ram',
            'price' => 2499,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
        ]);

        Product::create([
            'name' => 'Laptop 4',
            'slug' => 'laptop-4',
            'details' => '15 inch, 1TB ssd, 16GB ram',
            'price' => 2499,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
        ]);

        Product::create([
            'name' => 'Laptop Pro',
            'slug' => 'laptop-5',
            'details' => '15 inch, 1TB ssd, 16GB ram',
            'price' => 2499,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
        ]);

        Product::create([
            'name' => 'Laptop 6',
            'slug' => 'laptop-6',
            'details' => '15 inch, 1TB ssd, 16GB ram',
            'price' => 2499,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat alias minima quisquam vitae consequatur, fuga reiciendis distinctio ullam animi aperiam praesentium atque deleniti. Officiis, fugiat ex voluptate dolor distinctio quos.',
        ]);
    }
}
