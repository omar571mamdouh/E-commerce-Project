<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Burger Sandwich',
                'description' => 'A tasty beef burger sandwich with fresh lettuce, tomatoes, and cheese, perfect for lunch or dinner.',
                'price' => 120,
                'stock' => 20,
                'image' => 'burgerPhoto.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grilled Chicken',
                'description' => 'Succulent grilled chicken served with a side of vegetables, seasoned perfectly for a healthy meal.',
                'price' => 150,
                'stock' => 15,
                'image' => 'Chicken.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eggs',
                'description' => 'Fresh farm eggs, rich in protein, ideal for breakfast, baking, or cooking your favorite dishes.',
                'price' => 50,
                'stock' => 30,
                'image' => 'eggs-1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Milk',
                'description' => 'Organic fresh milk, packed with nutrients, suitable for daily consumption or adding to recipes.',
                'price' => 40,
                'stock' => 25,
                'image' => 'milk.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken',
                'description' => 'Juicy and tender grilled chicken, perfectly seasoned with a blend of herbs and spices. Served hot with a side',
                'price' => 80,
                'stock' => 20,
                'image' => 'chickenphoto.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Burger Sandwich Deluxe',
                'description' => 'Double beef patties, extra cheese, fresh veggies, and special sauce make this deluxe burger an ultimate treat.',
                'price' => 180,
                'stock' => 10,
                'image' => 'burger3photo.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pizza Margherita',
                'description' => 'Classic Margherita pizza with tomato sauce, mozzarella cheese, and fresh basil leaves, baked to perfection.',
                'price' => 200,
                'stock' => 12,
                'image' => 'imrs.avif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pizza Pepperoni',
                'description' => 'Pepperoni pizza topped with spicy pepperoni slices, melted mozzarella, and a rich tomato sauce.',
                'price' => 220,
                'stock' => 10,
                'image' => 'PizzaPhoto.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
