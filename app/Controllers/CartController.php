<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve the cartItems from the session
        $cartItems = session('cartItems') ?? [];


        // Pass the cartItems to the cart view
        return view('cart', ['cartItems' => $cartItems]);
    }
    public function addtocart()
    {
        return view('addcart');
    }
}
