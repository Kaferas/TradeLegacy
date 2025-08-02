@extends('layouts.template')

@section('header_title')
    Ajouter un Produit
@endsection

@section('content')
    <div class="container-fluid card mt-3 p-2">
        <h4>Ajouter Nouveau Produit</h4>
    </div>
    <div class="card">
        <form
            action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}"
            method="post"
            class="p-1"
            enctype="multipart/form-data"
        >
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            <div class="row p-2">
                <div class="form-group col-12 p-2">
                    <label for="name" class="text text-primary">Nom Produit: <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name', isset($product) ? $product->name : '') }}"
                    >
                    @if ($errors->has('name'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="category_id" class="text text-primary">Categorie: <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">-- Sélectionner une catégorie --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('category_id') }}</p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="price" class="text text-primary">Prix: <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="form-control"
                        value="{{ old('price', isset($product) ? $product->price : '') }}"
                    >
                    @if ($errors->has('price'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('price') }}</p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="description" class="text text-primary">File:</label>
                    <input type="file" name="file_upload" id="file_upload" class="form-control">
                </div>
                <div class="form-group col-12 p-2">
                    <label for="description" class="text text-primary">Description:</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                    >{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                    @if ($errors->has('description'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('description') }}</p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-info">
                        {{ isset($product) ? 'Mettre à jour' : 'Enregistrer' }}
                    </button>
                </div>
                <div class="col-4">
                    <a href="{{ route('product.index') }}" class="btn btn-xs col-12 btn-secondary">Annuler</a>
                </div>
            </div>
        </form>
    </div>
@endsection
