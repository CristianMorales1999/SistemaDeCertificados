<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>

    <body>

        <!-- HEADER -->
            <div class="w-full p-3 bg-white shadow-lg flex items-center fixed top-0 z-50">
                {{-- Imagen de usuario para usuarios autenticados (versión móvil y desktop) --}}
                
                <div class="w-2/5 flex items-center justify-center 2xl:pr-20">
                    <a href="{{ url('/') }}" class="pl-30">
                        <img src="/imagenes/logoDeSedipro.svg" alt="Descripción de la imagen" class="min-w-[176px] w-44 h-auto cursor-pointer">
                    </a>
                </div>
                                
                @auth
                    <div class="w-3/5 flex items-center justify-end pr-10 md:pr-20">
                        <img src="/imagenes/PerfilUser.png" 
                             alt="Foto de perfil" 
                             class="w-18 h-18 rounded-full cursor-pointer"
                             onclick="window.location.href='{{ route('dashboard') }}'">
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
                        <a href="{{ route('register') }}" class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-[#9636AD] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] border-2 lg:ml-2">
                            <h1 class="flex items-center justify-center text-center text-xs text-[#9636AD] lg:text-xl lg:text-center">Crear Cuenta</h1>
                        </a>
                        <a href="{{ route('login') }}" class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-[#9636AD] hover:bg-[#3454A1] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] hover:border-[#3454A1] border-2 lg:ml-2">
                            <h1 class="flex items-center justify-center text-center text-xs text-white lg:text-xl lg:text-center">Iniciar Sesión</h1>
                        </a>
                    </div>

                    <!-- Menú móvil (solo para usuarios no autenticados) -->
                    <div class="hidden mt-5 fixed top-[72px] left-0 right-0 bg-white rounded-b-lg md:hidden transition-all duration-300" id="mobile-menu">
                        <div class="items-center px-2 pt-2 pr-2 pb-2 space-y-1 bg-[#FFFFFF] rounded-b-lg shadow-[inset_0_12px_10px_-10px_rgba(0,0,0,0.3),0_12px_10px_-10px_rgba(0,0,0,0.4)]">
                            <a href="{{ route('register') }}"
                                class="block px-3 py-2 text-center text-base font-medium text-[#9636AD] bg-[#FFFFFF] hover:bg-[#E7C9EE] rounded-md">
                                Crear Cuenta
                            </a>
                            <a href="{{ route('login') }}"
                                class="block px-3 py-2 text-center text-base font-medium text-white bg-[#9636AD] hover:bg-[#3454A1] rounded-md">
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

    </body>
</html>