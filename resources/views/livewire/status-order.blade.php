<div>
    <div class="container">
        <div class=" flex justify-between items-center rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
            <h1 class="text-gray-600 text-lg md:text-2xl uppercase text-left font-indie font-semibold">Orden</h1>
            <div class="flex items-center text-center">
                <img src="/img/camarero.png" width="34" alt="" class="ml-2">
                <p class="text-gray-600 text-lg md:text-lg text-left font-indie font-semibold ml-1">
                    {{ $order->user->name }}</p>
            </div>
            <p class="text-gray-600 text-lg md:text-2xl uppercase text-left font-indie"><span
                    class="font-semibold">{{ $order->table->name }}</span>



        </div>
        {{-- prueba --}}
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-2 py-4">
            <div class="bg-white rounded-lg shadow-lg px-3 md:px-8 py-8 mb-3 flex items-center">
                <div class="relative">
                    <div
                        class="{{ $order->status >= 1 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <div class="absolute -left-1 mt0-0.5">
                        <p class="text-sm md:text-md md:font-semibold">Recibido</p>
                    </div>
                </div>

                <div
                    class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1  md:mx-2">
                </div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-utensils text-white"></i>
                    </div>
                    <div class="absolute  -left-3 mt0-0.5">
                        <p class="text-sm md:text-md md:font-semibold">Preparando</p>
                    </div>
                </div>

                <div
                    class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1   md:mx-2">
                </div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-concierge-bell text-white"></i>
                    </div>
                    <div class="absolute left-.5 mt0-0.5">
                        <p class="text-sm md:text-md md:font-semibold">Enviado</p>
                    </div>
                </div>
                <div
                    class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1   md:mx-2">
                </div>

                <div class="relative ">
                    <div
                        class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="far fa-money-bill-alt text-white"></i>
                    </div>
                    <div class="absolute -left-.5 mt0-0.5">
                        <p class="text-sm md:text-md md:font-semibold">Pagado</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 ">
            <form wire:submit.prevent="update">
                <div class="flex items-center justify-between ">
                    <div class="flex items-center space-x-3">
                        <x-jet-label>
                            <input wire:model="status" type="radio" name="status" value="1" class="mr-1">
                            RECIBIDO
                        </x-jet-label>

                        <x-jet-label>
                            <input wire:model="status" type="radio" name="status" value="2" class="mr-1">
                            PREPARANDO
                        </x-jet-label>

                        <x-jet-label>
                            <input wire:model="status" type="radio" name="status" value="3" class="mr-1">
                            ENVIADO
                        </x-jet-label>

                        <x-jet-label>
                            <input wire:model="status" type="radio" name="status" value="4" class="mr-1">
                            PAGADO
                        </x-jet-label>

                        <x-jet-label>
                            <input wire:model="status" type="radio" name="status" value="5" class="mr-1">
                            ANULADO
                        </x-jet-label>
                    </div>

                    <div>
                        <x-jet-button >
                            Actualizar
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
        {{-- fin prueba --}}
        <div class="flex items-center justify-center rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
            <h1 class="text-gray-600 text-2xl  text-left font-indie font-semibold mr-4">Comanda</h1>
            <x-pedido />
        </div>
        <div class="py-4 ">
            <x-table-responsive>
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
                        @foreach ($items as $item)
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
                                        {{ $item->price }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm  text-center text-gray-500">
                                        {{ $item->qty }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-center text-gray-500">
                                        {{ $item->price * $item->qty }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table-responsive>
            <div class="flex justify-between  items-center bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                <p class="text-gray-700">
                    <span class="font-bold text-lg">Total: </span>
                    S/ {{ str_replace(',', '', $order->total) }}
                </p>

                <a href="/" class=" px-4 py-2 bg-[#28617A] rounded-lg text-white">
                    Ir al inicio
                </a>
            </div>
        </div>
    </div>
</div>
