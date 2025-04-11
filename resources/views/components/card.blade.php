<div class="card mx-auto border-0 ">
    <img src="{{ $ad->images->isNotEmpty() ? $ad->images->first()->getUrl(300, 300) : asset('img/noimage.png') }}"
        class="col-bg img-fluid p-2 no-radius" alt="Immagine dell'articolo {{ $ad->title }}">
    <div class=" px-3 col-bg no-radius">
        <h5 class=" text-start m-0 col-b-text">{{ $ad->title }}</h5>
        <div class="text-start mb-3">
            <a href="{{ route('byCategory', ['category' => $ad->category]) }}"
                class="text-none col-b-text">{{ $ad->category->name }}</a>
        </div>
        <h6 class="col-b-text text-start">{{ __('ui.Prezzo') }}: {{ $ad->price }} €</h6>

        <div class="d-flex justify-content-between align-items-center my-1 mb-3">
            @if (
                (Auth::check() && Auth::user()->is_revisor) && Route::currentRouteName() == 'revisor.adRejected')
                <form action="{{ route('backup', ['ad' => $ad]) }}" method="POST" class="mt-3">
                    @csrf
                    @method('PATCH')
                    <button class="border-0 col-bg">
                        <i class="fs-3 mt-4 bi bi-reply"></i>
                    </button>
                </form>
            @endif
            <a href="{{ route('ad.show', compact('ad')) }}"
                class="text-center cst-button-card2 mt-3">{{ __('ui.Dettaglio') }}
            </a>
            @auth
                @if (Route::currentRouteName() != 'revisor.adRejected')
                    <livewire:wishlist-button :ad="$ad" />
                @endif
            @endauth
            {{-- <i class="fs-3 mt-3 bi bi-heart col-b-text"></i> --}}
        </div>
        <div>


        </div>

    </div>
</div>
