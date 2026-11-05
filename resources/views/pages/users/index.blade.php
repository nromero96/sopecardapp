@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo Usuario</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Lista de usuarios.</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.index') }}" method="GET" class="mb-3">
                <label for="user-search">Buscar usuarios</label>
                <div class="d-flex flex-wrap align-items-center">
                    <input id="user-search" name="search" type="search" value="{{ $search }}"
                        class="form-control w-auto mw-100 mr-2 mb-2" placeholder="Nombre, correo, teléfono o sede">
                    <button type="submit" class="btn btn-primary mr-2 mb-2">Buscar</button>
                    @if($search !== '')
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mb-2">Limpiar</a>
                    @endif
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Sede</th>
                            <th>Rol y permisos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Sede</th>
                            <th>Rol y permisos</th>
                            <th width="87px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @forelse ($users as $user)
                        <tr>
                            <td class="align-middle">{{ $user->id }}</td>
                            <td class="align-middle">
                                @if($user->trato != '') {{ $user->trato.' ' }} @endif {{ $user->name }} {{ $user->lastname }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ $user->phone }}</td>

                            <td class="align-middle" style="line-height: 1;">
                                @if($user->sede != null)
                                    <span class="d-block">{{ $user->sede_name }}</span>
                                    <small class="text-muted">({{ $user->sede_address }})</small>
                                @else
                                    <span class="text-danger">Sin sede asignada</span>
                                @endif
                            </td>

                            <td class="align-middle">
                                <div class="d-flex flex-wrap align-items-center">
                                    @foreach($user->getRoleNames() as $role)
                                        <span class="badge badge-{{ $role === 'admin' ? 'primary' : 'info' }} text-capitalize mr-2 my-1">{{ $role }}</span>
                                    @endforeach
                                    @php
                                        $permissions = $user->getAllPermissions()->sortBy('name')->map(function ($permission) {
                                            return $permission->description ?: $permission->name;
                                        })->values();
                                    @endphp
                                    <button type="button" class="btn btn-outline-secondary btn-sm my-1"
                                        data-toggle="modal" data-target="#user-permissions-modal"
                                        data-user-name="{{ $user->name }} {{ $user->lastname }}"
                                        data-permissions="{{ $permissions->toJson() }}">
                                        Permisos ({{ $permissions->count() }})
                                    </button>
                                </div>
                            </td>
                            <td class="align-middle">
                                
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" data-delete-user>
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-circle btn-sm">
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
                            <td colspan="7" class="text-center text-muted">No se encontraron usuarios.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($users->count())
                <p class="text-muted mb-2">Mostrando {{ $users->firstItem() }} a {{ $users->lastItem() }} de {{ $users->total() }} usuarios.</p>
            @endif
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="user-permissions-modal" tabindex="-1" aria-labelledby="user-permissions-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user-permissions-title">Permisos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="mb-0" id="user-permissions-list"></ul>
                <p class="mb-0" id="user-permissions-empty" hidden>Sin permisos.</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $('#user-permissions-modal').on('show.bs.modal', function (event) {
            const { userName, permissions } = event.relatedTarget.dataset;
            const labels = JSON.parse(permissions);
            const list = document.getElementById('user-permissions-list');

            document.getElementById('user-permissions-title').textContent = `Permisos de ${userName}`;
            document.getElementById('user-permissions-empty').hidden = labels.length > 0;
            list.textContent = '';

            labels.forEach(label => {
                const item = document.createElement('li');
                item.textContent = label;
                list.appendChild(item);
            });
        });

        //Confirmación de eliminación de usuario
        document.querySelectorAll('form[data-delete-user]').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                
                if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                    this.submit();
                }

            });
        });
    </script>

@endsection
