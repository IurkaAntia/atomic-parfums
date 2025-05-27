<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Wishlist;
use App\Models\Cart;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $products = Products::all();



        // Return data to the frontend
        return inertia('Home', [
            'products' => $products,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     public function show(Products $product)
     {
         $inWishlist = false;

         if (Auth::check()) {
             $inWishlist = Wishlist::with('products')->where('user_id', Auth::id())
                                   ->where('product_id', $product->id)
                                   ->exists();
         }

         return Inertia::render('products/Show', [
             'product' => $product,
             'inWishlist' => $inWishlist,
             'isAuthenticated' => Auth::check(),
         ]);
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
