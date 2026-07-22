<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::with('role')->latest()->get();
       $roles = Role::all();

        return view('admin.usuarios.listado_users', compact('usuarios', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.formusuarios');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id'  => ['required', 'exists:roles,id'],
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $usuario = new User();
        $usuario->role_id = $request->post('role_id');
        $usuario->name = $request->post('name');
        $usuario->email = $request->post('email');
        $usuario->password = Hash::make($request->post('password'));
        $usuario->telefono = $request->post('telefono');
        $usuario->direccion = $request->post('direccion');
        $usuario->estado = 'activo';
        // Si el administrador autenticado es quien crea el usuario
        $usuario->created_by = auth()->id();
        $usuario->save();

        return redirect()
            ->route('usuarios.create')
            ->with('success', '¡Registro exitoso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'email'  => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role'   => ['required', 'exists:roles,id'],
            'estado' => ['required', 'in:activo,inactivo'],
        ]);

        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->role_id = $request->post('role');
        $user->estado = $request->post('estado');
        $user->save();

        return redirect()
            ->route('usuarios.index')
            ->with('success', '¡Usuario actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('usuarios.index')
            ->with('success', '¡Usuario eliminado correctamente!');
    }
}
