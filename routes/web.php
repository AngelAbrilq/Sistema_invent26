<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedoresController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role_id;
    if ($role == 1) {
        return view('admin.dashboard');
        } elseif ($role == 2) {
        return view('vendedor.dashboard');
    } else {
        return view('clientes.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    });
    
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('formulario', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('formulario', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('proveedores/create', [ProveedoresController::class, 'create'])->name('proveedores.create');
    Route::post('proveedores', [ProveedoresController::class, 'store'])->name('proveedores.store');
    Route::get('proveedores', [ProveedoresController::class, 'index_proveedores'])->name('proveedores.index');

});
