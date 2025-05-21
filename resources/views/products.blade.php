<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
            font-size: 2.5rem;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-top: 50px;
        }

        .products-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .product-name {
            font-size: 1.4rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.2rem;
            color: #e74c3c;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .buy-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .buy-btn:hover {
            background-color: #2980b9;
        }

        hr {
            display: none; /* We'll use grid gap instead */
        }

        @media (max-width: 768px) {
            .products-list {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome {{ $user->name }}</h1>
<p>You have logged in successfully at {{ now() }}</p>
@foreach(auth()->user()->notifications as $notification)
    <div class="notification">
        {{ $notification->data['message'] }}
    </div>
@endforeach

    <div class="container">

        <h1>Available Products</h1>

        @if($products->isEmpty())
            <p class="empty-message">No products available.</p>
        @else
            <div class="products-list">
                @foreach($products as $product)
                    <div class="product-card">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-price">${{ number_format($product->price, 2) }}</p>
                        <form action="/buy" method="POST">
                            @csrf
                               <input type="hidden" name="product_id" value="{{ $product->id }}">
                                 <button type="submit" class="buy-btn">>Add to Cart</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
