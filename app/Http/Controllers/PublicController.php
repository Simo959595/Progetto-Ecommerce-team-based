<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $ads = Ad::where('is_accepted',true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('ads'));
    }

    public function searchAds(Request $request)
{
    $query = $request->input('query');
    $ads = Ad::search($query)->where('is_accepted', true)->paginate(10);
    return view('ad.searched', ['ads' => $ads, 'query' => $query]);
}

public function setLanguage($lang)
{

    session()->put('locale',$lang);
    return redirect()->back();
}
}
