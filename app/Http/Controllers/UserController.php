<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class UserController extends Controller
{
 public function index(){
   $user = auth()->user();
   $my_ads = Ad::where('user_id',$user->id)->where('is_accepted',true)->get();
   $my_wishlist = $user->wishlist;
    return view('profile.index',compact('user','my_ads','my_wishlist'));
 }
}
