<?php

namespace App\Livewire;

use App\Livewire\Forms\FormEditarPedido;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AreaUsers extends Component
{
    use WithPagination;

    public FormEditarPedido $uform;
    public bool $abrirModalUpdate = false;
    
    #[On('onPedidoCreado')]
    public function render()
    {
        $pedidos = Pedidos::with('user')->where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('livewire.area-users', compact('pedidos'));
    }

    public function eliminar(Pedidos $pedido) {
        $this->authorize('delete', $pedido);
        $pedido->delete();

        $this->dispatch('mensaje', 'Pedido eliminado correctamente');
    }

    public function cambiarEstado(Pedidos $pedido) {
        $this->authorize('update', $pedido);
        $estadoNuevo = ($pedido->estado === "Procesado") ? "Pendiente" : "Procesado";
        $pedido->update([
            'estado' => $estadoNuevo,
        ]);
        
    }


    public function edit(Pedidos $pedido) {
        $this->authorize('update', $pedido);

        $this->uform->setPedido($pedido);
        $this->abrirModalUpdate = true;
    }

    public function update() {
        $this->uform->fUpdate();
        $this->dispatch('mensaje', 'Pedido editado correctamente');
        $this->cancelar();
    }

    public function cancelar() {
        $this->abrirModalUpdate = false;
        $this->uform->fCancelar();
    }
}
