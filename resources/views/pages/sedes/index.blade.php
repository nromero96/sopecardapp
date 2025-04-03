@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Sedes</h1>
        <a href="{{ route('sedes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo Sede</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de sedes.</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th width="87px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($sedes as $sede)
                        <tr>
                            <td>{{ $sede->id }}</td>
                            <td>{{ $sede->name }}</td>
                            <td>{{ $sede->address }}</td>
                            <td>
                                @if ($sede->status == 'activo')
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                
                                <form action="{{ route('sedes.destroy', $sede->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('sedes.edit', $sede->id) }}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('scripts')
    <script>

        //Cofirmar eliminación de sedes
        $('form').on('submit', function(e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto
            
            confirmation = confirm('¿Está seguro de que desea eliminar esta sede?');
            if (confirmation) {
                this.submit(); // Enviar el formulario si el usuario confirma
            } else {
                return false; // Cancelar el envío del formulario si el usuario cancela
            }

        });

    </script>
@endsection
