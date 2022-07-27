<div class="flex-1 relative" x-data>

    <x-jet-input wire:model="search" type="text" class="w-full "
        placeholder="Agrega a la comanda algún plato y/o bebida 🤠" />
    <button class="absolute top-0 right-0 w-12 h-full bg-[#1d617a] flex items-center justify-center rounded-r-md">
        <x-search size="35" color="white" />
    </button>

    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                {{-- RADIO BUTTON --}}
                <div class="flex  items-center justify-around py-4" x-data="{ select_price: @entangle('select_price') }">
                    <div  class="border-r-0 xs:border-r-4">
                        <input x-model="select_price" type="radio" value="1" name="select_price"
                            class="text-gray-600 cursor-pointer">
                        <span class="text-xs md:text-base pl-2 pr-4 text-gray-700">
                            Personal
                        </span>
                    </div>
                    <div>
                        <input x-model="select_price" type="radio" value="2" name="select_price"
                            class="text-gray-600 cursor-pointer">
                        <span class="text-xs md:text-base pl-2 pr-4 text-gray-700">
                            Mediana
                        </span>
                    </div>
                    <div>
                        <input x-model="select_price" type="radio" value="3" name="select_price"
                            class="text-gray-600 cursor-pointer">
                        <span class="text-xs md:text-base pl-2 pr-4 text-gray-700">
                            Familiar
                        </span>
                    </div>
                </div>
                @forelse ($plates as $plate)
                    <section class="bg-white flex text-left py-2 w-full items-center">
                        <button wire:click="addItem({{$plate->id}})" wire:loading.attr="disabled"
                            class="pl-2 flex">
                            <i class="fas fa-plus-circle text-blue-400"></i>
                        </button>
                        <div class="ml-4 text-gray-600 ">
                            <p class="text-md font-semibold mb-2 leading-5">{{ $plate->name }}</p>
                            <p class="text-sm">Categoria: {{ $plate->subcategory->category->name }}</p>
                            {{-- RADIO BUTTON DE LOS PRECIOS --}}
                            @if ($plate->subcategory->category->id != 4)
                                {{-- <div class="flex justify-center items-center" x-data="{ select_price: @entangle('select_price') }">
                                    <input x-model="select_price" type="radio" value="1" name="select_price"
                                        class="text-gray-600 cursor-pointer">
                                    <span class="text-xs md:text-base pl-2 pr-4 text-gray-700">
                                        Personal
                                    </span>
                                    <input x-model="select_price" type="radio" value="2" name="select_price"
                                        class="text-gray-600 cursor-pointer">
                                    <span class="text-xs md:text-base pl-2 pr-4 text-gray-700">
                                        Mediana
                                    </span>
                                    <input x-model="select_price" type="radio" value="3" name="select_price"
                                        class="text-gray-600 cursor-pointer">
                                    <span class="text-xs md:text-base pl-2 pr-4 text-gray-700">
                                        Familiar
                                    </span>
                                </div> --}}
                            @else
                                {{-- <p class="text-sm">Categoria: {{ $plate->subcategory->category->name }}</p> --}}
                            @endif
                        </div>
                    </section>
                    <hr>
                @empty
                    <p class="text-md text-center py-2 font-semibold leading-5">No existe el plato o bebida ingresado.
                    </p>
                @endforelse

            </div>

        </div>
    </div>

</div>
