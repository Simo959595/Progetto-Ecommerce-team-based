<x-layout>
    <h1 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3">{{ __('ui.Il mio profilo') }}</h1>
    <div class="container-fluid">
        <div class="row m-0 p-3 mb-5">
            <div class="col-12 col-md-3 me-4 pt-3 col-bg ">
                <div class="sti-position mb-4 col-bg p-2 d-flex flex-column justify-content-center shadow">
                    <h2 class="fs-5 p-2">{{ $user->name }} {{ $user->surname }}</h2>
                    <h2 class="fs-5 p-2">{{ $user->email }}</h2>
                    <h2 class="fs-5 p-2">{{ $user->telephone_number }}</h2>
                    @if (Auth::user()->is_revisor)
                        <h2 class="fs-5 p-2">{{ __('ui.Sei un revisore') }}</h2>
                    @else
                        <h2 class="fs-5 p-2">{{ __('ui.Non sei un revisore') }}</h2>
                    @endif
                    <h2 class="fs-5 p-2">{{ __('ui.Profilo creato il') }} {{ $user->created_at }}</h2>
                </div>
            </div>

            <div class="col-md-8">
                <div class="fst-italic display-5 col-b-text ms-4 pb-2 ps-3">{{ __('ui.La mia wishlist') }}</div>
                <div class="my-3 ">
                    @if ($my_wishlist->count() != 0)
                        <div class="my-2 swiper mySwiper col-s shadow w-100">
                            <div class="swiper-wrapper col-s p-3 me-0">
                                @foreach ($my_wishlist as $ad)
                                    <div class="swiper-slide" style="margin-right: 7px; margin-left: 7px;">
                                        <x-card :ad="$ad" />
                                        {{-- <img src="https://picsum.photos/200" class="" alt=""> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Paginazione -->
                        <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="col-s p-2 shadow">
                    <h1 class="fst-italic display-6 col-bg col-b-text p-3 m-0 text-center">
                        {{ __('ui.Nessun annuncio presente nella tua wishlist') }}</h1>
                </div>
                @endif



                <div class="fst-italic display-5 col-b-text ms-4 mt-5 pt-2 ps-3">{{ __('ui.I miei annunci') }}</div>
                <div class="my-3 ">
                    {{-- {{dd($my_ads)}} --}}
                    @if ($my_ads->count() != 0)
                        <div class="my-2 swiper mySwiper col-s shadow w-100">
                            <div class="swiper-wrapper col-s p-3 me-0">
                                @foreach ($my_ads as $ad)
                                    <div class="swiper-slide" style="margin-right: 7px; margin-left: 7px;">
                                        <x-card :ad="$ad" />
                                        {{-- <img src="https://picsum.photos/200" class="" alt=""> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Paginazione -->
                        <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="col-s p-2 shadow mb-5">
                    <h1 class="fst-italic display-6 m-0 col-bg col-b-text p-3 text-center">
                        {{ __('ui.Nessun annuncio presente nella tua wishlist') }}</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("caricato")
            new Swiper(".mySwiper", {
                loop: false,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                slidesPerView: 1,
                spaceBetween: 30,
                freeMode: true,
                breakpoints: {
                    992:{
                        slidesPerView:3,
                    },
                    768:{
                        slidesPerView:2,
                    }
                }
            });
        });
    </script>
</x-layout>
