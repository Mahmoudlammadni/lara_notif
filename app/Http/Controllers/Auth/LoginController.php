<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotificationMail;
use App\Models\Product;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


public function login(Request $request)
{
    $infos = $request->only('email', 'password');

    if (Auth::attempt($infos)) {
        $user = Auth::user();
        Mail::to($user->email)->send(new \App\Mail\LoginNotificationMail($user));

        $products = Product::all();

        return view('products', compact('user', 'products'));
    }

    return back()->withErrors(['email' => 'Invalid infos']);
}


}
