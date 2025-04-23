<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>

    <!-- HEADER -->
    <div class="w-full p-3 bg-white shadow-lg flex items-center fixed top-0 z-50">

        <div class="w-1/4 flex items-center justify-center 2xl:pr-20">
            <a href="{{ url('/') }}">
                <img src="/imagenes/logoDeSedipro.svg" alt="Sedipro UNT - Logo" class="min-w-[176px] w-44 h-auto cursor-pointer">
            </a>
        </div>

        {{-- Imagen de usuario para usuarios autenticados (versión móvil y desktop) --}}
        @auth
        <div class="w-3/4 flex items-center justify-end pr-10 md:pr-20 ml-[5%] relative" id="user-menu-container">
            <img src="{{asset('/imagenes/PerfilUser.png')}}"
                alt="Foto de perfil"
                class="w-18 h-18 rounded-full cursor-pointer"
                id="user-menu-button">

            <!-- Menú desplegable -->
            <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 z-50 top-full">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-accent-300 hover:text-white rounded-md">Ir al Panel</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-accent-300 hover:text-white rounded-md">Mi perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-red-200 hover:text-white rounded-md cursor-pointer">Cerrar sesión</button>
                </form>
            </div>
        </div>


        @endauth
        <!-- Botón de menú hamburguesa solo para usuarios no autenticados en móvil/tablet -->
        @guest
        <div class="w-2/4 flex justify-end md:hidden">
            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Abrir menú principal</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Menú para desktop (solo para usuarios no autenticados) -->
        <div class="hidden w-2/4 md:flex justify-center">
            <a href="{{ route('register') }}" class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-accent-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 border-2 lg:ml-2">
                <h1 class="flex items-center justify-center text-center text-xs text-accent-300 lg:text-xl lg:text-center">Crear Cuenta</h1>
            </a>
            <a href="{{ route('login') }}" class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-accent-300 hover:bg-primary-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 hover:border-primary-300 border-2 lg:ml-2">
                <h1 class="flex items-center justify-center text-center text-xs text-white lg:text-xl lg:text-center">Iniciar Sesión</h1>
            </a>
        </div>

        <!-- Menú móvil (solo para usuarios no autenticados) -->
        <div class="hidden mt-5 fixed top-[72px] left-0 right-0 bg-white rounded-b-lg md:hidden transition-all duration-300" id="mobile-menu">
            <div class="items-center px-2 pt-2 pr-2 pb-2 space-y-1 bg-white rounded-b-lg shadow-[inset_0_12px_10px_-10px_rgba(0,0,0,0.3),0_12px_10px_-10px_rgba(0,0,0,0.4)]">
                <a href="{{ route('register') }}"
                    class="block px-3 py-2 text-center text-base font-medium text-accent-300 bg-white hover:bg-[#E7C9EE] rounded-md">
                    Crear Cuenta
                </a>
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 text-center text-base font-medium text-white bg-accent-300 hover:bg-primary-300 rounded-md">
                    Iniciar Sesión
                </a>
            </div>
        </div>
        @endguest



        <script>
            document.querySelector('[data-collapse-toggle="mobile-menu"]').addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                const mainContent = document.getElementById('main-content'); // Asegúrate de agregar este ID a tu contenido principal

                mobileMenu.classList.toggle('hidden');

                if (!mobileMenu.classList.contains('hidden')) {
                    // Cuando el menú está abierto, añade margen al contenido
                    mainContent.style.marginTop = '110px'; // Ajusta este valor según la altura de tu menú
                } else {
                    // Cuando el menú está cerrado, regresa el margen a su valor original
                    mainContent.style.marginTop = '20px'; // Altura original del header
                }
            });
        </script>

    </div>
    <!-- FIN HEADER -->

    {{ $slot }}

    <script>
        const userButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        const userContainer = document.getElementById('user-menu-container');

        userButton?.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!userContainer.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    </script>

</body>

</html>