<x-layout>
    <h1 class="fst-italic display-5 col-b-text ms-4 mt-5 pt-5 ps-3">{{__("ui.Crea il tuo account")}}:</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-7">
                <form method="POST" action="{{ route('register') }}" class="cst-form p-md-5 p-3 my-5">
                    @csrf

                    <!-- Nome -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{__('ui.Nome')}}</label>
                        <input placeholder="Inserisci il tuo nome" type="text" class="cst-input w-100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Cognome -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{__('ui.Cognome')}}</label>
                        <input placeholder="Inserisci il tuo cognome" type="text" class="cst-input w-100 @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}">
                        @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Data Nascita -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{__('ui.Data Nascita')}}</label>
                        <input type="date" class="cst-input w-100 @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Numero Telefono -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{__('ui.Numero Telefono')}}</label>
                        <input placeholder="Inserisci il tuo numero di telefono" type="text" class="cst-input w-100 @error('telephone_number') is-invalid @enderror" name="telephone_number" value="{{ old('telephone_number') }}">
                        @error('telephone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Indirizzo Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{__('ui.Indirizzo Email')}}</label>
                        <input placeholder="Inserisci il tuo indirizzo email" type="email" class="cst-input w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input placeholder="Inserisci la tua password" type="password" class="cst-input w-100 @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Conferma Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{__('ui.Conferma Password')}}</label>
                        <input placeholder="Conferma la tua password" type="password" class="cst-input w-100 @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pulsante Registrati -->
                    <div class="d-flex justify-content-center pt-4">
                        <button type="submit" class="cst-button-card">{{__('ui.Registrati')}}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
