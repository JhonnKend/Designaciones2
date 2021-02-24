<?php

namespace App\Http\Controllers;

use App\Roles;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::paginate(20);
        return view('roles.index', compact('roles'));
    }
    public function create(Request $request){
        $permissions = Permission::orderBy('id')->get();
        return view('roles.create',compact('permissions'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles',       
        ],[
            'name.required' => 'El campo Nombre Rol es requerido',
            'name.unique' => 'El valor del campo Nombre Rol ya está en uso'
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('index_roles', $role->id)->with('info', 'Rol registrado con  éxito');
    }
    public function delete(Request $request){
        $role= Role::find($request->id)->delete();
        return redirect()->route('index_roles')->with('info', ' Eliminado correctamente');
    }
    public function edit(Request $request){
        $permissions = Permission::orderBy('id')->get();
        $role = Role::find($request->id);
        return view('roles.edit', compact('role','permissions'));
    }
    public function update(Request $request,Role $role){
        $status = 'success';
        $content = 'El rol se Actualizo Correctamente';
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('index_roles', $role->id)
            ->with('info', [ 
                'status' => $status,
                'content' => $content
            ]);
    }
    public function show(Request $request){
        $role = Roles::select_one_role_view($request->id);
        $role_p = Roles::select_one_role_permissions_view($request->id);
        return view('roles.show',compact('role','role_p'));
    }
}
