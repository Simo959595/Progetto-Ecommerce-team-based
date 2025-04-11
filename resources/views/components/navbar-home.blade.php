<nav id="navbar" class="navbar navbar-expand-lg fixed-top nav-trans">
    <div class="container-fluid">
        {{-- logo --}}
        <a href="{{ route('homepage') }}"><img class="cst-dim" src="{{ asset('img/Logo.png') }}" alt="Logo"></a>
        {{-- campo ricerca mobile --}}
        <div class="d-md-none">
            <form class="d-flex ms-auto me-sm-auto" role="search" action="{{ route('ad.search') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="query" class="form-control" placeholder="Cerca..."
                        aria-label="Search">
                    <button type="submit" class="btn-search input-group-text" id="basic-addon2">
                        Cerca
                    </button>
                </div>
            </form>
        </div>
        {{-- bottone apertura navbar mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a  class="navElement col-bg-text nav-link active fs-5" aria-current="page" href="{{ route('ad.index') }}">Tutti gli
                        articoli</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a  class="navElement col-bg-text nav-link active fs-5" href="{{ route('create.ad') }}">{{__('ui.Crea un annuncio')}} </a>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a  class='navElement col-bg-text nav-link dropdown-toggle active fs-5 ' href=""role='buttom'
                        data-bs-toggle='dropdown' aria-expamded='false'>
                        Categorie
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', ['category' => $category]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @if (!$loop->last)
                                <hr class='dropdown-divider'>
                            @endif
                        @endforeach

                    </ul>
                </li>
            </ul>
            {{-- ZONA NAVBAR DI DESTRA --}}



            <ul class="navbar-nav mb-2 mb-lg-0">

                <li class="nav-item pt-1">
                <form class="d-flex ms-auto me-sm-auto" role="search" action="{{ route('ad.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control col-o col-b-text" placeholder="Cerca..."
                            aria-label="Search">
                        <button type="submit" class="btn-search input-group-text" id="basic-addon2">
                            Cerca
                        </button>
                    </div>
                </form>
                </li>

                @guest
                    <li class="nav-item">
                        <a  class="navElement col-bg-text nav-link fs-5" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a  class="navElement col-bg-text nav-link fs-5 me-2" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest

                @auth

                    <li class="nav-item dropdown-center ms-2">
                        <a  class='navElement col-bg-text nav-link dropdown-toggle active fs-5' href=""role='buttom'
                            data-bs-toggle='dropdown' aria-expamded='false'>Ciao {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            @if (Auth::user()->is_revisor)
                                <li class="ms-3">
                                    <a class="nav-item text-decoration-none col-b-text fw-semibold"
                                        href="{{ route('revisor.index') }}">Zona revisore
                                        <span class=" text-white rounded-pill bg-danger px-2 fw-bold">
                                            {{ \App\Models\Ad::toBeRevisedCount() }} </span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif

                            <li class="nav-item py-1">
                                <form action="{{ route('logout') }}" method="POST" class="">
                                    @csrf
                                    <button class="btn btn-danger mx-auto d-block fw-semibold px-4">Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>

                @endauth

                <x-_locale lang="it" />
                <x-_locale lang="en" />
                <x-_locale lang="es" />

            </ul>
        </div>
    </div>
</nav>
