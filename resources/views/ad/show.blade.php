<x-layout>
    <div class="col-12">
        <h1 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3 pb-3">{{ $ad->title }}</h1>
    </div>
    <div class="container ">
        <div class="row height-custom justify-content-evenly mb-5 ms-0 me-0 py-3 col-s">
            @auth
            <div class="col-12 d-md-none text-end">
                <livewire:wishlist-button :ad="$ad" />
            </div>
            @endauth
            <div class="col-12 col-md-5">

                @if ($ad->images->count() > 0)


                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($ad->images as $key => $image)
                                <div class="carousel-item px-5 p-md-5 @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                                        alt="Immagine {{ $key + 1 }} dell'annuncio {{ $ad->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($ad->images->count() > 1)
                            <button class="carousel-control-prev me-5 pe-5" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                <i class="bi bi-arrow-left-circle fs-2  col-b-text"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next ms-5 ps-5" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <i class="bi bi-arrow-right-circle fs-2  col-b-text"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>

                    {{-- <div class="my-2 swiper swiperCst">
                            <div class="swiper-wrapper">
                                @foreach ($ad->images as $key => $image)
                                    <div class="swiper-slide m-0 p-5 col-s">
                                        <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                                            alt="Immagine {{ $key + 1 }} dell'annuncio {{ $ad->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div> --}}
                @else
                    <img src={{asset('img/noimage.png')}} alt="Foto non inserita dall'utente">
                @endif

            </div>
            <div class="col-11 col-md-4 mb-3 height-custom d-flex flex-column justify-content-center">
                <div>
                    <h4 class="fw-semibold p-2">{{ __('ui.Prezzo') }}: <span class="fw-normal">{{ $ad->price }} €</span>
                    </h4>
                    <h4 class="fw-semibold p-2">{{ __('ui.Colore') }}: <span class="fw-normal">{{ $ad->color }}</span>
                    </h4>
                    <h4 class="fw-semibold p-2">{{ __('ui.Condizione') }}: <span
                            class="fw-normal">{{ $ad->status }}</span></h4>
                    <h4 class="fw-semibold p-2">{{ __('ui.Descrizione') }}: <span
                            class="fw-normal">{{ $ad->description }}</span></h4>
                        <h4 class="fw-semibold p-2">{{ __('ui.Categoria') }}: 
                            <a class="col-b-text" href="{{ route('byCategory', ['category' => $ad->category]) }}"> 
                                <span class="fw-normal">{{ $ad->category->name }}</span>
                            </a>
                        </h4>
                </div>
            </div>
            <div class="col-1 d-none d-md-block fs-1">
                @auth
                <livewire:wishlist-button :ad="$ad" />
                @endauth
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".swiperCst", {
                cssMode: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                mousewheel: true,
                keyboard: true,
            });
        });
    </script>
</x-layout>
