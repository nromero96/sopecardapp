@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Registrar Sede</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('sedes.update', $sede->id) }}" method="POST">
        <!-- CSRF Token -->
        @csrf
        @method('PUT')
        <!-- Información Responsable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos de la sede.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label mb-0">Nombre: <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $sede->name) }}" required>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="address" class="form-label mb-0">Dirección: <small class="text-disabled">(Opcional)</small></label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $sede->address) }}">
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="status" class="form-label mb-0">Estado: <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="activo" {{ $sede->status == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $sede->status == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>
                    <div class="col-md-12 mb-2 mb-sm-0 text-right">
                        <a href="{{ route('sedes.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
                        <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

@endsection