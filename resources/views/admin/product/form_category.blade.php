@extends('layouts.template')

@section('header_title')
    {{ isset($category) ? 'Modifier Categorie de Produits' : 'Ajouter Categorie de Produits' }}
@endsection

@section('content')
    <div class="container-fluid card mt-3 p-2">
        <h4>{{ isset($category) ? 'Modifier Categorie de Produits' : 'Ajouter Nouveau Categorie de Produits' }}</h4>
    </div>
    <div class="card">
        <form 
            action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" 
            method="post" 
            class="p-1" 
            enctype="multipart/form-data"
        >
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="row p-2">
                <div class="form-group col-12 p-2">
                    <label for="name" class="text text-primary">Nom Categorie: <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        value="{{ old('name', isset($category) ? $category->name : '') }}"
                    >
                    @if ($errors->has('name'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-info">
                        {{ isset($category) ? 'Mettre à jour' : 'Enregistrer' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection