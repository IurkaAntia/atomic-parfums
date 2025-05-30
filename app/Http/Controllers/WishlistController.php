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
        return inertia('Wishlist', [
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

        $userId = Auth::id();
        $ip = $request->ip();

        // Check for existing item by user_id or ip_address
        $existingWishlistItem = Wishlist::where('product_id', $request->product_id)
            ->when($userId, fn($query) => $query->where('user_id', $userId))
            ->when(!$userId, fn($query) => $query->where('ip_address', $ip))
            ->first();

        if ($existingWishlistItem) {
            return back()->with('message', 'Already in wishlist');
        }
        
        Wishlist::create([
            'product_id' => $request->product_id,
            'user_id' => $userId,
            'ip_address' => $ip,
        ]);

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
        if ((auth()->check() && $wishlist->user_id !== auth()->id()) ||(!auth()->check() && $wishlist->ip_address !== request()->ip())) {
            abort(403);
        }



        $wishlist->delete();

        return redirect()->back(); // or return a 200 JSON if using JS

    }
}
