@extends('layouts.template')
@section('header_title')
    Section Slide
@endsection
@section('content')
    <div class="container-fluid card mt-2 p-1">
        <h3 class="text text-primary">Listes des Slides</h3>
        <form action="" method="post" class="d-flex mb-2">
            <div class="form-group col-md-1">
                <label for=""></label>
                <p class="h5 mb-2 mt-1">Rechercher:</p>
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
                <a href="{{ route('slides.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div>
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped text-center">
            <thead>
                <tr class="fw-bold h5">
                    <th class="text-center">Id</th>
                    <th>Image</th>
                    <th class="text-center">Title Slide</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Cree le</th>
                    <th class="text-center">Etat</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $k => $slide)
                    <tr>
                        <td>{{++$k}}</td>
                        <td><img width="80px" height="80px" src="{{ Storage::url('uploads/sliders/'.$slide->image) }}" alt="" class="rounded-circle" loading="lazy"></td>
                        <td>{{$slide->title}}</td>
                        <td>{{substr($slide->description,0,20)."..."}}</td>
                        <td>{{ $slide->created_at }}</td>
                        <td>{{ $slide->status == 0 ? "En Background" : "Poste" }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary" title="Editer"><i class="ri-pencil-fill"></i></a>
                            @if($slide->status==0)
                                <a href="" class="btn btn-sm btn-info" title="Mettre en Ligne"><i class="ri-line-fill"></i></a>
                            @else
                                <a href="" class="btn btn-sm btn-default" title="Mettre hors Ligne"><i class="ri-wifi-off-line"></i></a>
                            @endif
                            <form class="d-inline-block" action="{{ route('slides.destroy', $slide) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button onclick="confirm('Voulez-vous confirmer l\'action')" class="btn btn-sm btn-danger"><i class="ri-close-fill"></i></button>
                            </form>
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
