<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            $order->products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'quantity' => rand(1, 5),
                    'unit_price' => rand(10, 100) / 10,
                    'order_placed_at' => now(),
                    'status' => 'pending',
                ]
            );
        }
    }
}
