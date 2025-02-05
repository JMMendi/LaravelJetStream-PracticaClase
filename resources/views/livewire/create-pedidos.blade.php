<div>
    <x-button wire:click="abrir">Nuevo</x-button>
    <x-dialog-modal wire:model="abrirModalCrear" maxWidth="2xl">
        <x-slot name="title">
            Nuevo Pedido
        </x-slot>

        <x-slot name="content">
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Pedido</label>
                <input type="nombre" id="nombre" wire:model="form.nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                <x-input-error for="form.nombre"/>
            </div>
            <div class="mb-5">
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado del Pedido</label>
                <input type="radio" name="estado" wire:model="form.estado" value="Procesado" class="mr-2" /> Procesado
                <input type="radio" name="estado" wire:model="form.estado" value="Pendiente" class="mr-2" /> Pendiente
                <x-input-error for="form.estado"/>

            </div>
            <div class="mb-5">
                <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900">Cantidad</label>
                <input type="number" name="cantidad" wire:model="form.cantidad" id="cantidad">
                <x-input-error for="form.cantidad"/>

            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="store" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
            <a wire:click="cancelar" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
        </x-slot>
    </x-dialog-modal>
</div>