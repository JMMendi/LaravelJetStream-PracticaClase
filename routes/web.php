<?php

use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pedidos = Pedidos::with('user')->where('estado', '=', 'Pendiente')->paginate(10);
    return view('welcome', compact('pedidos'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/area-users', function() {
        $pedidos = Pedidos::with('user')->where('user_id', '=', Auth::user()->id) -> get();
        return view('area-users', compact('pedidos'));
    })->name('area-users');
});
