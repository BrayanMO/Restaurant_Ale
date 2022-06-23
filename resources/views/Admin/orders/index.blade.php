<x-admin-layout>
    <div class="container py-12">

        <section class="grid lg:grid-cols-5 gap-6 text-white">
            <a href="{{ route('admin.orders.index') . "?status=1"}}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$pendiente}}
                </p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check bg-red-600 p-2 rounded-full"></i>
                </p>
            </a>
            <a href="{{route ('admin.orders.index') . "?status=2"}}" class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$preparando}}
                </p>
                <p class="uppercase text-center">Preparando</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-utensils bg-gray-600 p-2 rounded-full"></i>
                </p>
            </a>
            <a href="{{route ('admin.orders.index')."?status=3"}}" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$enviado}}
                </p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-concierge-bell bg-yellow-600 p-2 rounded-full"></i>
                </p>
            </a>
            <a href="{{route ('admin.orders.index')."?status=4"}}"class="bg-pink-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$pagado}}
                </p>
                <p class="uppercase text-center">Pagado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="far fa-money-bill-alt bg-pink-600 p-2 rounded-full"></i>
                </p>
            </a>
            <a href="{{route ('admin.orders.index')."?status=5"}}" class="bg-green-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$anulado}}
                </p>
                <p class="uppercase text-center">Anulado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle bg-green-600 p-2 rounded-full"></i>
                </p>
            </a>
        </section>
        {{-- {{now()->locale('es')->parse('-1 day', '+19 Hours')}} --}}

        @if ($orders->count())
                <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-600">
                    <h1 class="text-2xl mb-4">Pedidos Recientes</h1>

                    <ul>
                        @foreach ($orders as $order)
                            <li class="py-3">
                                <a href="{{route('admin.orders.show', $order)}}" class="flex items-center justify-between py-2 hover:bg-gray-100">
                                   <div>
                                        <span class="w-12 text-center">
                                            @switch($order->status)
                                                @case(1)
                                                    <i class="fas fa-check text-red-500 opacity-50"></i>
                                                    @break
                                                @case(2)
                                                    <i class="fas fa-utensils text-gray-500 opacity-50"></i>
                                                    @break
                                                @case(3)
                                                    <i class="fas fa-concierge-bell text-yellow-500 opacity-50"></i>
                                                    @break
                                                @case(4)
                                                    <i class="far fa-money-bill-alt text-pink-500 opacity-50"></i>
                                                    @break
                                                @case(5)
                                                    <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                                                    @break
                                                @default

                                            @endswitch
                                        </span>
                                        <span>
                                            Orden: {{$order->id}}
                                            <br>
                                            {{$order->created_at->modify('-5 hours')->format('d/m/Y g:i a')}}
                                        </span>
                                   </div>
                                   <div class="text-right">
                                        <span class="font-bold">
                                                @switch($order->status)
                                                    @case(1)
                                                        Recibido
                                                        @break
                                                    @case(2)
                                                        Preparando
                                                        @break
                                                    @case(3)
                                                        Enviado
                                                        @break
                                                    @case(4)
                                                        Pagado
                                                        @break
                                                    @case(5)
                                                        Anulado
                                                        @break
                                                    @default

                                                @endswitch
                                        </span>
                                        <br>
                                        <div class="">
                                            <span text-sm>
                                                S/.{{$order->total}}
                                            </span>
                                            <span>
                                                <i class="fas fa-angle-right ml-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>

                            </li>
                            <hr>
                            {{-- <div class="border-b-4"></div> --}}
                        @endforeach
                    </ul>
                </section>
            @else
                <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-600">
                    <span class="font-bold" text-1g>
                        No existe Registro de Ordenes
                    </span>
                </div>
            @endif


    </div>
</x-admin-layout>
