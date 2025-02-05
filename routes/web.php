<?php

use App\Http\Controllers\InicioController;
use App\Livewire\AreaUsers;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, "inicio"])->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/area-users', AreaUsers::class)->name('area-users');
});
