<div class=" bg-repeat bg-scroll " style="background-image: url(../img/full-bloom.png)">
    <x-app-layout>
        <div class="container">
                <div class="rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
                    <p class="text-gray-600 text-2xl uppercase text-center font-indie"><span
                            class="font-semibold">{{ $mesa->name }}</span>
                </div>


                <div class="bg-amber-300 rounded-lg shadow-lg px-6 py-4 mt-6 md:mx-24 mb-12">
                    <div class="flex-1">
                        @livewire('search')
                    </div>
                </div>

                @livewire('tabla-items', ['mesa' => $mesa], key($mesa->id))

        </div>
    </x-app-layout>
    {{-- <script>
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
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
                console.log(result)
              })

    </script> --}}

</div>
