@extends('layouts.template')
@section('header_title')
    Listes des Contacts
@endsection
@section('content')
    <div class="container-fluid card mt-2 p-2">
        <h3 class="text text-primary">Listes des Contacts</h3>
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
            {{-- <div class="col-md-1">
                <label for=""></label>
                <a href="{{ route('contact.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div> --}}
            <div class="col-md-1"></div>
        </form>
    </div>
    <div class="card mt-2">
        <table class="table table-striped text-center">
            <thead>
                <tr class="fw-bold h5">
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Services</th>
                    <th>Date Service</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($contacts as $item)
                <tr>
                    <td>{{$item->customer_name}}</td>
                    <td><a href="mailto:{{$item->customer_mail}}">{{$item->customer_mail}}</a><i class="ri-flight-takeoff-fill"></i></td>
                    <td>{{$item->customer_service}}</td>
                    <td>{{$item->service_date}}</td>
                    <td title="{{ $item->message }}">{{ substr($item->message,0,20)."..." }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm text-light" onclick="modalPop(this)" data-id={{ $item->id }} id="#exampleModal{{$item->id}}"><i class="ri-eye-line"></i></a>
                        <a class="btn btn-danger btn-sm text-light"><i class="ri-close-line"></i></a>
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header text-center">
                              <h5 class="text-center text-primary" id="exampleModalLabel">Message de {{$item->customer_name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" data-id={{ $item->id }} onclick="closeModal(this)">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                {{ $item->message }}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-id={{ $item->id }} onclick="closeModal()" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text text-danger fw-bold">Aucun Contact Trouve</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @section("js_content")
        <script>
            var modalPop=(th)=>{
                let attr=$(th).attr("data-id");
                $(`#exampleModal${attr}`).modal("show",true);
            }
            var closeModal=(th)=>{
                let attr=$(th).attr("data-id");
                $("#exampleModal${attr}").modal("hide");
            }
        </script>
    @endsection
    <!-- Modal -->
@endsection
