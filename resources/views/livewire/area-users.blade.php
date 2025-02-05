    <x-self.base>

        <div class="flex flex-row-reverse">
            @livewire('create-pedidos')
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha del Pedido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$item->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            <button @class([
                                'p-2 rounded-xl text-white font-bold',
                                'bg-red-500 hover:bg-red-700' => $item->estado === "Pendiente",
                                'bg-green-500 hover:bg-green-700' => $item->estado === "Procesado"
                                ]) wire:click="cambiarEstado({{$item->id}})">{{$item->estado}}

                            </button>
                            
                        </td>
                        <td class="px-6 py-4">
                            {{$item->cantidad}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->user->name}} ({{$item->user->email}})
                        </td>
                        <td class="px-6 py-4">
                            {{$item->updated_at}}
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="eliminar({{$item->id}})">
                                <i class="fas fa-trash text-gray-500 hover:text-gray-800 hover:text-xl"></i>
                            </button>
                            <button wire:click="edit({{$item->id}})">
                                <i class="fas fa-edit text-green-500 hover:text-green-800 hover:text-xl"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        @isset($uform->pedido)
            <x-dialog-modal wire:model="abrirModalUpdate" maxWidth="2xl">
            <x-slot name="title">
                Editar Pedido
            </x-slot>

            <x-slot name="content">
                <div class="mb-5">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Pedido</label>
                    <input type="nombre" id="nombre" wire:model="uform.nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    <x-input-error for="uform.nombre"/>
                </div>
                <div class="mb-5">
                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado del Pedido</label>
                    <input type="radio" name="estado" wire:model="uform.estado" value="Procesado" class="mr-2" /> Procesado
                    <input type="radio" name="estado" wire:model="uform.estado" value="Pendiente" class="mr-2" /> Pendiente
                    <x-input-error for="uform.estado"/>

                </div>
                <div class="mb-5">
                    <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900">Cantidad</label>
                    <input type="number" name="cantidad" wire:model="uform.cantidad" id="cantidad">
                    <x-input-error for="uform.cantidad"/>

                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="submit" wire:click="update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Editar</button>
                <a wire:click="cancelar" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
            </x-slot>
        </x-dialog-modal>
        @endisset
    </x-self.base>