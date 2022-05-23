<x-app-layout>
    <div class="container py-8">
        <section>
            <div class=" bg-[#c77942] bg-opacity-75 rounded-lg shadow-lg px-6 py-4 mb-20">
                <h1 class="text-2xl uppercase font-semibold text-white text-center">
                    Mesas
                </h1>
            </div>
            @livewire('mesas', ['table' => $tables])
        </section>
    </div>

    @push('script')

        <script>
            Livewire.on('glider', function(){
                new Glider(document.querySelector('.glider'), {
                slidesToShow: 2.5,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [
                        {
                            breakpoint: 640,
                            settings:{
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings:{
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings:{
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings:{
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });
            });

        </script>
    @endpush
</x-app-layout>

