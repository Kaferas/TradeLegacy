@extends('layouts.template')
@section('header_title')
    Tags Articles
@endsection
@section('content')
    <div class="container-fluid card mt-2 p-1">
        <h3 class="text text-primary">Listes des Tags</h3>
        <form action="" method="post" class="d-flex mb-2">
            <div class="col-md-1"></div>
            <div class="form-group col-md-2">
                <label for=""></label>
                <p class="h4 mb-2 mt-1">Rechercher:</p>
            </div>
            <div class="form-group col-4">
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
                <a href="{{ route('tags.create') }}" class="mt-1 form-control btn btn-sm btn-primary">Add&nbsp;<i
                        class="ri-add-circle-line"></i></a>
            </div>
            <div class="col-md-1"></div>
        </form>
    </div>

    <div class="card mt-2">
        <table class="table table-striped text-center">
            <thead>
                <tr class="fw-bold h5">
                    <th>Couleur</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>

                @foreach ($tags as $i => $item)
                    <tr>
                        <td><span class="p-2" style="background-color:{{ $item->color_categorie }}" width="50px"
                                height="50px"></span></td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('tags.edit', $item) }}" class="btn btn-warning btn-sm text-light"><i
                                    class="ri-pencil-fill"></i></a>
                            <form class="d-inline-block" action="{{ route('tags.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirm('Voulez-vous Executer l\'action?')"
                                    class="btn btn-danger btn-sm text-light"><i class="ri-close-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>

    <!-- Modal -->
@endsection
@section('js_content')
    <script>
        const deleteTeamMember = (id, th) => {
            $(`#deleteModal${id}`).modal("show", true);
            let link = $(th).data("href");
            $(`#continueDelete${id}`).on("click", () => {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: {

                    }
                })
            })
        }
    </script>
@endsection
