<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use App\Roles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //Mostrar una lista de los registros
    public function index(Request $request)
    {

        if($request){
            $query = trim($request->get('search'));
            $users = User::where('name', 'LIKE' , '%' . $query . '%' )
            ->orderBy('id' , 'asc')
            ->paginate(10);

            return view('usuarios.index' , ['users' => $users , 'search'=> $query ]);
        }
        // $users = User::all();
        // return view('usuarios.index' , ['users' => $users]);
    }

    //Mostrar el formulario para crear un nuevo registro
    public function create()
    {
        $roles = Roles::get();
        return view('usuarios.create', compact('roles'));
    }

    //ALmancena los registros recien creados de create en la BD
    public function store(Request $request)
    { 
        $status = 'success';
        $content = 'Usuario Registrado Correctamente';    
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',       
            'password' => 'required',  
            'tipo_usuario' => 'numeric',
        ],[
            'name.required' => 'El campo Nombre es requerido',
            'password.required' => 'El campo Contraseña es requerido',
            'tipo_usuario.numeric' => 'Seleccione un tipo de Usuario',
        ]);
        $usuario = new User();
        $usuario->name = request ('name');
        $usuario->email = request ('email');
        $usuario->type_user = request ('tipo_usuario');
        $usuario->id_universidad = 0;
        $usuario->password = bcrypt(request ('password'));
        $usuario->save();
        $usuario->roles()->sync($request->get('roles'));
        return redirect()->route('index_users', $usuario->id)->with('info', [
            'status' => $status,
            'content' => $content
        ]); 
    }

    //Mostramos un registro especifico
    public function show(Request $request)
    {   
        $role_user = User::roles_user($request->id);
        $user = User::findOrFail($request->id);
        return view('usuarios.show', compact('user','role_user'));
    }

    //Muestra el formulario con los datos a editar de un registro en especifico
    public function edit(Request $request)
    {
        $roles = Roles::orderBy('id')->get();
        $user = User::find($request->id);
        return view('usuarios.edit',compact('roles','user'));
    }

    //Actualizar un registro en la BD
    //UserForm
    public function update(Request $request, $id)
    {
        $usuario =  User::findOrFail($id);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->update();
        $usuario->roles()->sync($request->get('roles'));
        return redirect()->route('index_users', $usuario->id)->with('info', 'Rol registrado con  éxito');
    }

    //Elimina un registro especifico de la BD
    public function delete(Request $request)
    {
        $status = 'error';
        $content = 'Usuario Eliminado Correctamente';    
        $usuario =  User::findOrFail($request->id);
        $usuario->delete();
        return redirect()->route('index_users', $usuario->id)->with('info', [
            'status' => $status,
            'content' => $content
        ]);
    }
}
