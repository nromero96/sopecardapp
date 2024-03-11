<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'medico']);

        //create permissions for dashboard
        Permission::create(['name' => 'dashboard.index',
                            'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2]);

        //create permissions for users
        Permission::create(['name' => 'users.index',
                            'description' => 'Listar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create',
                            'description' => 'Crear Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit',
                            'description' => 'Editar Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy',
                            'description' => 'Eliminar Usuario'])->syncRoles([$role1]);
        
        //create permissions for roles
        Permission::create(['name' => 'roles.index',
                            'description' => 'Listar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create',
                            'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit',
                            'description' => 'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy',
                            'description' => 'Eliminar Rol'])->syncRoles([$role1]);

        //create permissions for permissions
        Permission::create(['name' => 'permissions.index',
                            'description' => 'Listar Permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.create',
                            'description' => 'Crear Permiso'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.edit',
                            'description' => 'Editar Permiso'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.destroy',
                            'description' => 'Eliminar Permiso'])->syncRoles([$role1]);

        //create permissions for sedes
        Permission::create(['name' => 'sedes.index',
                            'description' => 'Listar Sedes'])->syncRoles([$role1]);
        Permission::create(['name' => 'sedes.create',
                            'description' => 'Crear Sede'])->syncRoles([$role1]);
        Permission::create(['name' => 'sedes.edit',
                            'description' => 'Editar Sede'])->syncRoles([$role1]);
        Permission::create(['name' => 'sedes.destroy',
                            'description' => 'Eliminar Sede'])->syncRoles([$role1]);
        
        //create permissions for repecca
        Permission::create(['name' => 'repecca.index',
                            'description' => 'Listar Repecca'])->syncRoles([$role1]);
        Permission::create(['name' => 'repecca.create', 
                            'description' => 'Crear Repecca'])->syncRoles([$role1]);
        Permission::create(['name' => 'repecca.edit',
                            'description' => 'Editar Repecca'])->syncRoles([$role1]);
        Permission::create(['name' => 'repecca.destroy',
                            'description' => 'Eliminar Repecca'])->syncRoles([$role1]);

        //create permissions for renaval
        Permission::create(['name' => 'renaval.index',
                            'description' => 'Listar Renaval'])->syncRoles([$role1]);
        Permission::create(['name' => 'renaval.create',
                            'description' => 'Crear Renaval'])->syncRoles([$role1]);
        Permission::create(['name' => 'renaval.edit',
                            'description' => 'Editar Renaval'])->syncRoles([$role1]);
        Permission::create(['name' => 'renaval.destroy',
                            'description' => 'Eliminar Renaval'])->syncRoles([$role1]);
    
    }
}
