<x-layout>
    <div>
        <h1 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3">{{ __('ui.Revisore Dashboard') }}</h1>
    </div>
    <div class="container-fluid pb-5">
        <x-error />
        <x-success />

        @if ($ad_to_check)

            <div class="row justify-content-center pt-5">
                <!-- Sezione per le immagini -->
                <!-- Card con dettagli e azioni -->
                <div class="col-9 w-75 mx-auto p-4 col-s d-flex flex-column justify-content-between m-2">
                    <div class="">
                        <h5 class="col-b-text p-1">{{ __('ui.Titolo') }}: <span
                                class="fw-normal">{{ $ad_to_check->title }}</span></h5>
                        <h5 class="col-b-text p-1">{{ __('ui.Autore') }}: <span
                                class="fw-normal">{{ $ad_to_check->user->name }}
                                {{ $ad_to_check->user->surname }}</span></h5>
                        <h5 class="col-b-text p-1">{{ __('ui.Prezzo') }}: <span 
                            class="fw-normal">{{ $ad_to_check->price }}€
                        </h5>
                        <h5 class="col-b-text p-1">{{ __('ui.Categoria') }}: <span 
                            class="fw-normal">{{ $ad_to_check->category->name }}
                        </h5>
                        <h5 class="col-b-text p-1">{{ __('ui.Descrizione') }}: <span 
                            class="fw-normal">{{ $ad_to_check->description }}
                        </h5>
                    </div>

                </div>
            </div>
            <div class="row justify-content-evenly p-5 ">
                {{-- funzione immagini inserite dall'utente --}}
                @if ($ad_to_check->images->count())
                    @foreach ($ad_to_check->images as $key => $image)
                        <div class="col-md-3 col-12 d-flex justify-content-end mb-3">
                            <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid"
                                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $ad_to_check->title }}'">
                        </div>
                        <div class="col-md-2 col-12 p-3 mb-3 align-self-center">
                            <div>
                                <h5>Labels</h5>
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        <span class="label-font-cst">#{{ $label }}, </span>
                                    @endforeach
                                @else
                                    <p class="fst-italic">No labels</p>
                                @endif
                            </div>

                            <h5 class="">Ratings</h5>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->adult }}"></div>
                                </div>
                                <div class="col-10">adult</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->violence }}"></div>
                                </div>
                                <div class="col-10">violence</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                </div>
                                <div class="col-10">spoof</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->racy }}"></div>
                                </div>
                                <div class="col-10">racy</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->medical }}"></div>
                                </div>
                                <div class="col-10">medical</div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="col-lg-2 col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/noimage.png') }}" class="card-img-top" alt="Immagine segnaposto">
                    </div>
                </div>
                @endif
            </div>
            <div class="row justify-content-around pt-3">
                <div class="col-12 pb-3 col-md-4 justify-content-center d-flex">
                    <form action="{{ route('reject', ['ad' => $ad_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="px-4 delete-text">{{__('ui.Rifiuta')}}</button>
                    </form>
                </div>
                
                <div class="col-12 col-md-4 justify-content-center d-flex">
                    <form action="{{ route('accept', ['ad' => $ad_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="cst-button px-4">{{ __('ui.Accetta') }}</button>
                    </form>
                </div>
            </div>
        @else
            <!-- Nessun annuncio da revisionare -->
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-5 text-muted m-5">{{ __('ui.Nessun annuncio da revisionare') }}
                    </h1>
                </div>
            </div>
            <div class="row justify-content-center align-items-center text-center my-5">
               
                <div class="col-4">
                    <a href="{{ route('homepage') }}" class="cst-button py-3 px-4 fs-5">{{ __('ui.Homepage') }}</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
