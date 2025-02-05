<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCrearPedido;
use Livewire\Component;

class CreatePedidos extends Component
{
    public bool $abrirModalCrear = false;

    public FormCrearPedido $form;

    public function render()
    {
        return view('livewire.create-pedidos');
    }

    public function store() {
        $this->form->fGuardarPedido();

        $this->dispatch('onPedidoCreado')->to(AreaUsers::class);

        $this->dispatch('mensaje', 'Se ha creado el pedido');

        $this->cancelar();
    }

    public function abrir() {
        $this->abrirModalCrear = true;
    }

    public function cancelar() {
        $this->abrirModalCrear = false;
        $this->form->limpiar();
    }
}
