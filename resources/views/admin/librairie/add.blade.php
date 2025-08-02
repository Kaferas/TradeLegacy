@extends('layouts.template')
@section('header_title')
    Creer un Livre
@endsection
@section('content')
    <div class="container-fluid card mt-3 p-2">
        <h4>Ajouter Livre</h4>
    </div>
    <div class="card">
        <form action="{{ route('librairie.store') }}" method="post" class="p-1" enctype="multipart/form-data">
            @csrf
            <div class="row p-2">
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-primary">Title Livre: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="title" id="" class="form-control border-primary"
                        value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-9 p-2">
                    <label for="" class="text text-primary"><i class="ri ri-links-line text-info h3"></i>&nbsp;Livre
                        : <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="file" name="book_path" id="" class="form-control border-primary"
                        value="{{ old('book_path') }}">
                    @if ($errors->has('book_path'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('book_path') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-primary"><i class="h2"></i>&nbsp;Descritpion Livre : <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <textarea name="description_livre" id="" cols="30" rows="10" class="form-control">{{ old('description_livre') }}</textarea>
                    @if ($errors->has('description_livre'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('description_livre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-info">Ajouter Livre</button>
                </div>
            </div>
        </form>
    </div>
@endsection
