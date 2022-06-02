<div class=" bg-repeat bg-scroll " style="background-image: url(../img/full-bloom.png)">
    <x-app-layout>
        <div class="container">
            <div class=" flex justify-between rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
                <h1 class="text-gray-600 text-2xl uppercase text-left font-indie font-semibold">Orden</h1>
                <p class="text-gray-600 text-2xl uppercase text-left font-indie"><span
                        class="font-semibold">{{ $order->table->name }}</span>
            </div>
            {{-- prueba --}}
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-2 py-4">
                    <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-3 flex items-center">
                        <div class="relative ">
                            <div class="{{ ($order->status >=1 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div class="absolute -left-1.5 mt0-0.5">
                                <p>Recibido</p>
                            </div>
                        </div>

                        <div class="{{ ($order->status >=2 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1  mx-2"></div>

                        <div class="relative ">
                            <div class="{{ ($order->status >=2 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                                <i class="fas fa-utensils text-white"></i>
                            </div>
                            <div class="absolute  -left-4 mt0-0.5">
                                <p>Preparando</p>
                            </div>
                        </div>

                        <div class="{{ ($order->status >=3 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1  mx-2"></div>

                        <div class="relative">
                            <div class="{{ ($order->status >=3 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                                <i class="fas fa-concierge-bell text-white"></i>
                            </div>
                            <div class="absolute -left-2 mt0-0.5">
                                <p>Enviado</p>
                            </div>
                        </div>
                        <div class="{{ ($order->status >=4 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1  mx-2"></div>

                        <div class="relative">
                            <div class="{{ ($order->status >=4 && $order->status !=5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                                <i class="far fa-money-bill-alt text-white"></i>
                            </div>
                            <div class="absolute -left-2 mt0-0.5">
                                <p>Pagado</p>
                            </div>
                        </div>
                    </div>
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
                                                    {{$item->name}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center text-gray-500">
                                           {{$item->price}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm  text-center text-gray-500">
                                            {{$item->qty}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-center text-gray-500">
                                            {{$item->price * $item->qty}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-table-responsive>
                <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                    <div>
                        <p class="text-gray-700">
                            <span class="font-bold text-lg">Total: </span>
                            S/ {{str_replace(",", "", $order->total)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
