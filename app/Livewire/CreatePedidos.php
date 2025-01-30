<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePedidos extends Component
{
    public bool $abrirModalCrear = false;

    public function render()
    {
        return view('livewire.create-pedidos');
    }

    public function abrir() {
        $this->abrirModalCrear = true;
    }
}
