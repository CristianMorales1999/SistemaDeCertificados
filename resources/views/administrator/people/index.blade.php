{{--Usa el componente main layout--}}
<x-layouts.main :title="__('Personas de áreas')" class="bg-primary-50 ">
<div class="bg-blue-200 overflow-hidden">
    <div class="w-full mx-auto sm:p-2 md:p-4 lg:p-8 xl:p-16">
        <!-- Titulo -->
        <div class="w-full m-auto flex justify-center py-12">
            <h2 class="font-bold text-xl md:text-2xl xl:text-3xl">
                Gestión de Personas
            </h2>
        </div>

        <!-- Contenido -->
        <div class="w-full">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <div class="bg-[#bcd4fd] p-4 rounded-lg">
                    <!-- Barra de búsqueda y botones -->
                    <div class="flex items-center gap-4 mb-4">
                        <div class="mb-4 p-2">
                            <img src="/imagenes/icons/search-icon.svg" alt="Search Icon" class="w-5 h-5">
                        </div>
                        
                        <div class="relative mt-1 mb-5 flex-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                                </svg>
                            </div>
                            <input type="text"
                                   class="bg-white border shadow-md border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900 block w-full pl-10 p-1.5"
                                   placeholder="Buscar persona...">
                        </div>

                        <!-- Botón Agregar Persona -->
                        <a href="{{ route('people.index') }}" {{--people.create--}}
                           class="px-4 py-1.5 mb-4 flex items-center justify-center bg-[#9636AD] hover:bg-[#3454A1] text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                            <img src="/imagenes/icons/plus.svg" alt="Add Icon" class="w-4 h-4 mr-2">
                            <span class="text-center text-xs lg:text-sm">Agregar Persona</span>
                        </a>
                    </div>

                    <!-- Tabla -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3">Apellido</th>
                                    <th scope="col" class="px-6 py-3">Sexo</th>
                                    <th scope="col" class="px-6 py-3">Correo personal</th>
                                    <th scope="col" class="px-6 py-3">Correo institucional</th>
                                    <th scope="col" class="px-6 py-3">Área</th>
                                    <th scope="col" class="px-6 py-3">Fecha inicial</th>
                                    <th scope="col" class="px-6 py-3">Fecha final</th>
                                    <th scope="col" class="px-6 py-3">Estado inicial</th>
                                    <th scope="col" class="px-6 py-3">Estado final</th>
                                    <th scope="col" class="px-6 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personasDeAreas as $personaDeArea)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $personaDeArea->id }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->persona->nombres }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->persona->apellidos }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->persona->sexo }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->persona->correo_personal ?? 'Sin correo personal' }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->persona->correo_institucional ?? 'Sin correo institucional' }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->area->nombre ?? 'Sin área asignada' }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->fecha_inicio }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->fecha_fin ?? 'Sin fecha final' }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->estado_inicial }}</td>
                                    <td class="px-6 py-4">{{ $personaDeArea->estado_final ?? 'Sin estado final' }}</td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('people.index', $personaDeArea->id) }}" 
                                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                            Editar
                                        </a>
                                        <a href="{{ route('people.index', $personaDeArea->id) }}" 
                                           class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Paginación -->
                    <div class="flex justify-between mt-5 gap-8">
                        <button type="button"
                                class="flex items-center px-6 py-2 border border-black text-black hover:bg-gray-100">
                            <span class="mr-2">&lt;&lt;</span>
                            Anterior
                        </button>
                        <button type="button"
                                class="flex items-center px-6 py-2 border border-black text-black hover:bg-gray-100">
                            Siguiente
                            <span class="ml-2">&gt;&gt;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.main>
