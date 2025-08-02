@extends('layouts.template')
@section('header_title')
    Modifier un Partenaire
@endsection
@section('content')
    <div class="container-fluid text-center text-warning card mt-3 p-2">
        <h4>Modifier Partenaire</h4>
    </div>

    <div class="card">
        <form action="{{ route('partners.update', $partner) }}" method="post" class="p-1" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row p-2">
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-primary">Nom Partenaire: <sup
                        class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="title" id="" class="form-control border-primary"
                        value="{{ empty($partner->title) ? old('title') : $partner->title }}">
                    @if ($errors->has('title'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-9 p-2">
                    <label for="" class="text text-primary"><i class="ri ri-links-line text-info h3"></i>&nbsp;Link
                        Live : <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="link_partener" id="" class="form-control border-primary"
                        value="{{ empty($partner->link_partener) ? old('link_partener') : $partner->link_partener }}">
                    @if ($errors->has('link_partener'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('link_partener') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-3 p-2">
                    <label for="" class="text text-primary"><i class="h2"></i>&nbsp;
                        Icon Partenaire : <sup class='text text-danger fw-bold '>*</sup>:</label>
                        <input type="file" name="icon_partener" id="" class="form-control">
                    @if ($errors->has('icon_partener'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('icon_partener') }}
                        </p>
                    @endif
                </div>

            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-warning">Modifier Partenaire</button>
                </div>
            </div>
        </form>
    </div>
@endsection
