<x-layout>
    <h1 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3">{{ __('ui.Accedi al tuo account') }}:</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6">
                <form method="POST" action="{{ route('login') }}" class="cst-form p-md-5 p-3 my-5">
                    @csrf

                    <!-- Indirizzo Email -->
                    <div class="mb-3">
                        <label class="fw-semibold form-label">{{ __('ui.Indirizzo Email') }}</label>
                        <input placeholder="Inserisci il tuo indirizzo email" type="email"
                            class="cst-input w-100 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="fw-semibold form-label">Password</label>
                        <input placeholder="Inserisci la tua password" type="password"
                            class="cst-input w-100 @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pulsante Accedi -->
                    <div class="d-flex justify-content-center pt-4">
                        <button type="submit" class="cst-button px-4">{{ __('ui.Accedi') }}</button>
                    </div>

                    <!-- Link alla Registrazione -->
                    <div class="text-center mt-3">
                        <p class="mb-1">{{ __('ui.Ancora non hai un account?') }} </p>
                        <div>
                            <a class="fs-6 p-0 m-0 fw-bold col-b-text" href="{{ route('register') }}">
                                {{ __('ui.Iscriviti') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
