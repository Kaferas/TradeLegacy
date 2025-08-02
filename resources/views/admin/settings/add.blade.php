@extends('layouts.template')
@section('header_title')
    Creer Parametres
@endsection
@section('content')
    <div class="container-fluid text-center text-primary card mt-3 p-2">
        <h4>Ajouter Parametres</h4>
    </div>
    <div class="card">
        <form action="{{ route('settings.store') }}" method="post" class="p-1" enctype="multipart/form-data">
            @csrf
            <div class="row p-2">
                <div class="form-group col-3 p-2">
                    <label for="" class="text text-primary ri-lightbulb-flash-line text-info h4">Installed KWH: <sup
                            class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="installed_kwh" id="" class="form-control border-primary"
                        value="{{ old('installed_kwh') }}">
                    @if ($errors->has('installed_kwh'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">{{ $errors->first('installed_kwh') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-3 p-2">
                    <label for="" class="text text-primary"><i class="ri ri-car-line text-info h3"></i>&nbsp;Vehicles & Devices : <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="vehicle_devices" id="" class="form-control border-primary"
                        value="{{ old('vehicle_devices') }}">
                    @if ($errors->has('vehicle_devices'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('vehicle_devices') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-3 p-2">
                    <label for="" class="text text-primary"><i class="ri ri-truck-line text-info h3"></i>&nbsp;Auto OEMs & Suppliers: <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="auto_eoms" id="" class="form-control border-primary"
                        value="{{ old('auto_eoms') }}">
                    @if ($errors->has('auto_eoms'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('auto_eoms') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-3 p-2">
                    <label for="" class="text text-primary"><i class="ri ri-truck-line text-info h3"></i>&nbsp;Auto OEMs & Suppliers: <sup class='text text-danger fw-bold '>*</sup>:</label>
                    <input type="text" name="experience_year" id="" class="form-control border-primary"
                        value="{{ old('experience_year') }}">
                    @if ($errors->has('experience_year'))
                        <p class="mt-1 p-1 col-12 text text-light text-center bg-danger">
                            {{ $errors->first('experience_year') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row p-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-xs col-12 btn-info">Add Parametres</button>
                </div>
            </div>
        </form>
    </div>
@endsection
