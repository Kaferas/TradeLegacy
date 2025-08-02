@extends('layouts.template')
@section('header_title')
    Modifier un Horaire
@endsection
@section('content')
    <div class="container-fluid card mt-3 p-2">
        <h4>Modifier Horaire</h4>
    </div>
    <div class="card">
        <form action="{{ route('schedule.update', $schedule) }}" method="post" class="p-1" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row p-2">
                <div class="form-group col-6 p-2">
                    <label for="" class="text text-default">Du Lundi au Vendredi depuis: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="time" name="normal_from" id="" class="form-control border-primary"
                        value="{{ $schedule->normal_from ?? old('normal_from') }}">
                    @if ($errors->has('normal_from'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('normal_from') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-6 p-2">
                    <label for="" class="text text-default">Du Lundi au Vendredi a: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="time" name="normal_to" id="" class="form-control border-primary"
                        value="{{ $schedule->normal_to ?? old('normal_to') }}">
                    @if ($errors->has('normal_to'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('normal_to') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-6 p-2">
                    <label for="" class="text text-default">Samedi et Dimanche depuis: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="time" name="weekend_from" id="" class="form-control border-primary"
                        value="{{ $schedule->weekend_from ?? old('weekend_from') }}">
                    @if ($errors->has('weekend_from'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('weekend_from') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-6 p-2">
                    <label for="" class="text text-default">Samedi et Dimanche a: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="time" name="weekend_to" id="" class="form-control border-primary"
                        value="{{ $schedule->weekend_to ?? old('weekend_to') }}">
                    @if ($errors->has('weekend_to'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('weekend_to') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-warning">Edit Horaire</button>
                </div>
            </div>
        </form>
    </div>
@endsection
