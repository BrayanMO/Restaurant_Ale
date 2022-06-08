<div>
    <a href="{{ route('orders.index')}}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-[#1d617a] hover:text-white">
        <span class="flex justify-center w-9">
            <i class="fas fa-clipboard-list"></i>
        </span>
        <span class="relative inline-block pr-4">
            @if ($order->count())
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{$order->count()}}</span>
            @else
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
            @endif
            Lista de Ordenes
        </span>
    </a>
</div>
