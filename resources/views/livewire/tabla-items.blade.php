<div class="container pb-4">
    <x-table-responsive>
        <div class="px-6 py-4 bg-white text-center">
            <h1 class="text-lg font-semibold text-gray-700">Comanda de Pedido</h1>
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
                                        <button class="text-sm font-medium text-gray-900">
                                            {{ $item->name }}
                                        </button>
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
                <x-jet-danger-button>
                    Enviar Comanda
                </x-jet-danger-button>

            </div>
        </div>
    @endif

    {{-- <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Elige la presentacion del plato o bebida
        </x-slot>

        <x-slot name="content">
            <div x-data="{ select_price: @entangle('select_price') }">
                <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                    <input x-model="select_price" type="radio" value="1" name="select_price" class="text-gray-600">
                    <span class="ml-2 text-gray-700">
                        Fuente Chicha
                    </span>
                </label>

                <div class="bg-white rounded-lg shadow mb-4">
                    <label class=" px-6 py-4 flex items-center">
                        <input x-model="select_price" type="radio" value="2" name="select_price" class="text-gray-600">
                        <span class="ml-2 text-gray-700">
                            Fuente Mediana
                        </span>
                    </label>
                </div>

                <div class="bg-white rounded-lg shadow">
                    <label class=" px-6 py-4 flex items-center">
                        <input x-model="select_price" type="radio" value="3" name="select_price" class="text-gray-600">
                        <span class="ml-2 text-gray-700">
                            Fuente Familiar
                        </span>
                    </label>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="close" wire:loading.attr="disabled">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal> --}}
</div>
