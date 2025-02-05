<?php

namespace App\Livewire\Forms;

use App\Models\Pedidos;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormEditarPedido extends Form
{
    public ?Pedidos $pedido = null;

    public string $nombre = "";

    #[Validate(['required', 'in:Procesado,Pendiente'])]
    public string $estado = "";

    #[Validate(['required', 'decimal:2'])]
    public float $cantidad = 0;

    public function rules() : array {
        return [
            'nombre' => ['required', 'string', 'min:6', 'max:60', 'unique:pedidos,nombre,'.$this->pedido->id],
        ];
    }

    public function setPedido(Pedidos $pedido) {
        $this->pedido = $pedido;
        $this->nombre = $pedido->nombre;
        $this->estado = $pedido->estado;
        $this->cantidad = $pedido->cantidad;
    }

    public function fUpdate() {
        $this->validate();
        $this->pedido->update([
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'cantidad' => $this->cantidad,
        ]);
    }

    public function fCancelar() {
        $this->reset();
    }
}
