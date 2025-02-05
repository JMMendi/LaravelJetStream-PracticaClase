<x-app-layout>
    <x-self.base>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div class="mt-2">
        {{$pedidos->links()}}
    </div>
    </x-self.base>
</x-app-layout>