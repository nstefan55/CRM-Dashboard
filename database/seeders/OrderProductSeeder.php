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
    public function run(): void
    {
        $orders = Order::all(); // dohvatiti ce sve naredbe

        $orders->each(function ($order) {
            $products = Product::inRandomOrder()->take(rand(1, 5))->get();

            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => rand(1, 10),
                    'unit_price' => $product->price,
                    'order_placed_at' => now(),
                    'status' => 'completed' //pisati ce nasumican status
                ]);
            }
        });
    }
}
