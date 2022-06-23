<div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <div class=" rounded-lg shadow-lg px-6 py-4 mt-1 mb-8 bg-white">
            <h1 class="md:text-3xl text-xl text-center font-semibold">Complete esta información para crear un plato</h1>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- Category --}}
            <div>
                <x-jet-label class="mb-2 text-md md:text-lg" value="Categorias" />
                <select class="w-full form-control cursor-pointer rounded-lg border-none shadow-lg "
                    wire:model="category_id">
                    <option value="" selected disabled>Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="category_id" class="mt-2" />
            </div>
            {{-- Subcategory --}}
            <div>
                <x-jet-label class="mb-2 text-md md:text-lg" value="Subcategorias" />
                <select class="w-full form-control cursor-pointer rounded-lg border-none shadow-lg "
                    wire:model="subcategory_id">
                    <option value="" selected disabled>Seleccione una subcategoría</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="subcategory_id" class="mt-2" />
            </div>

        </div>
        {{-- nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input type="text" class="w-full" wire:model="name"
                placeholder="Ingrese el nombre del plato" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        {{-- slug --}}
        <div class="mb-4">
            <x-jet-label value="Slug" />
            <x-jet-input type="text" disabled class="w-full bg-gray-200" wire:model="slug"
                placeholder="Ingrese el slug del plato" />
            <x-jet-input-error for="slug" class="mt-2" />
        </div>

        {{-- precios --}}
        @if ($category_id != 4)
            <div class="grid grid-cols-3 gap-6 mb-4">
                <div>
                    <x-jet-label class=" text-md" value="Precio Personal" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="price_small"
                        placeholder="Ingrese el precio del plato" />
                    <x-jet-input-error for="price_small" class="mt-2" />
                </div>
                <div>
                    <x-jet-label class="text-md" value="Precio Mediana" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="price_medium"
                        placeholder="Ingrese el precio del plato" />
                    <x-jet-input-error for="price_medium" class="mt-2" />
                </div>
                <div>
                    <x-jet-label class="text-md" value="Precio Familiar" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="price_family"
                        placeholder="Ingrese el precio del plato" />
                    <x-jet-input-error for="price_family" class="mt-2" />
                </div>
            </div>
        @else
            <div class="mb-4">
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="price_small"
                        placeholder="Ingrese el precio de la bebida" />
                    <x-jet-input-error for="price_small" class="mt-2" />
                </div>
            </div>
        @endif

        <div class="flex">
            <x-jet-button wire:loading.attr="disabled"
                        wire:target="save"
                         wire:click="save"
                         class="mt-3 py-3 justify-center w-full md:w-52 md:ml-auto">
                Crear plato
            </x-jet-button>
        </div>
    </div>
</div>
