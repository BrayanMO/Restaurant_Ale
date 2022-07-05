<style>
    #navigation-menu{
        height:calc(100vh - 4rem);
    }
</style>
<header class="bg-[#1d617a] sticky top-0 z-50" x-data="{ open: false }">
    <div class="container flex items-center h-14 justify-between">
        <a
            x-on:click = "open = ! open"
            class="flex flex-col items-center justify-center order-last md:hidden  px-6 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </a>

        {{-- <img class="flex flex-col items-center justify-center h-12 " width="60" src="img/logo.png" alt=""> --}}


        {{-- <div class="flex-1 hidden md:block">
            @livewire('search')
        </div> --}}

        <div class="hidden md:block">
            @livewire('dropdown-pedido')
        </div>

        <div class="mr-4 ">
            <a href="/" >
                {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                <span class="text-3xl font-sans text-white cursor-pointer font-bold ">Mi </span>
                <span class="text-3xl font-sans text-amber-400 cursor-pointer font-bold"> Alexia</span>
            </a>
        </div>

        <div class="relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="56">
                    <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>
                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @role('admin')
                        <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                Administrador
                            </x-jet-dropdown-link>
                        @endrole

                        @role('cocina')
                        <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link href="{{ route('pedido.index') }}">
                                Pedidos recibidos
                        </x-jet-dropdown-link>

                        @endrole

                        <div class="border-t border-gray-100"></div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>

                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>



    </div>

    <nav id="navigation-menu"
        x-show = "open"
        class="bg-white h-full overflow-y-auto" >
         {{-- menu mobil --}}

        {{-- <div class="container bg-gray-50 py-3 mb-2">
            @livewire('search')
        </div> --}}
        <p class="text-gray-500 px-6 mt-4 mb-4 text-center">USUARIOS</p>

        @livewire('pedido-mobil')

        @auth
            <a href="{{ route('profile.show') }}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-[#1d617a] hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="far fa-address-card"></i>
                </span>

                Perfil
            </a>
            @role('admin')
                <a href="{{  route('admin.index') }}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-[#1d617a] hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-shield"></i>
                    </span>

                    Administrador
                </a>
            @endrole
            @role('cocina')
                <a href="{{  route('pedido.index') }}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-[#1d617a] hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-shield"></i>
                    </span>

                    Pedidos recibidos
                </a>
            @endrole
            <a href=""
                 onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                 class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-[#1d617a] hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-sign-out-alt"></i>
                </span>

                Cerrar Sesion
            </a>

            <form id="logout-form" action="{{ route('logout')}}" method="POST" class="hidden">
                @csrf
            </form>
        @endauth
    </nav>
</header>
