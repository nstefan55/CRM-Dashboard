<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            CustomerSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            ActivitySeeder::class,
        ]);



        $orders = Order::all();
        $products = Product::all();

        $orders->each(function ($order) use ($products) {
            $order->products()->attach(
                $products->random(rand(1, 5))->pluck('id')->toArray(),
                [
                    'quantity' => rand(1, 10),
                    'unit_price' => rand(10, 100),
                ]
            );
        });
    }
}
