<x-layout>
    <x-success/>
    <div>
        <h2 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3">{{__('ui.Annunci rifiutati')}}</h2>
</div>
    <div class="container mt-5">
        <div class="row height-custom justify-content-center align-items-center">
            @forelse ($ads_rejected as $ad)
                <div class="col-12 col-md-3 px-2 py-3 col-s mb-5">
                    <x-card :ad="$ad" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">{{__('ui.Non sono ancora stati creati annunci')}}</h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $ads_rejected->links() }}
        </div>
    </div>
</x-layout>
