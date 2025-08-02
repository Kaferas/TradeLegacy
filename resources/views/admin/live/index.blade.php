@extends('layouts.template')
@section('header_title')
    Section Live
@endsection
@section('content')
    <div class="container-fluid card mt-2 p-1">
        <h3 class="text text-primary">Listes des Lives</h3>
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
                <a href="{{ route('live.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div>
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped">
            <thead>
                <tr class="fw-bold h5">
                    <th class="text-center">Id</th>
                    <th class="text-center">Title Live</th>
                    <th class="text-center">Type</th>
                    <th>Link</th>
                    <th class="text-center">Cree le</th>
                    <th class="text-center">Live</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lives as $i => $item)
                    <tr>
                        <td class=" text-center">{{ ++$i }}</td>
                        <td class=" text-center">{{ $item->title }}</td>
                        <td class=" text-center">
                            @if ($item->type_social == 'youtube')
                                {!! $icon = "<i class='ri-youtube-fill text text-danger h3'></i>" !!}
                            @else
                                {!! $icon = "<i class='ri-facebook-fill text text-primary h3'></i>" !!}
                            @endif
                        </td>
                        <td class=" text-center d-flex justify-content-start">{{ $item->link_youtube }}</td>
                        <td class="text-center">{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                        <td class=" text-center">
                            @if ($item->is_live == 0)
                                {!! $icon = "<i class='p-3 ri-camera-off-line text text-danger h3'></i>" !!}
                            @else
                                {!! $icon = "<i class='p-3 ri-live-line h3' style='color:green'></i>" !!}
                            @endif
                        </td>
                        <td class=" text-center">
                            <a href="{{ route('live.edit', $item) }}" class="btn btn-warning btn-sm text-light"><i
                                    class="ri-pencil-fill"></i></a>
                            <a href="{{ route('online', $item) }}" title="Mettre Live"
                                class="{{ $item->is_live == 0 ? '' : 'disabled' }} btn btn-info btn-sm text-light"><i
                                    class="ri-tv-line"></i></a>
                            <form class="d-inline-block" action="{{ route('live.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirm('Voulez-vous confirmer l\'action')"
                                    class="btn btn-danger btn-sm text-light"><i class="ri-close-fill"></i></button>
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
