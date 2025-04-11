<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistAds = Auth::user()->wishlist;
        return view('wishlist.index', compact('wishlistAds'));
    }
}
