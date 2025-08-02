@extends('layouts.template')
@section('header_title')
    Section Settings
@endsection

@section('content')
    <div class="container-fluid card mt-2 p-3">
        <h3 class="text text-primary">Listes des Parametres</h3>
        <form action="{{ route('settings.index') }}" method="post" class="d-flex mb-2">
            @csrf()
            <div class="form-group col-md-1">
                <label for=""></label>
                <p class="h5 mb-2 mt-2">Rechercher:</p>
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
            @if ($count < 1)
            <div class="col-md-1">
                <label for=""></label>
                <a href="{{ route('settings.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                    class="ri-add-circle-line"></i></a>
                </div>
            @endif
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped">
            <thead>
                <tr class="fw-bold h5 text-center">
                    <th class="text-center">Id</th>
                    <th class="text-center">Installed kWh</th>
                    <th class="text-center">Vehicles & Devices</th>
                    <th>Auto OEMs & Suppliers </th>
                    <th>Annee d'experience </th>
                    <th class="text-center">Cree le</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td class="text-center">{{ $service->id }}</td>
                        <td class="text-center">{{ $service->installed_kwh }}</td>
                        <td class="text-center">{{ $service->vehicle_devices }}</td>
                        <td class="text-center">{{ $service->auto_eoms }}</td>
                        <td class="text-center">{{ $service->experience_year }}</td>
                        <td class="text-center">{{ $service->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('settings.edit', ['setting'=> $service->id]) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('settings.destroy', $service->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
@endsection
@section('js_content')
@endsection
