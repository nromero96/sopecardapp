<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Repecca;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Sede;

class UserController extends Controller
{
    
    public function index()
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users_index',
        ];

        //join sedes table to get name of sede
        $users = User::leftjoin('sedes', 'users.sede', '=', 'sedes.id')
            ->select('users.*', 'sedes.name as sede_name', 'sedes.address as sede_address')
            ->where('users.status', '!=', 'eliminado')
            ->orderBy('users.id', 'desc')
            ->get();


        return view('pages.users.index')->with($data)->with('users', $users);
    }

    public function create()
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users_create',
        ];

        $sedes = Sede::where('status', 'activo')->orderBy('name')->get();

        $roles = Role::all();
        $permissions = Permission::orderBy('name')->get();

        return view('pages.users.create')->with($data)->with('roles', $roles)->with('permissions', $permissions)->with('sedes', $sedes);
    }

    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'nullable',
            'password' => 'required',
            'trato' => 'nullable',
            'role' => 'required',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|distinct|exists:permissions,name',
        ]);

        //store
        $user = new User;

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->trato = $request->trato;
        $user->sede = $request->sede;

        $user->save();

        //assign role
        $user->assignRole($request->role);

        //assign permissions
        $user->syncPermissions($request->permissions ?? []);
        

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');

    }

    public function edit($id)
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users_edit',
        ];

        $sedes = Sede::where('status', '!=', 'deleted')->orderBy('name')->get();

        $user = User::find($id);
        $roles = Role::all();

        $permissions = Permission::orderBy('name')->get();
        $userPermissions = $user->permissions->pluck('name')->toArray();

        return view('pages.users.edit', compact('user', 'roles', 'permissions', 'userPermissions', 'sedes'))->with($data);
    }

    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'nullable',
            'password' => 'nullable',
            'trato' => 'nullable',
            'role' => 'required|exists:roles,id',
            'sede' => 'nullable|exists:sedes,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|distinct|exists:permissions,name',
        ]);

        //store
        $user = User::find($id);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        $user->trato = $request->trato;
        $user->sede = $request->sede;

        $user->save();

        //assign role
        $user->syncRoles($request->role);

        //assign permissions
        $user->syncPermissions($request->permissions ?? []);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        //validate if not exists user_id in tables repecca
        $user = User::find($id);
        
        //actualizar el estado a eliminado
        $user->status = 'eliminado';
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');

    }

}
