<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Orders</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Associated Products</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>
                            @if ($order->products->isEmpty())
                            <span>No products associated</span>
                            @else
                            <ul class="list-group">
                                @foreach ($order->products as $product)
                                <li class="list-group-item">
                                    <div>
                                        <strong>Product Name:</strong> {{ $product->name ?? 'N/A' }}
                                    </div>
                                    <div>
                                        <strong>Quantity:</strong> {{ $product->pivot->quantity ?? 'N/A' }}
                                    </div>
                                    <div>
                                        <strong>Status:</strong> {{ $product->pivot->status ?? 'No Status' }}
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>