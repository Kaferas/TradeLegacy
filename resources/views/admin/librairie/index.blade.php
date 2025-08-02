@extends('layouts.template')
@section('header_title')
    Librairie
@endsection
@section('content')
    <div class="container-fluid card mt-2 p-3">
        <h3 class="text text-primary">Listes des Livres</h3>
        <form action="" method="post" class="d-flex mb-2">
            <div class="form-group col-md-1">
                <label for=""></label>
                <p class="h6 mb-2 mt-2">Rechercher:</p>
            </div>
            <div class="form-group col-6">
                <label for=""></label>
                <input type="text" name="search" id="" class="mt-1 form-control border border-secondary"
                    placeholder="Votre Recherche Icii...">
            </div>
            <div class="col-md-1"></div>
            <div class="form-group col-md-1">
                <label for=""></label>
                <button type="submit" class="mt-1 form-control btn btn-sm btn-info"><i
                        class="ri-search-line"></i>&nbsp;Search</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <label for=""></label>
                <a href="{{ route('librairie.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div>
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped">
            <thead>
                <tr class="fw-bold h5">
                    <th class="text-center">Id</th>
                    <th class="text-center">Titre Livre</th>
                    <th class="text-center">Cree le</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
@endsection
@section('js_content')
@endsection
