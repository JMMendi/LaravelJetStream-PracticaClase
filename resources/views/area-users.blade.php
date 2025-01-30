<x-app-layout>
    <x-self.base>

        <div class="flex flex-row-reverse">
            <x-button>Nuevo</x-button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->estado}}
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
                            <button>
                                <i class="fas fa-trash text-gray-500 hover:text-gray-800 hover:text-xl"></i>
                            </button>
                            <button>
                                <i class="fas fa-edit text-green-500 hover:text-green-800 hover:text-xl"></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </x-self.base>
</x-app-layout>