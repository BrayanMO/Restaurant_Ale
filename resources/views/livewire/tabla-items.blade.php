<div class="container pb-4">
    <x-table-responsive>
        <div class="flex items-center md:justify-center px-6 py-3 bg-white text-left md:text-center">
            <h1 class="text-lg font-semibold text-gray-700 mr-1">Comanda de Pedido</h1>
            <x-pedido class="ml-4" size="25" />
        </div>

        @if (Cart::count())
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr class="bg-white">
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <i class="far fa-check-circle text-green-500"></i>
                                        <a class="text-sm font-medium text-gray-900 uppercase">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-center text-gray-500">
                                    <span>S/ {{ $item->price }}</span>
                                    <a class="ml-6 cursor-pointer hover:text-red-600"
                                        wire:click="delete('{{ $item->rowId }}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{ $item->rowId }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm  text-gray-500">
                                    {{-- {{$item->rowId}} --}}
                                    @livewire('add-plate-cant', ['rowId' => $item->rowId], key($item->rowId))
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-center text-gray-500">
                                    S/ {{ $item->price * $item->qty }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4 bg-white ">
                <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar comanda de pedido
                </a>
            </div>
        @else
            <div class="flex flex-col items-center bg-white">
                <x-pedido class="flex" />
                <p class="text-lg text-gray-600 mt-4">Tu comanda esta vacía</p>

                <a href="/" class="m-4 py-2 px-16 bg-[#28617A] rounded-lg text-white">
                    Ir al inicio
                </a>

            </div>
        @endif

    </x-table-responsive>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total: </span>
                        {{ Cart::subtotal() }}
                    </p>
                </div>
                <x-jet-button wire:click="create_order" wire:loading.attr="disabled"
                    wire:target="create_order">
                    Enviar Comanda
                </x-jet-button>
            </div>
        </div>
    @endif

</div>
