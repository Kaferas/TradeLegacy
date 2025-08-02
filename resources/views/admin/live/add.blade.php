@extends('layouts.template')
@section('header_title')
    Creer un Live
@endsection
@section('content')
    <div class="container-fluid card mt-3 p-2">
        <h4>Ajouter Live</h4>
    </div>
    <div class="card">
        <form action="{{ route('live.store') }}" method="post" class="p-1" enctype="multipart/form-data">
            @csrf
            <div class="row p-2">
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-primary">Title Live: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="title" id="" class="form-control border-primary"
                        value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-9 p-2">
                    <label for="" class="text text-primary"><i class="ri ri-links-line text-info h3"></i>&nbsp;Link
                        Live : <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="link_youtube" id="" class="form-control border-primary"
                        value="{{ old('link_youtube') }}">
                    @if ($errors->has('link_youtube'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('link_youtube') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-3 p-2">
                    <label for="" class="text text-primary"><i class="h2"></i>&nbsp;
                        Social Media : <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <select name="type_social" id="" class="form-control border border-info">
                        <option value="" selected></option>
                        <option value="facebook" class="text text-info">Facebook</option>
                        <option value="youtube" class="text text-danger">Youtube</option>
                    </select>
                    @if ($errors->has('type_social'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('type_social') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-primary"><i class="h2"></i>&nbsp;Descritpion Live : <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <textarea name="description_youtube" id="" cols="30" rows="10" class="tinymce-editor form-control"></textarea>
                    @if ($errors->has('description_youtube'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('description_youtube') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-info">Add Link</button>
                </div>
            </div>
        </form>
    </div>
@endsection
