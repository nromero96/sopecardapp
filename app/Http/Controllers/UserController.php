<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Repecca;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    
    public function index()
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users_index',
        ];

        $users = User::orderBy('id', 'desc')->get();



        return view('pages.users.index')->with($data)->with('users', $users);
    }

    public function create()
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users_create',
        ];

        $roles = Role::all();

        return view('pages.users.create')->with($data)->with('roles', $roles);
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
        ]);

        //store
        $user = new User;

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->trato = $request->trato;

        $user->save();

        //assign role
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');

    }

    public function edit($id)
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users_edit',
        ];

        $user = User::find($id);
        $roles = Role::all();

        return view('pages.users.edit')->with($data)->with('user', $user)->with('roles', $roles);
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
            'role' => 'required',
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

        $user->save();

        //assign role
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        //validate if not exists user_id in tables repecca
        $user = User::find($id);
        
        $reppeca = Repecca::where('user_id', $id)->first();

        if($reppeca){
            return redirect()->route('users.index')->with('error', 'No se puede eliminar el usuario, tiene registros asociados.');
        }


        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');

    }

}
