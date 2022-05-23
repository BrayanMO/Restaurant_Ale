<div x-data>
    <div class="flex justify-center">
        <x-jet-secondary-button
            disabled
            x-bind:disabled="$wire.qty <= 1"
            wire:loading.attr="disabled"
            wire:target="decrement"
            wire:click="decrement" >
            -
        </x-jet-secondary-button>

        <span class="flex items-center mx-2 text-gray-700">{{$qty}}</span>

        <x-jet-secondary-button wire:click="increment">
            +
        </x-jet-secondary-button>
    </div>


</div>
