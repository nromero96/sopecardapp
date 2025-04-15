@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mb-sm-4">
        <h1 class="h3 mb-0 text-gray-800">Registros Renima</h1>
        @if(auth::user()->hasRole('medico'))
        
            <button type="button" class="d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#modalBuscadorCompletar">
                <i class="fas fa-search fa-sm text-white-50"></i>Buscar para Completar
            </button>

        @endif
        <a href="{{ route('renima.create') }}" class="d-sm-inline-block btn btn-sm btn-primary mt-1 mt-sm-0 shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo Registro</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de registros Renima</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>N° documento</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Fecha Registro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>Doc. de identidad</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Fecha Registro</th>
                            <th width="120px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($renimas as $item)
                        <tr></tr>
                            <td>{{ $item->id }}</td>
                            <td>@if($item->trato != ''){{ $item->trato.' ' }}@endif{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->de_documento_identidad }}</td>
                            <td>{{ $item->de_sexo }}</td>
                            <td>{{ $item->de_edad }}</td>

                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('renima.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                @if(Auth::user()->id == $item->renimauser_userid)
                                    <a href="{{ route('renima.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                @if(Auth::user()->id == $item->renimauser_userid)
                                <form action="{{ route('renima.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

{{-- Modal Buscar --}}
<div class="modal fade" id="modalBuscadorCompletar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalBuscadorCompletarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalBuscadorCompletarLabel">Buscar registros para completar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="searchRenimaForComplet" class="d-inline">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="searchcp" id="searchcp" placeholder="Buscar por DNI" aria-describedby="button-searchcp">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" id="buttonsearchcp">Buscar</button>
                    </div>
                </div>
            </form>

            <div id="searchResults" class="mt-3">
                <!-- Aquí se mostrarán los resultados de la búsqueda -->
                <div class="alert alert-info" role="alert">
                    <strong>Nota:</strong> Si no se encuentra el registro, puedes crear uno nuevo.
                </div>
                <div class="alert alert-warning" role="alert">
                    <strong>Nota:</strong> Si el registro ya existe, selecciones el registro y haga clic en "Completar".
                </div>
            </div>
        </div>
      </div>
    </div>
</div>


@endsection



<script>
    function confirmDelete(button) {
        if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
            button.closest('.delete-form').submit();
        }
    }

    document.addEventListener('click', function (event) {
    if (event.target && event.target.id === 'buttonsearchcp') {
        var searchValue = document.getElementById('searchcp').value;

        var url = "{{ route('renima.searchcp') }}"; // Ruta en Laravel

        fetch(url + '?search=' + encodeURIComponent(searchValue))
            .then(response => response.json())
            .then(data => {
                var resultsDiv = document.getElementById('searchResults');
                resultsDiv.innerHTML = ''; // Limpiar resultados anteriores

                if (data.length > 0) {
                    data.forEach(item => {
                        var resultItem = document.createElement('div');
                        resultItem.className = 'alert alert-success';
                        var editUrl = `{{ url('/renima-assignme') }}/${item.id}`;
                        resultItem.innerHTML = `<b>Registro encontrado:</b> ${item.de_documento_identidad} <br> <b>Responsable</b>: ${item.reponsable_trato} ${item.reponsable_name} <br> 
                            <small class="text-danger" style="line-height: 1;"><b>Nota:</b> Al hacer clic en "Completar", se te está asignando el registro para completar.</small> <br>
                            <a href="${editUrl}" class="btn btn-primary mt-2">Completar</a>`;
                        resultsDiv.appendChild(resultItem);
                    });
                } else {
                    var noResultItem = document.createElement('div');
                    noResultItem.className = 'alert alert-danger';
                    noResultItem.innerHTML = 'No se encontraron registros.';
                    resultsDiv.appendChild(noResultItem);
                }
            })
            .catch(error => console.error('Error:', error));
    }
});


</script>


