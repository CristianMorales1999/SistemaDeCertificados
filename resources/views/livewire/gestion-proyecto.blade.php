<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg">
                <!-- Header del Proyecto -->
                <div class="bg-white shadow mb-6">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{ $proyecto->nombre }}
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    Gestión de personas y certificados del proyecto
                                </p>
                            </div>
                        </div>

                        @if (session()->has('success'))
                            <div class="mt-4 bg-green-50 border border-green-200 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">
                                            {{ session('success') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="mt-4 bg-red-50 border border-red-200 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">
                                            {{ session('error') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Tabs -->
                <div class="bg-white shadow">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8 px-4">
                            <button wire:click="$set('tabActive', 'personas')"
                                    class="@if($tabActive === 'personas') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                                Gestión de Personas
                            </button>
                            <button wire:click="$set('tabActive', 'certificados')"
                                    class="@if($tabActive === 'certificados') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                                Generar Certificados
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Contenido de Gestión de Personas -->
                @if($tabActive === 'personas')
                    <div class="bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <!-- Agregar Personas -->
                            <div class="mb-8">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Agregar Personas al Proyecto</h4>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <!-- Búsqueda -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Buscar Persona</label>
                                        <input type="text"
                                               wire:model.debounce.300ms="busquedaPersona"
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                               placeholder="Nombre o apellido...">
                                    </div>

                                    <!-- Rol -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Rol en el Proyecto</label>
                                        <select wire:model="rolSeleccionado"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="Miembro">Miembro</option>
                                            <option value="Staff de apoyo">Staff de apoyo</option>
                                        </select>
                                    </div>

                                    <!-- Botón Asociar -->
                                    <div class="flex items-end">
                                        <button wire:click="asociarPersonasSeleccionadas"
                                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                            Asociar Seleccionadas
                                        </button>
                                    </div>
                                </div>

                                <!-- Lista de personas disponibles -->
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <div class="bg-gray-50 px-4 py-2">
                                        <h5 class="text-sm font-medium text-gray-700">Personas Disponibles</h5>
                                    </div>
                                    <div class="max-h-60 overflow-y-auto">
                                        @forelse($personasDisponibles as $areaPerson)
                                            <div class="px-4 py-2 border-b border-gray-100 flex items-center justify-between hover:bg-gray-50">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">
                                                        {{ $areaPerson->persona->nombres }} {{ $areaPerson->persona->apellidos }}
                                                    </p>
                                                </div>
                                                <button wire:click="agregarPersona({{ $areaPerson->id }})"
                                                        class="bg-green-500 hover:bg-green-600 text-white text-xs px-2 py-1 rounded">
                                                    Seleccionar
                                                </button>
                                            </div>
                                        @empty
                                            <div class="px-4 py-8 text-center text-gray-500">
                                                No hay personas disponibles
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <!-- Personas seleccionadas -->
                                @if(!empty($personasSeleccionadas))
                                    <div class="mt-4 border border-green-200 rounded-lg overflow-hidden bg-green-50">
                                        <div class="px-4 py-2 bg-green-100">
                                            <h5 class="text-sm font-medium text-green-700">Personas Seleccionadas ({{ count($personasSeleccionadas) }})</h5>
                                        </div>
                                        <div class="px-4 py-2">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($personasSeleccionadas as $index => $areaPersonaId)
                                                    @php
                                                        $areaPerson = $personasDisponibles->where('id', $areaPersonaId)->first();
                                                    @endphp
                                                    @if($areaPerson)
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            {{ $areaPerson->persona->nombres }} {{ $areaPerson->persona->apellidos }}
                                                            <button wire:click="quitarPersonaSeleccionada({{ $index }})" class="ml-1 text-green-600 hover:text-green-500">
                                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Personas en el Proyecto -->
                            <div>
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Personas en el Proyecto ({{ $proyecto->areaPersonas->count() }})</h4>

                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    @forelse($proyecto->areaPersonas as $areaPerson)
                                        <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between hover:bg-gray-50">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $areaPerson->persona->nombres }} {{ $areaPerson->persona->apellidos }}
                                                </p>
                                                <p class="text-xs text-gray-500">
                                                    Rol: {{ $areaPerson->pivot->rol }}
                                                </p>
                                            </div>
                                            <button wire:click="quitarPersonaDelProyecto({{ $areaPerson->id }})"
                                                    onclick="return confirm('¿Está seguro de quitar esta persona del proyecto?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white text-xs px-2 py-1 rounded">
                                                Quitar
                                            </button>
                                        </div>
                                    @empty
                                        <div class="px-4 py-8 text-center text-gray-500">
                                            No hay personas asociadas al proyecto
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Contenido de Generar Certificados -->
                @if($tabActive === 'certificados')
                    <div class="bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Generar Certificados Masivos</h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Grupo de Certificación</label>
                                    <select wire:model="grupoSeleccionado"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Seleccionar grupo...</option>
                                        @foreach($gruposCertificacion as $grupo)
                                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-end">
                                    <button wire:click="generarCertificadosMasivos"
                                            onclick="return confirm('¿Está seguro de generar certificados para todas las personas del proyecto?')"
                                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Generar Certificados
                                    </button>
                                </div>
                            </div>

                            <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-yellow-800">
                                            Información importante
                                        </h3>
                                        <div class="mt-2 text-sm text-yellow-700">
                                            <p>Se generarán certificados para todas las {{ $proyecto->areaPersonas->count() }} personas asociadas al proyecto. Los certificados duplicados no se crearán.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('refreshPage', () => {
                location.reload();
            });
        });
    </script>
</div>
