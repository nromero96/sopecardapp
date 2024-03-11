@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registros Repecca</h1>
        <a href="{{ route('repecca.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo Registro</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de registros Repecca</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>N° historia clínica</th>
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
                            <th>N° historia clínica</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Fecha Registro</th>
                            <th width="120px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($repeccas as $item)
                        <tr></tr>
                            <td>{{ $item->id }}</td>
                            <td>@if($item->trato != ''){{ $item->trato.' ' }}@endif{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->numero_historia_clinica }}</td>
                            <td>{{ $item->sexo }}</td>
                            <td>{{ $item->edad }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('repecca.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('repecca.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('repecca.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
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
