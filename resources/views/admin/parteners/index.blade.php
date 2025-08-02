@extends('layouts.template')
@section('header_title')
    Section Partenaire
@endsection
<style>
    .round-icon {
    width: 60px; /* Adjust size */
    height: 60px;
    border-radius: 50%; /* Makes it circular */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0; /* Light gray background */
    overflow: hidden; /* Ensures the image stays inside */
    border: 2px solid #ddd; /* Optional border */
}

</style>
@section('content')
    <div class="container-fluid card mt-2 p-3">
        <h3 class="text text-primary">Listes des Partenaires</h3>
        <form action="{{ route('partners.index') }}" method="post" class="d-flex mb-2">
            @csrf()
            <div class="form-group col-md-1">
                <label for=""></label>
                <p class="h5 mb-2 mt-2 fs-4">Rechercher:</p>
            </div>
            <div class="form-group col-5">
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
                <a href="{{ route('partners.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div>
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped">
            <thead>
                <tr class="fw-bold h5">
                    <th class="text-center">Id</th>
                    <th class="text-center">Icon Partenaire</th>
                    <th class="text-center">Nom Partenaire</th>
                    <th>Link </th>
                    <th class="text-center">Cree le</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parteners as $partner)
                    <tr>
                        <td class=" text-center">1</td>
                        <td class="text-center" style="display: flex; justify-content: center;">
                            <div class="round-icon">
                                <img src="{{ Storage::url("public/".$partner->icon_partener) }}" alt="Icon" width="40" height="40">
                            </div>
                        </td>
                        <td class=" text-center">{{$partner->title}}</td>
                        <td class=" text-center d-flex justify-content-start">{{$partner->link_partener}}</td>
                        <td class="text-center">2021-09-07</td>
                        <td class=" text-center">
                            <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning btn-sm text-light"><i
                                    class="ri-pencil-fill"></i></a>
                            <form class="d-inline-block" action="{{ route('partners.destroy', $partner->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirm('Voulez-vous confirmer l\'action')"
                                    class="btn btn-danger btn-sm text-light"><i class="ri-close-fill"></i></button>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
@endsection
@section('js_content')
@endsection
