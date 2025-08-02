@extends('layouts.template')
@section('header_title')
    Listes des Horaires de Travail
@endsection
@section('content')
<div class="container-fluid card mt-2 p-2">
    <h3 class="text text-primary">Listes des Creneaux</h3>
    <form action="" method="post" class="d-flex mb-2">
        <div class="col-md-1"></div>
        <div class="form-group col-md-2">
            <label for=""></label>
            <p class="h4 mb-2 mt-2">Rechercher:</p>
        </div>
        <div class="form-group col-md-4">
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
        @if ($isEmpty == 0)

        <div class="col-md-1">
            <label for=""></label>
            <a href="{{ route('schedule.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                class="ri-add-circle-line"></i></a>
            </div>
        @endif
        <div class="col-md-1"></div>
    </form>
</div>
<div class="card mt-2">
    <table class="table table-striped text-center">
        <thead>
            <tr class="fw-bold h5">
                <th>Id</th>
                <th>Jour Normal</th>
                <th>Weekend</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $i => $sch)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{++$sch->normal_from." AM"}} - {{$sch->normal_to." PM"}}</td>
                    <td>{{++$sch->weekend_from." AM"}} - {{$sch->weekend_to." PM"}}</td>
                    <td>
                        <a href="{{ route('schedule.edit', $sch->id) }}" class="btn btn-warning btn-sm text-light"><i
                            class="ri-pencil-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
