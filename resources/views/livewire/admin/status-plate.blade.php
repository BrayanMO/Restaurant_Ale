<div class="bg-white shadow-xl rounded-lg p-6 mb-4">
    <p class="text-xl text-center font-semibold mb-4">Estado del Producto</p>

    <div class="flex justify-around">
        <label class="mr-6">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Marcar plato como borrador
        </label>

        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Marcar plato como publicado
        </label>
    </div>

    <div class="flex justify-center mt-4 items-center">
        <x-jet-action-message class="mr-3" on="saved">
            Estado actualizado correctamente.
        </x-jet-action-message>

        <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
            Actualizar
        </x-jet-button>
    </div>
</div>
