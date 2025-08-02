@extends('layouts.template')
@section('header_title')
    Creer un Slide
@endsection
@section('content')
    <div class="container-fluid card mt-3 p-2">
        <h4>Ajouter Slide</h4>
    </div>
    <div class="card">
        <form action="{{ route('slides.store') }}" method="post" class="p-1" enctype="multipart/form-data">
            @csrf
            <div class="row p-2">
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-default">Title Slide: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="title" id="" class="form-control border-primary"
                        value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-default"><i class="ri ri-links-line text-info h3"></i>&nbsp;Image
                        Slide : <sup class='text text-danger fw-bold '>*</sup></label>
                    <input type="file" name="pictures" id="" class="form-control border-primary custom-file-input"
                        value="{{ old('pictures') }}">
                    @if ($errors->has('pictures'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('pictures') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-12 p-2">
                    <label for="" class="text text-default"><i class="h2"></i>&nbsp;Descritpion Slide : <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <textarea name="description" id="" cols="30" rows="10" class="tinymce-editor border-primary form-control"></textarea>
                    @if ($errors->has('description'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-info">Add Slide</button>
                </div>
            </div>
        </form>
    </div>
@endsection
