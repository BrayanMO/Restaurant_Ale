<div>
    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total: </span>
                        {{ Cart::subtotal() }}
                    </p>
                </div>
                <x-jet-button wire:click="create_order" wire:loading.attr="disabled"
                    wire:target="create_order">
                    Enviar Comanda
                </x-jet-button>
            </div>
        </div>
    @endif
</div>
