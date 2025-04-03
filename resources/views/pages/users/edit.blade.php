@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Editar Usuario</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Información Responsable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos del usuario.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label for="trato" class="form-label mb-0">Trato:</label>
                        <select name="trato" id="trato" class="form-control">
                            <option value="" {{ $user->trato == '' ? 'selected' : '' }}>Ninguna</option>
                            <option value="Dr." {{ $user->trato == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            <option value="Dra." {{ $user->trato == 'Dra.' ? 'selected' : '' }}>Dra.</option>
                            <option value="Lic." {{ $user->trato == 'Lic.' ? 'selected' : '' }}>Lic.</option>
                            <option value="Sr." {{ $user->trato == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                            <option value="Sra." {{ $user->trato == 'Sra.' ? 'selected' : '' }}>Sra.</option>
                            <option value="Srta." {{ $user->trato == 'Srta.' ? 'selected' : '' }}>Srta.</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('trato') }}</span>
                    </div>

                    <div class="col-md-10 mb-2">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label mb-0">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="lastname" class="form-label mb-0">Apellido:</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname }}" required>
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label mb-0">Correo:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phone" class="form-label mb-0">Teléfono:</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="password" class="form-label mb-0">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="●●●●●●●●" autocomplete="new-password">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                <small>Dejar en blanco si no se desea actualizar.</small>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="role" class="form-label d-block mb-0">Rol:</label>
                                <div class="form-control">
                                    @php
                                        if (!empty($user->getRoleNames())) {
                                            foreach ($user->getRoleNames() as $name) {
                                                $authrole = \Spatie\Permission\Models\Role::findByName($name);
                                                $userRoleId = $authrole->id;
                                            }
                                        }
                                    @endphp
                                    @foreach ( $roles as $role )
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="role-{{ $role->id }}" value="{{ $role->id }}" {{ $userRoleId == $role->id ? 'checked' : '' }}>
                                            <label class="form-check-label" for="role-{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="sede" class="form-label mb-0">Sede:</label>
                                <select name="sede" id="sede" class="form-control">
                                    <option value="" {{ $user->sede == '' ? 'selected' : '' }}>Ninguna</option>
                                    @foreach($sedes as $sede)
                                        <option value="{{ $sede->id }}" {{ $user->sede == $sede->id ? 'selected' : '' }}>{{ $sede->name }} - {{ $sede->address }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('sede') }}</span>
                            </div>


                            <div class="col-md-12 mb-4">
                                <label class="form-label d-block mb-2 font-weight-bold">Permisos:</label>
                                <div class="card p-3">
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                        value="{{ $permission->name }}" id="perm-{{ $permission->id }}"
                                                        {{ in_array($permission->name, $userPermissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="perm-{{ $permission->id }}">
                                                        {{ $permission->description }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mb-2 mb-sm-0 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            //obtener el valor del rol seleccionado
            var selectedRole = $('input[name="role"]:checked').val();
            //validar el rol seleccionado al cargar la página
            validarRole(selectedRole);

            $('input[name="role"]').change(function() {
                validarRole($(this).val());
            });
        });

        function validarRole(value) {
            //si es admin, desmarcar todos los permisos y ocultar el checkbox de permisos
            if (value == 1) {
                $('input[name="permissions[]"]').prop('checked', false);
                $('input[name="permissions[]"]').prop('disabled', true);
            } else {
                $('input[name="permissions[]"]').prop('disabled', false);
            }
        }
    </script>
@endsection