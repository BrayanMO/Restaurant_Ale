<div wire:init="loadPosts()">
    @if (count($mesas))
        <div class="glider-contain">
            <ul class="glider px-2">
                @foreach ($table as $tables)
                    <li
                        class="bg-white hover:opacity-80 rounded-lg shadow  {{ $loop->last ? '' : 'mr-4' }} {{ $tables->status == '1' ? 'bg-blue-300' : '' }} {{ $tables->status == '2' ? 'bg-red-300' : '' }} {{ $tables->status == '3' ? 'bg-amber-300' : '' }} ">
                        @if ($tables->status == '1')
                            <article>
                                <div>
                                    <a href="{{ route('mesas.show', $tables) }}">
                                        <div class="flex justify-center">
                                            <x-tables-img size='200' />
                                        </div>
                                        <h1
                                            class="text-center bg-amber-400 p-4 rounded-b-lg text-[#1d617a] uppercase font-bold text-lg ">
                                            {{ $tables->name }}</h1>
                                    </a>
                                </div>
                            </article>
                        @elseif ($tables->status == '2')
                            <article>
                                <div>
                                    {{-- href="{{ route('orders.create', [$order, $tables]) }}"--}}
                                    <a wire:click="asd({{ $tables->id }})">
                                        <div class="flex justify-center">
                                            <x-tables-img size='200' />
                                        </div>
                                        <h1
                                            class="text-center bg-amber-400 p-4 rounded-b-lg text-[#1d617a] uppercase font-bold text-lg ">
                                            {{ $tables->name }}</h1>
                                    </a>
                                </div>
                            </article>
                        @endif

                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev ml-2 ">«</button>
            <button aria-label="Next" class="glider-next mr-2">»</button>
            <div role="tablist" class="dots pt-4"></div>
        </div>
    @else
        {{-- animacion de spin --}}
        <div
            class="mb-4 h-48 flex justify-center items-center bg-white opacity-50 shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-[#1d617a]"></div>
        </div>
    @endif

</div>

{{-- SOLO MOBIL --}}
<div class="md:hidden py-20">
    <div class="flex items-center bg-opacity-70 bg-amber-400 rounded-lg shadow-lg px-6 py-4 mb-4">
        <h1 class="text-xl uppercase font-semibold font-sans text-white text-left">
            FECHA: {{ Date::now()->parse('-1 day')->locale('es')->format('l j F') }}
        </h1>
    </div>
    <div class="flex items-center bg-blue-500 bg-opacity-70 rounded-lg shadow-lg px-6 py-4">
        <h1 class="text-xl uppercase font-semibold font-sans text-white text-center">
            HORA: {{ Date::now()->locale('es')->parse('-5 hour')->format('H:i a') }}
        </h1>
    </div>
</div>
