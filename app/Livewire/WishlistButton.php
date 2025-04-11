<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class WishlistButton extends Component
{
    public $ad;
    public $isInWishlist;

    public function mount(Ad $ad)
    {
        $this->ad = $ad;
        $this->isInWishlist = Auth::user()?->wishlist()->where('ad_id', $ad->id)->exists();
    }

    public function toggleWishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Devi essere autenticato per usare la wishlist.');
        }

        if ($this->isInWishlist) {
            Auth::user()->wishlist()->detach($this->ad);
        } else {
            Auth::user()->wishlist()->attach($this->ad);
        }

        $this->isInWishlist = !$this->isInWishlist;
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
