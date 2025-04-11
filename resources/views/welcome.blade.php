<x-layout>

    <div class="container-fluid text-center">
        <div id="header" class="row">
            <div class="col-12 vh-100 header-custom d-flex flex-column justify-content-center">
                <x-error />
                <x-success />
                
                {{-- <div class="container py-4 z-3">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('img/Logo.png') }}" alt="">
                        </div>
                        <div class="col-8">
                            <h1 class="title-header2 text-start col-bg-text mt-5">
                                <span class="text-ri ts">Ri</span><span class="text-arreda ts">Arreda</span>
                            </h1>
                            <h2 class="text-start fs-1 ts "><span>Dai una seconda vita ai tuoi mobili</span></h2>
                        </div>
                    </div>
                </div> --}}
                <div class="logo-container z-3 p-3 d-flex align-items-center">
                    {{-- <img src="{{ asset('img/Logo.png') }}" alt="Logo RiArreda" class="z-3 logo-img"> --}}
                    <h1 class="title-header1 z-3 col-bg-text">
                        <span class="text-ri ts">Ri</span><span class="text-arreda ts2">Arreda</span> <br>
                        <span class="sottotitolo">{{__('ui.Occasioni uniche a prezzi imbattibili.')}}</span>
                    </h1>
                </div>
                
                <div class="m-5 z-2">
                    <a class="cst-button py-2 px-4 py-md-3 px-md-5 fs-6 fs-md-5"
                        href="{{ route('create.ad') }}">{{ __('ui.Pubblica un annuncio') }}</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-start display-5 display-md-4 col-b-text ps-3 py-4">
        {{ __('ui.Ultimi annunci inseriti') }}
    </h2>

    <div class="container text-center">
        <div class="row justify-content-center align-items-center my-3 pt-3 pb-5 h-100">
            @forelse ($ads as $ad)
                <div class="col-12 col-md-6 col-lg-3 p-3 col-s">
                    <x-card :ad="$ad" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.Non sono ancora stati creati degli annunci') }}</h3>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Sezione revisore --}}
    <div class="container-fluid text-center">
        <div class="row col-b">
            <div class="col-12 col-md-8 mx-auto d-flex flex-column justify-content-center col-bg-text size-section">
                <h2 class="title-section p-2">{{ __('ui.Vuoi diventare revisore?') }}</h2>
                <h2 class="subtitle-section pt-2">{{ __('ui.Aiutaci a mantenere il nostro marketplace sicuro.') }}</h2>
                <h2 class="subtitle-section">
                    {{ __('ui.Diventa un revisore e approva o rifiuta gli annunci messi in vendita dagli utenti.') }}
                </h2>
                <div class="p-4">
                    @if (Auth::check())
                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="cst-section-button fs-5">
                            {{ __('ui.Diventa revisore') }}
                        </button>
                    @else
                        <a class="cst-section-button px-md-4 fs-5 py-md-2 text-decoration-none col-b-text"
                            href="{{ route('login') }}">
                            {{ __('ui.Diventa revisore') }}
                        </a>
                    @endif
                </div>

                {{-- Modale --}}
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            @if (Auth::check() && !Auth::user()->is_revisor)
                                <div class="modal-header col-bg">
                                    <h5 class="modal-title modal-title-text" id="staticBackdropLabel">
                                        {{ __('ui.Conferma la tua scelta') }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body col-bg text-center">
                                    <p class="modal-text">{{ __('ui.Sei sicuro di voler diventare revisore?') }}</p>
                                </div>
                                <div class="modal-footer col-bg d-flex justify-content-evenly">
                                    <button type="button" class="delete-text me-2 fs-5"
                                        data-bs-dismiss="modal">{{ __('ui.Annulla') }}</button>
                                    <a href="{{ route('become.revisor') }}"
                                        class="cst-button width-custom fs-5">{{ __('ui.Conferma') }}</a>
                                </div>
                            @else
                                <div class="modal-header col-bg">
                                    <h5 class="modal-title modal-title-text" id="staticBackdropLabel">
                                        {{ __('ui.Attenzione') }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body col-bg text-center fw-normal">
                                    <p class="modal-text">{{ __('ui.Sei già un revisore!') }}</p>
                                </div>
                                <div class="modal-footer col-bg d-flex justify-content-center">
                                    <button type="button" class="cst-button width-custom me-2"
                                        data-bs-dismiss="modal">{{ __('ui.Chiudi') }}</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    

</x-layout>
