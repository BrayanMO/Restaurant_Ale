<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg  text-gray-600 leading- leading-tight">
                Lista de Platos
            </h2>

            <x-button-enlace href="{{route('admin.plates.create')}}" class="ml-auto">
                Agregar plato
            </x-button-enlace>
        </div>
    </x-slot>

    <div class="container py-12">
        <div class="px-6 py-4 flex  bg-gradient-to-r from-sky-200 to-indigo-200">
            <x-jet-input class="w-full"
                        wire:model="search"
                        type="text"
                        placeholder="Ingrese el nombre del plato que desea buscar" />

        </div>
        <x-table-responsive>
            @if ($plates->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoria
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precios
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($plates as $plate)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <div class="flex-shrink-0 h-10 w-10">
                                            @if ($product->images->count())
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ Storage::url($product->images->first()->url) }}"
                                                    alt="">
                                            @else
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                src="https://www.creativefabrica.com/wp-content/uploads/2020/09/11/Error-404-page-or-file-not-found-concept-Graphics-5425051-1.jpg"
                                                alt="">
                                            @endif
                                        </div> --}}
                                        <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$plate->name}}
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-gray-400">
                                                    {{$plate->subcategory->name}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$plate->subcategory->category->name}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($plate->status)
                                        @case(1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800">
                                                Borrador
                                            </span>
                                        @break
                                        @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-green-800">
                                                Publicado
                                            </span>
                                        @break
                                        @default

                                    @endswitch

                                </td>
                                @if ($plate->subcategory->category->id != 4)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">
                                        S/{{ $plate->price_small }}  -
                                        S/{{ $plate->price_medium }}  -
                                        S/{{ $plate->price_family }}
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">
                                        S/{{ $plate->price_small }}
                                    </td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.plates.edit', $plate) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4 text-gray-400 font-semibold">
                    No hay ningún registro coincidente.
                </div>
            @endif

            @if ($plates->hasPages())

                <div class="px-6 py-4 bg-gray-100">
                    {{$plates->links()}}
                </div>
            @endif

        </x-table-responsive>
    </div>
</div>
