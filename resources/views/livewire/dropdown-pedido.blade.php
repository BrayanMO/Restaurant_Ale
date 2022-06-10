<div>
    <a width="96" href="{{ route('orders.index')}}">
        <x-pedido color="white"/>

        @if ($order->count())
        <span class="absolute top-1 flex-0 inline-flex items-center justify-center ml-3 px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 bg-red-600 rounded-full">{{$order->count()}}</span>
        @else
            <span class="absolute top-1 flex-0 inline-block w-2 h-2 ml-5 mt-1 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
        @endif
    </a>
</div>
