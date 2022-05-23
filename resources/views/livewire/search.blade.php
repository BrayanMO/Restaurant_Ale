<div class="flex-1 relative" x-data>
    <x-jet-input wire:model="search" type="text" class="w-full "
        placeholder="Agrega a la comanda algún plato y/o bebida 🤠" />
    <button class="absolute top-0 right-0 w-12 h-full bg-[#1d617a] flex items-center justify-center rounded-r-md">
        <x-search size="35" color="white" />
    </button>

    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($plates as $plate)
                    <button wire:click="addItem({{$plate->id}})" wire:loading.attr="disabled"
                            class="flex text-left py-2 w-full items-center">
                            <div class="pl-2">
                                <i class="fas fa-plus-circle text-blue-400"></i>
                            </div>
                            <div class="ml-4 text-gray-600 ">
                                <p class="text-md font-semibold mb-2 leading-5">{{ $plate->name }}</p>
                                {{-- <p class="text-sm">Categoria: {{ $plate->subcategory->category->name }}</p> --}}
                                {{-- RADIO BUTTON DE LOS PRECIOS --}}
                                <div class="flex justify-center" x-data="{ select_price: @entangle('select_price')}">
                                    <input x-model="select_price" type="radio" value="1" name="select_price" class="text-gray-600">
                                    <span class="text-xs mr-4 text-gray-700">
                                        Personal
                                    </span>
                                    <input x-model="select_price" type="radio" value="2" name="select_price" class="text-gray-600">
                                    <span class="text-xs mr-4 text-gray-700">
                                        Mediana
                                    </span>
                                    <input x-model="select_price" type="radio" value="3" name="select_price" class="text-gray-600">
                                    <span class="text-xs mr-4 text-gray-700">
                                        Familiar
                                    </span>
                                </div>
                            </div>
                    </button>
                    <hr>
                @empty
                    <p class="text-md text-center py-2 font-semibold leading-5">No existe el plato o bebida ingresado.
                    </p>
                @endforelse
            </div>

        </div>
    </div>
    {{-- modal presentacion --}}
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
