<div>
    <x-jet-form-section submit="save" class="mb-6">

        <x-slot name="title">
            Crear nueva categoría
        </x-slot>

        <x-slot name="description">
            Ingrese la informacion necesaria para agregar una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input disabled wire:model="createForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Ícono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" type="text" class="w-full mt-1" />
                <x-jet-input-error for="createForm.icon" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3 text-gray-400" on="saved">
                Categoría creada correctamente
            </x-jet-action-message>
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de Categorías
        </x-slot>

        <x-slot name="description">
            Aqui encontrará todas las categorias agregadas
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="">
                        <th class="py-2 w-full text-left">Nombre</th>
                        <th class="py-2 text-center">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!! $category->icon !!}
                                </span>

                                <a href="{{route('admin.categories.show', $category)}}" class="uppercase underline hover:text-blue-600">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $category->slug }}')">Editar</a>

                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deleteCategory', '{{ $category->slug }}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            Editar categoría
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="editForm.name" />
                </div>

                <div>
                    <x-jet-label>
                        Slug
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                    <x-jet-input-error for="editForm.slug" />
                </div>

                <div>
                    <x-jet-label>
                        Ícono
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editForm.icon" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editForm.icon" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="cursor-pointer" wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
