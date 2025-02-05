<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        $pedidos = Pedidos::with('user')->where('estado', '=', 'Pendiente')->paginate(10);
        return view('welcome', compact('pedidos'));
    }
}
