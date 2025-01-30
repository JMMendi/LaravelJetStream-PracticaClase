<?php

namespace App\Livewire\Forms;

use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CrearPedido extends Form
{
    #[Validate(['required', 'min:6', 'max:60', 'unique:pedidos,nombre'])]
    public string $nombre = "";

    #[Validate(['required', 'in:Procesado,Pendiente'])]
    public string $estado = "";

    #[Validate(['required', 'decimal'])]
    public float $cantidad = 0;

    public function fGuardarPedido() {
        $this->validate();

        Pedidos::create([
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'cantidad' => $this->cantidad,
            'user_id' => Auth::user()->id,
        ]);
    }

    public function limpiar() {
        $this->reset();
    }
}
