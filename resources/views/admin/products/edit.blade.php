@extends('layouts.admin')

@section('title', 'Modifica prodotto: ' . $user_restaurant_products->name)

@section('content')

<div class="f-d-bg-login-register">
    
    <section class="container f-d-form-edit-create">
        <h2 class="text-black">Modifica prodotto <em>{{$user_restaurant_products->name}}</em></h2>
        <form class="text-secondary" action="{{ route('admin.products.update', $user_restaurant_products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- NOME -->
            <div class="mb-3">
                <label for="name" class="form-label text-black">Nome*</label>
                <input type="text" class="form-control invalid @error('name') is-invalid @enderror" id="name" name="name"

                    value="{{ old('name', $user_restaurant_products->name) }}" maxlength="200">
                    {{-- FE VALIDATION: messaggio tramite JS --}}
                    
                        <div id="nameMessage" class="f-d-error-div fw-bold"></div>
                    

                <!-- BE VALIDATION: qui va il messaggio di errore del nome -->
                
                <!-- qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- IMMAGINE -->

                    <div class="media my-3">                                
                        @if($user_restaurant_products->image)
                            <img class="shadow" width="150" src="{{asset('storage/' . $user_restaurant_products->image)}}"
                                alt="{{$user_restaurant_products->name}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="100" src="public/images/placeholder.png" alt="{{$user_restaurant_products->name}}"
                                id="uploadPreview">
                        @endif
                    </div>                   
                        <div class="mb-3">
                            <label for="image" class="form-label text-black">Immagine</label>
                            <input type="file" accept="image/*"
                                class="form-control @error('image') is-invalid @enderror" id="uploadImage" name="image"
                                value="{{ old('image', $user_restaurant_products->image) }}" maxlength="255">
                                {{-- FE VALIDATION: messaggio tramite JS --}}
                            <div id="imgMessage" class="f-d-error-div"></div>
                            <!-- qui va il messaggio di errore dell'immagine -->
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- div dove prendere spunto per fixare immagine -->
                        <!-- <div class="w-50">
                        <label for="img" class="form-label">Immagine*</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="img"
                            name="img">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            </div> -->


                    

                        <!-- DESCRIZIONE -->
                        <div class="mb-3">
                            <label for="description" class="form-label text-black">Descrizione*</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" required>{{old('description', $user_restaurant_products->description)}}</textarea>
                                 <div id="descriptionMessage" class="f-d-error-div"></div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PREZZO -->
                        <div id="priceForm" class="mb-3">
                            <label for="price" class="form-label text-black">Prezzo*</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $user_restaurant_products->price) }}" required>
                            <!-- qui va il messaggio di errore del prezzo -->
                            
                             <div id="priceMessage" class="text-black fw-bold"></div>
                         
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    <!-- BOTTONI -->
                    <div class="mb-3">
                        <button id="submitBtn" type="submit" class="f-d-button-form-edit">Modifica</button>
                    </div>
                    <div class="text-black"><span>* Campi obbligatori</span></div>
            </div>
        </form>
    </section>
</div>



@endsection
@section('sidebarContent')
@include('partials.sidebar')

@endsection

