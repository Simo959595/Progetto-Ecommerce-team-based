<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::where('is_accepted',true)->orderBy('created_at', 'desc')->paginate(8);
        return view('ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ad.create");
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
    public function show(Ad $ad)
    {
        return view('ad.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }
    public function byCategory(Category $category)
    {

        $ads=$category->ads()->where('is_accepted',true)->paginate(8);
        // $ads=$category->ads->where('is_accepted',true);
        return view('ad.byCategory', compact('ads','category'));
    }
}
