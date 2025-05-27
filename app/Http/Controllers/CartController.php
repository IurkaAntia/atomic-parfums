<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

                // Return the wishlist data
        return inertia('Home', [
            'cart' => $cart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {
         $request->validate([
             'product_id' => 'required|exists:products,id',
             'quantity' => 'required|integer|min:1',
         ]);

         // Add to cart or update quantity if it already exists
         $cartItem = Cart::updateOrCreate(
             [
                 'user_id' => Auth::id(),
                 'product_id' => $request->product_id,
             ],
             [
                 'quantity' => \DB::raw('quantity + ' . $request->quantity),
             ]
         );

         return back(); // or use Inertia::location(route('home')) if needed
     }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Cart $cart)
     {
         // Optionally, make sure user owns the cart item
         if ($cart->user_id !== auth()->id()) {
             abort(403);
         }

         $cart->delete();

         return redirect()->back(); // or return a 200 JSON if using JS
     }

}
