<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Notifications\MyNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

public function buy(Request $request)
{
    $product = Product::find($request->product_id);

    if (!$product) {
        return redirect('/products')->with('error', 'Product not found.');
    }

    $user = Auth::user(); 
    $user->notify(new MyNotif("You have bought the product: {$product->name}"));

    // Redirect to products view with $user and products
    $products = Product::all(); // get all products to show again
    return view('products', compact('products', 'user'));
}

}
