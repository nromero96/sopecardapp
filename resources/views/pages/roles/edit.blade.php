@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Editar Rol</h1>
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

    <!-- Form -->
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Rol información -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos del rol.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label mb-0">Nombre del rol:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
                        {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Permisos disponibles -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Permisos disponibles.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Si el rol es medico --}}

                    @if($role->name == 'medico')
                        <div class="col-md-12 mb-2">
                            <p class="text-danger">Los permisos para los médicos se asignan de forma individual.</p>
                            <p class="text-danger">Si deseas cambiar los permisos de un médico, debes hacerlo en la página de edición del usuario.</p>

                            <a href="{{ route('roles.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Regresar</a>
                        </div>
                    @else

                        <div class="col-md-12 mb-2">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($permissions as $permission)
                                <div class="switch form-switch-custom form-switch-primary">
                                    <input class="switch-input" type="checkbox" role="switch" name="permissions[]" value="{{$permission->id}}" id="form-custom-switch-{{$i}}" {{ in_array($permission->id, $rolepermissions) ? 'checked' : '-' }} >
                                    <label class="switch-label fw-bold ms-2" for="form-custom-switch-{{$i}}">{{$permission->description}}</label>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                        <div class="col-md-12 mb-2 mb-sm-0 text-right">
                            <a href="{{ route('roles.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
                            <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Actualizar</button>
                        </div>

                    @endif

                </div>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

@endsection