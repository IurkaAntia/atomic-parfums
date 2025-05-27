<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        // Return the wishlist data as JSON
        return response()->json([
            'wishlist' => $wishlist,
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
         ]);

         // Check if the product is already in the wishlist
         $existingWishlistItem = Wishlist::where('user_id', Auth::id())
             ->where('product_id', $request->product_id)
             ->first();

         if ($existingWishlistItem) {
             // Return a JSON response indicating the product is already in the wishlist
             return back()->with('message', 'Already in wishlist');
         }

         // Add the product to the wishlist
         Wishlist::create([
             'user_id' => Auth::id(),
             'product_id' => $request->product_id,
         ]);

         // Return a success response
         return back()->with('message', 'Added to wishlist');
     }


    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {

        // Optionally, make sure user owns the cart item
        if ($wishlist->user_id !== auth()->id()) {
            abort(403);
        }

        $wishlist->delete();

        return redirect()->back(); // or return a 200 JSON if using JS

    }
}
