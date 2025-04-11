<x-layout>
    <div>
        <h2 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3">{{ $category->name }}</h2>
</div>
    <div class="container">
        <div class="row height-custom justify-content-center align-items-center ">
            @forelse ($ads as $ad)
                <div class="col-12 col-md-3 px-2 py-3 col-s mb-5">
                    <x-card :ad="$ad" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>
                        {{__('ui.Non sono ancora stati creati annunci per questa categoria!')}}
                    </h3>
                    @auth
                    <div class="m-5">
                        <a class="cst-button my-5 py-3 px-4" href="{{ route('create.ad') }}">{{__('ui.Pubblica un annuncio')}}</a>
                    </div>
                    @endauth
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