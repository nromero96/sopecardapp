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
            <form action="{{ route('sedes.index') }}" method="GET" class="mb-3">
                <label for="sede-search">Buscar sedes</label>
                <div class="d-flex flex-wrap align-items-center">
                    <input id="sede-search" name="search" type="search" value="{{ $search }}"
                        class="form-control w-auto mw-100 mr-2 mb-2" placeholder="Nombre o dirección">
                    <button type="submit" class="btn btn-primary mr-2 mb-2">Buscar</button>
                    @if($search !== '')
                        <a href="{{ route('sedes.index') }}" class="btn btn-outline-secondary mb-2">Limpiar</a>
                    @endif
                </div>
            </form>
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

                        @forelse ($sedes as $sede)
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
                                
                                <form action="{{ route('sedes.destroy', $sede->id) }}" method="POST" data-delete-sede>
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
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No se encontraron sedes.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($sedes->count())
                <p class="text-muted mb-2">Mostrando {{ $sedes->firstItem() }} a {{ $sedes->lastItem() }} de {{ $sedes->total() }} sedes.</p>
            @endif
            {{ $sedes->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('scripts')
    <script>

        $('form[data-delete-sede]').on('submit', function(e) {
            if (!confirm('¿Está seguro de que desea eliminar esta sede?')) {
                e.preventDefault();
            }
        });

    </script>
@endsection
