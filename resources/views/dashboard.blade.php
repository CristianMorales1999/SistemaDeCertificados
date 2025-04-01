<x-layouts.app>

<div class="min-h-screen flex flex-col">

<!-- SECCIÓN PREINTERMEDIA -->
 
<div id="main-content" class="transition-all duration-300">


<div class="min-h-screen flex flex-col">

        <div class="pt-24">

            <!-- SECCIÓN INTERMEDIA -->
            <section class="flex flex-1 h-full">
                <!-- Sección 1/5 - Menú Lateral -->
                <div class="w-1/5 bg-white flex flex-col py-2 space-y-1 fixed top-24 bottom-0 overflow-y-auto">
                    <!-- Botón Dashboard -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-[#9636AD] rounded-r-lg"></div>
                        <button class="cursor-pointer bg-[#9636AD] hover:bg-[#3553A2] h-12 flex-1 flex items-center justify-center space-x-2 group active-nav-button rounded-lg mx-7"
                            onclick="showSection('dashboard')" data-section="dashboard">
                            <h1 class="text-center text-white hidden md:block lg:text-lg">
                                Dashboard
                            </h1>
                        </button>
                    </div>

                    <!-- Botón Certificados -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                        <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                            onclick="showSection('certificados')" data-section="certificados">
                            <h1 class="text-center text-black hidden md:block lg:text-lg">
                                Certificados
                            </h1>
                        </button>
                    </div>

                    <!-- Botón Grupos -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                        <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                            onclick="showSection('grupos')" data-section="grupos">
                            <h1 class="text-center text-black hidden md:block lg:text-lg">
                                Grupos
                            </h1>
                        </button>
                    </div>

                    <!-- Botón Personas -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                        <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                            onclick="showSection('personas')" data-section="personas">
                            <h1 class="text-center text-black hidden md:block lg:text-lg">
                                Personas
                            </h1>
                        </button>
                    </div>

                    <!-- Botón Usuarios -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                        <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                            onclick="showSection('usuarios')" data-section="usuarios">
                            <h1 class="text-center text-black hidden md:block lg:text-lg">
                                Usuarios
                            </h1>
                        </button>
                    </div>

                    <!-- Botón Plantillas -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                        <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                            onclick="showSection('plantillas')" data-section="plantillas">
                            <h1 class="text-center text-black hidden md:block lg:text-lg">
                                Plantillas
                            </h1>
                        </button>
                    </div>

                    <!-- Botón Logos -->
                    <div class="flex items-center">
                        <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                        <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                            onclick="showSection('logos')" data-section="logos">
                            <h1 class="text-center text-black hidden md:block lg:text-lg">
                                Logos
                            </h1>
                        </button>
                    </div>
                </div>

        <!-- Sección 4/5 -->
        <div class="w-4/5 bg-[#EBF1FD] py-5 px-0 flex flex-col ml-[20%]">
            <div class="flex-1">
                <div id="dashboard" class="content-section">

                    <div class="flex items-center justify-between pb-4 px-10">
                        <h1 class="text-xs md:text-sm lg:text-lg xl:text-2xl">Dashboard</h1>
                    </div>

                    <!-- INFORMACION PARA DASHBOARD-->
                    <div class="grid grid-cols-4 gap-6 pl-10 pr-20 ml-1 mr-3">
                        <!-- Botón Usuarios -->
                        <div class="bg-white px-4 py-4 rounded-md shadow-md bg-transparent text-[#000000] flex items-center flex-1">
                            <div>
                                <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Usuarios</h1>
                                <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">40,689</h1>
                            </div>
                            <div class="bg-[#E5E4FF] p-4 py-4 rounded-lg ml-auto">
                                <img src="/imagenes/icons/1.svg" alt="Usuarios Icon" class="w-10 h-10">
                            </div>
                        </div>

                        <!-- Botón Grupos -->
                        <div class="bg-white px-4 py-2 rounded-md shadow-md bg-transparent text-[#000000] flex items-center flex-1">
                            <div>
                                <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Grupos</h1>
                                <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">10,293</h1>
                            </div>
                            <div class="bg-[#FFF3D6] p-4 py-4 rounded-lg ml-auto">
                                <img src="/imagenes/icons/2.svg" alt="Grupos Icon" class="w-10 h-10">
                            </div>
                        </div>

                        <!-- Botón Certificados -->
                        <div class="bg-white px-4 py-2 rounded-md shadow-md bg-transparent text-[#000000] flex items-center flex-1">
                            <div>
                                <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Certificados</h1>
                                <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">89,000</h1>
                            </div>
                            <div class="bg-[#D9F7E8] p-4 py-4 rounded-lg ml-auto">
                                <img src="/imagenes/icons/3.svg" alt="Certificados Icon" class="w-10 h-10">
                            </div>
                        </div>

                        <!-- Botón Pendientes -->
                        <div class="bg-white px-4 py-2 rounded-md shadow-md bg-transparent text-[#000000] flex items-center flex-1">
                            <div>
                                <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Pendientes</h1>
                                <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">2,040</h1>
                            </div>
                            <div class="bg-[#FFDED1] p-4 py-4 rounded-lg ml-auto">
                                <img src="/imagenes/icons/4.svg" alt="Pendientes Icon" class="w-10 h-10">
                            </div>
                        </div>
                    </div>

                    <!-- GRAFICO DE LINEAS-->
                    <div class="px-10 pr-20 mr-3 ml-1 mt-5">
                        <div class="w-full bg-white rounded-lg shadow-lg dark:bg-gray-800 p-5">
                            <div class="flex justify-between pb-0">
                                <div>
                                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-2">Certificados</h5>
                                </div>
                            </div>
                            <!-- Agregar el div para el gráfico con una altura específica -->
                            <div id="labels-chart" style="height: 300px;"></div>
                        </div>
                    </div>

                    <x-endin-redes>
                    </x-endin-redes>

                    <!-- LIBRERIA APEXCHARTS ANTES DEL SCRIPT -->
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                    
                    <!-- SCRIPT PARA EL GRAFICO DE LINEAS-->
                    <script>
                        // Asegurarse de que el DOM esté cargado
                        document.addEventListener('DOMContentLoaded', function() {
                            const options = {
                                series: [{
                                    name: "Ventas",
                                    data: [3, 5, 2, 3, 1, 2, 4, 1, 3, 1, 2]
                                }],
                                chart: {
                                    height: 300,
                                    type: "line"
                                },
                                xaxis: {
                                    categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb', '08 Feb', '09 Feb', '10 Feb', '11 Feb']
                                }
                            };

                            // Verificar si el elemento existe y si ApexCharts está definido
                            if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
                                const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                                chart.render();
                            }
                        });
                    </script>
                    <!-- FIN GRAFICO DE LINEAS-->

                </div>  
                
                <div id="certificados" class="content-section hidden">
                    
                @livewire('certificados-post')

                </div>

                <div id="grupos" class="content-section hidden">
                <h1>SECCION DE GRUPOS</h1>
                </div>

                <div id="personas" class="content-section hidden">
                <h1>SECCION DE PERSONAS</h1>
                </div>

                <div id="usuarios" class="content-section hidden">
                <h1>SECCION DE USUARIOS</h1>
                </div>

                <div id="plantillas" class="content-section hidden">
                <h1>SECCION DE PLANTILLAS</h1>
                </div>

                <div id="logos" class="content-section hidden">
                <h1>SECCION DE LOGOS</h1>
                </div>

            </div>
        </div>

        <!-- SCRIPT PARA MANEJAR EL DASHBARD -->
        <script>
        @vite('resources/js/admin.js')
        </script>

    </div> 

<!-- FIN SECCIÓN INTERMEDIA -->


</x-layouts.app>