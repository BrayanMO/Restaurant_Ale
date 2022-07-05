<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reportes
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12 grid-cols-2">

        <x-table-responsive>
            <div class="grid grid-cols-4 gap-6 mb-4 px-10 bg-white">
                {{-- Fecha Inicial --}}
                <div>
                    <div class="px-6 py-4 text-gray-900">
                        <x-jet-label class="mb-2 text-md" value="Fecha Inicial" />
                        <input class="rounded-lg border-gray-300 shadow disabled" wire:model="fecha_inicio" type="date">
                    </div>
                </div>

                {{-- Fecha Final --}}
                <div>
                    <div class="px-6 py-4 text-gray-900">
                        <x-jet-label class="mb-2 text-md" value="Fecha Final" />
                        <input class="rounded-lg border-gray-300 shadow" wire:model="fecha_fin" type="date">
                    </div>
                </div>
                <div class="px-10 py-7">
                    <a href="">
                        <x-jet-button class="" wire:click="eliminarfiltro()">
                            Eliminar Filtro
                        </x-jet-button>
                    </a>
                    <a href="{{ url('admin/pdf/ventas' . '/' . $fecha_inicio . '/' . $fecha_fin) }}" target="_blank">
                        <x-jet-button class="mt-4">
                            Descargar PDF
                        </x-jet-button>
                    </a>
                </div>
                <div>
                    <div class="px-6 py-4 text-gray-900">
                        <x-jet-label class="mb-2 text-lg" value="Total de Ingresos:" />
                        <strong class="text-lg pl-16">S/ {{$sumtotal}}</strong>
                    </div>
                </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                N° Orden
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mesero
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                N° Mesa
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                        </th>
                    </tr>
                </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$order->id}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$order->user->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 placeholder="AA-MM-DD">

                                            {{\Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s')}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                           {{ $order->table->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-gray-900">
                                            S/ {{$order->total}}
                                        </div>
                                    </td>
                                </tr>

                        @endforeach
                        <!-- More people... -->
                    </tbody>
            </table>
            @if ($orders->hasPages())

                <div class="px-6 py-4">
                    {{$orders->links()}}
                </div>

            @endif

        </x-table-responsive>
    </div>
</div>
