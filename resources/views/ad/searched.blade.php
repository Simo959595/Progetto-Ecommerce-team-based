<x-layout>
    <div>
        <h1 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3 pb-3">{{__('ui.Risultati per la ricerca')}} "<span class="fst-italic">{{ $query }}</span>":</h1>
    </div>
    <div class="container">
        <div class="row height-custom justify-content-center align-items-center px-2 py-3 col-s mb-5 ps-3">
            @forelse ($ads as $ad)
                <div class="col-12 col-md-3">
                    <x-card :ad="$ad" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{__('ui.Nessun annuncio corrisponde alla tua ricerca')}}</h3>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $ads->links() }}
            </div>
        </div>
    </div>
</x-layout>