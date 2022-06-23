<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Plates
                </h1>
                <x-jet-danger-button wire:click="$emit('deletePlate')">
                    Eliminar
                </x-jet-danger-button>
            </div>
        </div>
    </header>


    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-gray-700">

        <div class=" rounded-lg shadow-lg px-6 py-4 mt-1 mb-8 bg-white">
            <h1 class="md:text-3xl text-xl text-center font-semibold">Complete esta información para editar un plato</h1>
        </div>
        {{-- {{\Request::fullUrl()}} --}}

        @livewire('admin.status-plate', ['plate' => $plate], key('status.plate-' . $plate->id))

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
                    wire:model="plate.subcategory_id">
                    <option value="" selected disabled>Seleccione una subcategoría</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="plate.subcategory_id" class="mt-2" />
            </div>

        </div>
        {{-- nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input type="text" class="w-full" wire:model="plate.name"
                placeholder="Ingrese el nombre del plato" />
            <x-jet-input-error for="plate.name" class="mt-2" />
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
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="plate.price_small"
                        placeholder="Ingrese el precio del plato" />
                    <x-jet-input-error for="plate.price_small" class="mt-2" />
                </div>
                <div>
                    <x-jet-label class="text-md" value="Precio Mediana" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="plate.price_medium"
                        placeholder="Ingrese el precio del plato" />
                    <x-jet-input-error for="plate.price_medium" class="mt-2" />
                </div>
                <div>
                    <x-jet-label class="text-md" value="Precio Familiar" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="plate.price_family"
                        placeholder="Ingrese el precio del plato" />
                    <x-jet-input-error for="plate.price_family" class="mt-2" />
                </div>
            </div>
        @else
            <div class="mb-4">
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input type="number" class="w-full" step="0.01" wire:model="plate.price_small"
                        placeholder="Ingrese el precio de la bebida" />
                    <x-jet-input-error for="plate.price_small" class="mt-2" />
                </div>
            </div>
        @endif


        <div class="flex items-center bg-white shadow-xl rounded-lg p-4 mb-4">
            <x-jet-danger-button href="{{ route('admin.index') }}" class="py-3 w-full md:w-52 md:mr-auto">
                Volver
            </x-jet-danger-button>

            <x-jet-action-message class="ml-auto" on="saved">
                Plato Actualizado correctamente.
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save"
                class="py-3 justify-center w-full md:w-52 md:ml-auto">
                Actualizar plato
            </x-jet-button>
        </div>
    </div>

    @push('script')
        <script>
            Livewire.on('deletePlate', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.edit-plate', 'delete')

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
