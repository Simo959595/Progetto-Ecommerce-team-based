<div class="container mx-auto d-block">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7">
            <form wire:submit.prevent="save" class="cst-form p-md-5 p-3 my-5">

                @csrf

                <!-- Titolo -->
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Titolo')}}</label>
                    <input type="text" class="cst-input w-100 @error('title') is-invalid @enderror"
                        wire:model.defer="title" placeholder="Inserisci il titolo dell'annuncio">
                    @error('title')
                        <div class="invalid-feedback d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                        </div>
                    @enderror
                    
                </div>

                <!-- Prezzo -->
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Prezzo')}} €</label>
                    <input type="text" class="cst-input w-100 @error('price') is-invalid @enderror"
                        wire:model.defer="price" placeholder="Inserisci il prezzo dell'annuncio">
                    @error('price')
                        <div class="invalid-feedback d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                        </div>
                    @enderror
                    
                </div>

                <!-- Descrizione -->
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Descrizione')}}</label>
                    <input type="text" class="cst-input w-100 @error('description') is-invalid @enderror"
                        wire:model.defer="description" placeholder="Inserisci una descrizione per l'annuncio">
                    @error('description')
                        <div class="invalid-feedback d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                        </div>
                    @enderror
                    
                </div>

                <!-- Condizione -->
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Condizione')}}</label>
                    <select class="cst-input w-100 @error('status') is-invalid @enderror" wire:model.defer="status">
                        <option value=""></option>
                        <option value="nuovo">{{__('ui.Nuovo')}}</option>
                        <option value="ottimo">{{__('ui.Ottime')}}</option>
                        <option value="buono">{{__('ui.Buone')}}</option>
                        <option value="discreto">{{__('ui.Discrete')}}</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                        </div>
                    @enderror
                    
                </div>

                <!-- Colore -->
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Colore')}}</label>
                    <input type="text" class="cst-input w-100 @error('color') is-invalid @enderror"
                        wire:model.defer="color" placeholder="Inserisci il colore dell'articolo">
                    @error('color')
                        <div class="invalid-feedback d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                        </div>
                    @enderror
                    
                </div>

                <!-- Categoria -->
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Categoria')}}</label>
                    <select class="cst-input w-100 @error('category') is-invalid @enderror" wire:model.defer="category">
                        <option value=""></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{__("ui.$category->name")}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                        </div>
                    @enderror
                    
                </div>


                {{-- inserimento immagini --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold fs-5">{{__('ui.Inserisci immagini')}}</label>
                    <input type="file" wire:model.live="temporary_images" multiple
                        class="cst-input-image w-100 @error('temporary_images.') is-invalid @enderror"
                        placeholder="Img" />
                    @error('temporary_images.')
                        <p class="fst-italic text-danger">{{ $message }}</p>
                    @enderror
                    @error('temporary_images')
                        <p class="fst-italic text-danger">{{ $message }}</p>
                    @enderror
                    
                </div>

                @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>{{__('ui.Anteprima della foto')}}:</p>
                            <div class="row border-preview py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col d-flex flex-column align-items-center my-3 p-0">
                                        <div class="img-preview mx-auto shadow "
                                            style="background-image: url({{ $image->temporaryUrl() }});">
                                        </div>
                                        <button type="button" class="delete-button"
                                            wire:click="removeImage({{ $key }})">
                                            <i class="color bi bi-trash3"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                @endif

                <!-- Bottone di conferma -->
                <div class="d-flex justify-content-center pt-4">
                    <button type="submit" class="cst-button-card">{{__('ui.Conferma inserimento')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
