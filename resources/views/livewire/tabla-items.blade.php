<div class="container pb-4">

   @livewire('table-cart')

   @livewire('create-items', ['mesa' => $mesa], key($mesa->id))

</div>
