<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['products', 'customer'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();

        $products = Product::all();

        $users = User::all();

        return view('orders.create', compact('customers', 'products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // File: app/Http/Controllers/OrderController.php

    public function store(StoreOrderRequest $request)
    {

        $validatedData = $request->validate([
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);


        $order = Order::create($validatedData);


        $productId = $validatedData['product_id'];
        $quantity = $validatedData['quantity'];
        $totalAmount = $validatedData['total_amount'];


        $unitPrice = $totalAmount / $quantity;


        $order->products()->attach($productId, [
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'status' => 'pending'
        ]);


        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }


    // File: app/Http/Controllers/OrderController.php


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
