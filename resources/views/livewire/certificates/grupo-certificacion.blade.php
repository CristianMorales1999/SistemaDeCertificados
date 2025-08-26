<div class="bg-[var(--color-primary-50)] overflow-hidden">
    {{-- The Master doesn't talk, he acts. --}}
    <div class="w-full mx-auto sm:p-2 md:p-4 lg:p-8 xl:p-16">
        <!-- Titulo -->
        <div class="w-full m-auto flex justify-center py-12">
            <h2 class="font-bold text-xl md:text-2xl xl:text-3xl">
                <!-- Generación de Certificado -->
                Crear Nuevo Grupo
            </h2>
        </div>
        {{-- CONTENIDO --}}
        <div class="w-full flex flex-col lg:flex-row items-stretch justify-between space-x-12">
            <!----------------------- TABLA PARA SELECCIONAR BENEFICIARIOS DE CERTIFICADOS ------------------>
            <div class="w-full lg:w-2/3 flex items-center">
                <div class="w-full">
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <div class="bg-[var(--color-primary-25)] p-4 rounded-lg">
                            <div class="flex items-center gap-4">
                                {{-- FILTRO --}}
                                <div class="mb-4 p-2">
                                    <img src="/imagenes/icons/search-icon.svg" alt="Search Icon" class="w-5 h-5">
                                </div>

                                {{-- BUSCADOR --}}
                                <div class="relative mt-1 mb-5 flex-1">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input  wire:model.live="search"
                                            type="text"
                                            id="table-search"
                                            class="bg-white border shadow-md border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900 block w-min-60 w-full pl-10 p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Buscar por código o titular">
                                </div>

                                {{-- AÑADIR PERSONA Y CARGAR ARCHIVO --}}
                                <div class="flex items-center gap-4">
                                    {{-- Incio de ventana modal para crear nueva persona --}}
                                    <div x-data="{ openNuevaPersona: false }" wire:ignore>

                                        <!-- Boton para abrir el modal -->
                                        <button
                                            @click="openNuevaPersona = true"
                                            class="px-4 py-1.5 mb-4 flex items-center justify-center bg-white hover:bg-[var(--color-accent-100)] text-[var(--color-accent-300)] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[var(--color-accent-300)] border-2 cursor-pointer">
                                            <img src="/imagenes/icons/plus.svg" alt="Search Icon" class="w-4 h-4 mr-2">
                                            <span class="text-center text-xs lg:text-sm">
                                            Añadir persona
                                        </button>

                                        <!-- Fondo desenfocado y modal -->
                                        <div
                                            x-show="openNuevaPersona"
                                            x-cloak
                                            x-transition
                                            class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm" {{-- Fondo desenfocado --}}
                                        >
                                            <!-- Al hacer clic en el fondo cerrar -->
                                            <div
                                                class="absolute inset-0"
                                                @click="openNuevaPersona = false"
                                            ></div>

                                            <!-- Ventana modal -->
                                            <div
                                                class="top-20 relative flex flex-col content-center bg-white rounded-xl shadow-[0_6px_24px_rgba(128,90,213,0.5)]  w-full max-w-md p-6 z-10 "
                                                @click.stop
                                                style="top: -50px"
                                            >
                                                {{-- TITULO MODAL --}}
                                                <h2 class="block text-lg text-center font-medium text-blue-500 mb-2  mt-4">Registrar nueva persona</h2>
                                                {{-------------------- CONTENIDO MODAL --------------------}}
                                                {{-- Campo Nombres --}}
                                                <label for="nombresNuevaPersona" class="block text-sm font-medium text-gray-700 mb-2">Ingrese nombres: </label>
                                                <input type="text"
                                                name="nombresNuevaPersona"
                                                id="nombresNuevaPersona"
                                                wire:model="nombresNuevaPersona"
                                                placeholder="Nombres"
                                                class="w-full rounded-lg p-2 text-base bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-2">

                                                {{-- Campo Apellidos --}}
                                                <label for="apellidosNuevaPersona" class="block text-sm font-medium text-gray-700 mb-2">Ingrese apellidos: </label>
                                                <input type="text"
                                                name="apellidosNuevaPersona"
                                                id="apellidosNuevaPersona"
                                                wire:model="apellidosNuevaPersona"
                                                placeholder="Apellidos"
                                                class="w-full rounded-lg p-2 text-base bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-2">

                                                {{-- Campo Correo --}}
                                                <label for="correoNuevaPersona" class="block text-sm font-medium text-gray-700 mb-2">Ingrese nombres: </label>
                                                <input type="email"
                                                name="correoNuevaPersona"
                                                id="correoNuevaPersona"
                                                wire:model="correoNuevaPersona"
                                                placeholder="Correo electrónico"
                                                class="w-full rounded-lg p-2 text-base bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-2">


                                                {{-- --}}

                                                <!--------------- Dropdown AREAS ----------------->
                                                <div x-data="{ openArea: @entangle('showDropdownAreas') }" class="relative w-full mb-2">
                                                    <p class="block text-base font-medium text-gray-700 mb-2">Seleccionar área: </p>
                                                    <div class="w-full flex items-center justify-between p-2 bg-white border border-gray-300 rounded-lg cursor-pointer"
                                                        @click="openArea = !openArea">
                                                        <p class="w-full truncate">{{ $areaSeleccionada['name'] ?? 'Seleccionar área' }}</p>
                                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="relative w-full" x-show="openArea" @click.outside="openArea = false">
                                                        <div class="absolute inset-x-0 z-10 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                                            <input type="text"
                                                                    wire:model.live="searchArea"
                                                                    placeholder="Buscar..."
                                                                class="w-full p-2 border-b border-gray-300 outline-none">
                                                            <ul class="max-h-60 overflow-y-auto">
                                                                @php
                                                                    $areasFiltradas = collect($areas)->filter(function($area) use ($searchArea) {
                                                                        return str_contains(strtolower($area['name']), strtolower($searchArea));
                                                                    });
                                                                @endphp


                                                                @forelse($areasFiltradas as $area)
                                                                    <li wire:click="selectAreas({{ $area['id'] }})"
                                                                        class="p-2 cursor-pointer hover:bg-gray-200">
                                                                        {{ $area['name'] }}
                                                                    </li>
                                                                @empty
                                                                    <li class="p-2 text-gray-500">No se encuentran coincidencias.</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- BOTON PARA CERRAR MODAL --}}



                                                <!-- Botones -->
                                                <div class="mx-auto mt-12 flex gap-4">
                                                    <button
                                                        class="w-24 mt-4 px-4 py-2 border border-purple-500 text-purple-500 rounded hover:bg-purple-100 transition cursor-pointer"
                                                        wire:click="guardar"> {{-- FALTA IMPLEMENTAR--}}
                                                        Guardar
                                                    </button>


                                                    <button
                                                        class=" w-24 mt-4 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 transition cursor-pointer"
                                                        @click="openNuevaPersona = false">
                                                        Cerrar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- FIn de ventana modal para crear nueva persona --}}


                                    <a href=""
                                        class="px-4 py-1.5 mb-4 flex items-center justify-center bg-[var(--color-accent-300)] hover:bg-[var(--color-primary-300)] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[var(--color-accent-300)] hover:border-[var(--color-primary-300)] border-2">
                                        <img src="/imagenes/icons/upload.svg" alt="Search Icon" class="w-3.5 h-3.5 mr-2">
                                        <span class="text-center text-xs text-white lg:text-sm">Cargar Archivo</span>
                                    </a>
                                </div>

                            </div>

                            @if(is_array($datosGrupos) && count($datosGrupos) > 0)
                            <!-- Resto del contenido de la tabla -->
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                {{-- ENCABEZADOS --}}
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        {{-- CHECKBOXS --}}
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-[var(--color-primary-25)] border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>

                                        {{-- COLUMNA DE ID'S --}}
                                        <th>
                                            <div class="flex items-center">
                                                ID
                                                <div class="flex flex-col ml-3">
                                                    <img src="{{ asset('icons/triangle.svg') }}" wire:click="order('id')"
                                                         class="w-3 h-3 cursor-pointer {{ $sort === 'id' && $direction === 'asc' ? 'opacity-100' : 'opacity-40' }}"
                                                         alt="Ascendente">
                                                    <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('id')"
                                                         class="w-3 h-3 cursor-pointer {{ $sort === 'id' && $direction === 'desc' ? 'opacity-100' : 'opacity-40' }}"
                                                         alt="Descendente">
                                                </div>
                                            </div>
                                        </th>

                                        {{-- COLUMNA DE CODIGO --}}
                                        <th class="pl-6">
                                            <div class="flex items-center">
                                                Código
                                                <div class="flex flex-col ml-3">
                                                    <img src="{{ asset('icons/triangle.svg') }}" wire:click="order('codigo')"
                                                         class="w-3 h-3 cursor-pointer {{ $sort === 'codigo' && $direction === 'asc' ? 'opacity-100' : 'opacity-40' }}"
                                                         alt="Ascendente">
                                                    <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('codigo')"
                                                         class="w-3 h-3 cursor-pointer {{ $sort === 'codigo' && $direction === 'desc' ? 'opacity-100' : 'opacity-40' }}"
                                                         alt="Descendente">
                                                </div>
                                            </div>
                                        </th>

                                        {{-- COLUMNA DE TITULAR/NOMBRE --}}
                                        <th class="pl-6">
                                            <div class="flex items-center">
                                                Titular
                                                <div class="flex flex-col ml-3">
                                                    <img src="{{ asset('icons/triangle.svg') }}" wire:click="order('titular')"
                                                         class="w-3 h-3 cursor-pointer {{ $sort === 'titular' && $direction === 'asc' ? 'opacity-100' : 'opacity-40' }}"
                                                         alt="Ascendente">
                                                    <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('titular')"
                                                         class="w-3 h-3 cursor-pointer {{ $sort === 'titular' && $direction === 'desc' ? 'opacity-100' : 'opacity-40' }}"
                                                         alt="Descendente">
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                {{-- CUERPO DE LA TABLA --}}
                                <tbody>
                                    @foreach($datosGrupos as $certificado)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-{{ $certificado['id'] }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-{{ $certificado['id'] }}" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ $certificado['id'] }}
                                        </th>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            @else
                                <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
                                    <h1 class="px-3 py-3 text-[#991C24]">
                                        No existe personas que mostrar
                                    </h1>
                                </div>
                            @endif

                        </div>

                        <!-- BOTONES DE PAGINACION -->
                        <div class="flex justify-between mt-5 gap-8">

                            <!-- Botón Anterior -->
                            <button type="button"
                                class="flex items-center px-6 py-2 border border-black text-black hover:bg-gray-100 cursor-not-allowed' }}">
                                <span class="mr-2">&lt;&lt;</span>
                                Anterior
                            </button>

                            <!-- Botón Siguiente -->
                            <button type="button"
                                class="flex items-center px-6 py-2 border border-black text-black hover:bg-gray-100 cursor-not-allowed' }}">
                                <span class="ml-2">&gt;&gt;</span>
                                Siguiente
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!------------------------------- ENTRADAS PARA CREAR GRUPO ------------------------------->
            <div class="w-full lg:w-1/3 mx-auto min-h-max h-auto flex flex-col justify-between content-between font-normal text-sm md:text-base text-gray-700">

                <div class="w-full space-y-8">
                    <div class="space-y-4">
                        {{-- Input nombre --}}
                        <div class="w-full">
                            <label for="nombreGrupo" class="block mb-1 text-sm font-medium text-gray-700">Nombre del grupo</label>
                            <input
                                type="text"
                                id="nombreGrupo"
                                name="nombreGrupo"
                                wire:model="nombreGrupo"
                                placeholder="Ej. Egresados 2024"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900"
                            >
                        </div>

                        {{-- Input descripción --}}
                        <div class="w-full">
                            <label for="descripcionGrupo" class="block mb-1 text-sm font-medium text-gray-700">Descripción de grupo</label>
                            <input
                                type="text"
                                id="descripcionGrupo"
                                name="descripcionGrupo"
                                wire:model="descripcionGrupo"
                                placeholder="Ej. Grupo que incluye miembros de Sedipro que ..."
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900 truncate"
                            >
                        </div>


                        {{--------------- Dropdown Fecha de emision -----------------}}
                        <div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Fecha de emisión</label>

                            <!-- Caja estilo dropdown -->
                            <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer"
                                onclick="this.querySelector('input').showPicker()">
                                <input
                                    type="date"
                                    wire:model="fechaEmision"
                                    class="w-full bg-transparent outline-none border-none cursor-pointer"
                                >
                                <!-- Ícono de calendario alineado a la derecha -->
                            </div>
                        </div>

                        <!--------------- Dropdown Tipo de certificado ----------------->
                        <div x-data="{ open: @entangle('showDropdownTiposCertificados') }" class="w-full">
                            <p class="block mb-2 text-sm font-medium text-gray-700">Tipo de Certificado</p>
                            <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer"
                                @click="open = !open">
                                <p class="w-full truncate">{{ $tipoCertificadoSeleccionado['name'] ?? 'Seleccionar tipo de certificado' }}</p>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>

                            <div class="relative w-full" x-show="open" @click.outside="open = false">
                                <div class="absolute inset-x-0 z-10 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                    <input type="text"
                                            wire:model.live="searchTipoCertificado"
                                           placeholder="Buscar..."
                                           class="w-full p-2 border-b border-gray-300 outline-none">

                                    <ul class="max-h-60 overflow-y-auto">
                                    @php
                                        $tiposCertificadosFiltrados = collect($tiposCertificados)->filter(function($tipoCertificado) use ($searchTipoCertificado) {
                                            return str_contains(strtolower($tipoCertificado['name']), strtolower($searchTipoCertificado));
                                        });
                                    @endphp

                                    @forelse ($tiposCertificadosFiltrados as $tipoCertificado)
                                        <li wire:click="selectTipoCertificado({{ $tipoCertificado['id'] }})" class="p-2 cursor-pointer hover:bg-gray-200">
                                            {{ $tipoCertificado['name'] }}
                                        </li>

                                        @empty
                                        <li class="p-2 text-gray-500">
                                            No se encuentran coincidencias.
                                        </li>

                                        @endforelse
                                    </ul>

                                </div>
                            </div>
                        </div>


                    </div>



                </div>

                <!-- Botones -->
                <div class="mx-auto mt-12 flex gap-4">
                    <button
                        class="w-24 mt-4 px-4 py-2 border border-purple-500 text-purple-500 rounded hover:bg-purple-100 transition cursor-pointer"
                        wire:click="guardar"> {{-- FALTA IMPLEMENTAR--}}
                        Guardar
                    </button>


                    <button
                        class=" w-24 mt-4 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 transition cursor-pointer">
                        Limpiar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
