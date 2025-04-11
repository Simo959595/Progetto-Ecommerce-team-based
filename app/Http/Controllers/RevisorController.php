<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $ad_to_check = Ad::where('is_accepted', null)->first();
        return view('revisor.index', compact('ad_to_check'));
    }

    public function accept(Ad $ad)
    {
        $ad->setAccepted(true);
        return redirect()->back()->with('success', "Hai accettato l'articolo $ad->title");
    }
    public function reject(Ad $ad)
    {
        $ad->setAccepted(false);
        return redirect()->back()->with('error', "Hai rifiutato l'articolo $ad->title");
    }
    public function backup(Ad $ad)
    {
        $ad->is_accepted = null;
        $ad->save();
        return redirect()->back()->with('success', "L'annuncio è dinuovo disponibile nella zona revisore.");
    }

    public function becomeRevisor()
    {
        Mail::to('admin@riarreda.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('success', 'La tua richiesta per diventare revisor è stata inviata con successo');
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function adRejected(){
        $ads_rejected = Ad::where('is_accepted', false)->paginate(8);
        return view('revisor.rejected', compact('ads_rejected'));
    }
}
