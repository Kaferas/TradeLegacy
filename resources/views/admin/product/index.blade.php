@extends('layouts.template')

@section('header_title')
    Liste des Produits
@endsection

@section('content')
    <div class="container-fluid card mt-2 p-1">
        <h3 class="text text-primary">Liste des Produits</h3>
        <form action="{{ route('product.index') }}" method="get" class="d-flex mb-2">
            @csrf
            <div class="form-group col-md-1">
                <label for=""></label>
                <p class="h5 mb-2 mt-2">Rechercher:</p>
            </div>
            <div class="form-group col-3">
                <label for=""></label>
                <input type="text" name="search" id="" class="mt-1 form-control border border-secondary"
                    placeholder="Votre Recherche Icii...">
            </div>
            <div class="col-md-1"></div>
            <div class="form-group mt-1 col-2">
                <label for=""></label>
                <select name="categorie" id="" class="border border-secondary form-control">
                    <option value="" selected>Choisissez Categorie</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1"></div>
            <div class="form-group col-md-1">
                <label for=""></label>
                <button type="submit" class="mt-1 form-control btn btn-sm btn-info"><i
                        class="ri-search-line"></i>&nbsp;Search</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <label for=""></label>
                <a href="{{ route('product.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div>
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped text-center">
            <thead>
                <tr class="fw-bold h5">
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $i => $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category?->name }}</td>
                        <td>{{ $product->price }} FCFA</td>
                        <td>
                            <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-sm text-light">
                                Modifier
                            </a>
                            <form action="{{ route('product.destroy', $product) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')" class="btn btn-danger btn-sm text-light">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
