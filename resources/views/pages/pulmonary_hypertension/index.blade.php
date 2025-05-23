@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Investigación Nacional Peruana en Hipertensión Pulmonar</h1>
        <a href="{{ route('pulmonary-hypertension.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Registro</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Lista de registros de Hipertensión Pulmonar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>Nombre</th>
                            <th>E. Civil</th>
                            <th>Edad</th>
                            <th>Fecha Registro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>Nombre</th>
                            <th>E. Civil</th>
                            <th>Edad</th>
                            <th>Fecha Registro</th>
                            <th width="120px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($pulmonaryhypertensions as $item)
                        <tr></tr>
                            <td>{{ $item->id }}</td>
                            <td>@if($item->trato != ''){{ $item->trato.' ' }}@endif{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->de_nombre }}</td>
                            <td>{{ $item->de_estado_civil }}</td>
                            <td>{{ $item->de_edad }}</td>

                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('pulmonary-hypertension.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                @if(Auth::user()->id == $item->user_id)
                                    <a href="{{ route('pulmonary-hypertension.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                @if(Auth::user()->id == $item->user_id)
                                <form action="{{ route('pulmonary-hypertension.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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

@endsection



<script>
    function confirmDelete(button) {
        if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
            button.closest('.delete-form').submit();
        }
    }
</script>