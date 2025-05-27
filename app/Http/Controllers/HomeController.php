<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Wishlist;
use App\Models\Cart;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display the home page with products, wishlist, and cart data.
     */
    public function index()
    {

        $products = Products::all();

        return Inertia::render('Home', [
            'products' => $products,
        ]);
    }

}
