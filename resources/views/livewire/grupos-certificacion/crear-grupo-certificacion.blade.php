<div class="bg-[var(--color-primary-50)]" style="overflow-x: hidden; overflow-y: visible; position: relative;">
    <div class="w-full mx-auto sm:p-2 md:p-4 lg:p-8 xl:p-16 pb-40 md:pb-48" style="overflow: visible; padding-bottom: 200px;">
        <!-- Título -->
        <div class="w-full m-auto flex justify-center py-12">
            <h2 class="font-bold text-xl md:text-2xl xl:text-3xl">
                Crear Nuevo Grupo de Certificación
            </h2>
        </div>

        <!-- Mensajes de Error General -->
        @if ($errors->has('general'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <p class="font-semibold">Error:</p>
                <p>{{ $errors->first('general') }}</p>
            </div>
        @endif

        <!-- Mensaje de Éxito -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- CONTENIDO --}}
        <div class="w-full flex flex-col lg:flex-row items-stretch justify-between space-x-12">
            
            <!----------------------- TABLA PARA SELECCIONAR BENEFICIARIOS DE CERTIFICADOS ------------------>
            <div class="w-full lg:w-2/3 flex items-center">
                <div class="w-full">
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <div class="bg-[var(--color-primary-25)] p-4 rounded-lg">
                            <div class="flex items-center gap-4 mb-4">
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
                                    <input 
                                        wire:model.live.debounce.300ms="searchPersona"
                                        type="text"
                                        id="table-search"
                                        class="bg-white border shadow-md border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900 block w-min-60 w-full pl-10 p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Buscar por código o titular"
                                    >
                                </div>

                                {{-- CONTADOR Y ACCIONES --}}
                                <div class="flex items-center gap-4">
                                    <div class="text-sm text-gray-600">
                                        <span class="font-semibold">{{ $this->totalPersonasSeleccionadas }}</span> seleccionada(s)
                                    </div>
                                    <button 
                                        type="button"
                                        wire:click="seleccionarTodasPersonas"
                                        class="px-4 py-1.5 text-sm bg-[var(--color-accent-300)] hover:bg-[var(--color-primary-300)] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[var(--color-accent-300)] hover:border-[var(--color-primary-300)] border-2 text-white"
                                    >
                                        Seleccionar Todas
                                    </button>
                                    <button 
                                        type="button"
                                        wire:click="deseleccionarTodasPersonas"
                                        class="px-4 py-1.5 text-sm bg-white hover:bg-gray-100 text-gray-700 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-gray-300 border-2"
                                    >
                                        Deseleccionar Todas
                                    </button>
                                </div>
                            </div>

                            {{-- TABLA DE PERSONAS ELEGIBLES --}}
                            @if(!$tipoCertificacionId)
                                <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
                                    <h1 class="px-3 py-3 text-[#991C24]">
                                        Primero debe seleccionar un tipo de certificado.
                                    </h1>
                                </div>
                            @elseif($this->contextoRequerido['requiere_proyecto'] && !$proyectoId)
                                <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
                                    <h1 class="px-3 py-3 text-[#991C24]">
                                        Primero debe seleccionar un proyecto.
                                    </h1>
                                </div>
                            @elseif($this->contextoRequerido['requiere_evento'] && !$eventoId)
                                <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
                                    <h1 class="px-3 py-3 text-[#991C24]">
                                        Primero debe seleccionar un evento.
                                    </h1>
                                </div>
                            @elseif($this->contextoRequerido['requiere_anio_periodo'] && (!$anio || !$periodo))
                                <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
                                    <h1 class="px-3 py-3 text-[#991C24]">
                                        Primero debe seleccionar año y periodo.
                                    </h1>
                                </div>
                            @elseif($loading)
                                <div class="flex items-center justify-center py-12">
                                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[var(--color-primary-500)]"></div>
                                    <span class="ml-4 text-gray-600">Cargando personas elegibles...</span>
                                </div>
                            @elseif($this->personasElegibles->isEmpty())
                                <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
                                    <h1 class="px-3 py-3 text-[#991C24]">
                                        No existe personas que mostrar
                                    </h1>
                                </div>
                            @else
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input 
                                                        type="checkbox" 
                                                        wire:click="seleccionarTodasPersonas"
                                                        @if(count($personasSeleccionadas) === $this->personasElegibles->count() && $this->personasElegibles->count() > 0) checked @endif
                                                        class="w-4 h-4 text-blue-600 bg-[var(--color-primary-25)] border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                    >
                                                    <label class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">Nombre Completo</th>
                                            <th scope="col" class="px-6 py-3">Código</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($this->personasElegibles as $persona)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer" wire:click="togglePersona({{ $persona->id }})">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input 
                                                            type="checkbox" 
                                                            wire:click.stop="togglePersona({{ $persona->id }})"
                                                            @if(in_array($persona->id, $personasSeleccionadas)) checked @endif
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    {{ $persona->nombres }} {{ $persona->apellidos }}
                                                </td>
                                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                                    {{ $persona->codigo ?? 'N/A' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p class="text-sm text-gray-500 mt-2">
                                    Total de personas elegibles: <span class="font-semibold">{{ $this->personasElegibles->count() }}</span>
                                </p>
                            @endif

                            @error('personasSeleccionadas')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!------------------------------- ENTRADAS PARA CREAR GRUPO ------------------------------->
            <div class="w-full lg:w-1/3 mx-auto min-h-max h-auto flex flex-col justify-between content-between font-normal text-sm md:text-base text-gray-700" style="position: relative; z-index: 1;">
                <div class="w-full space-y-8">
                    <div class="space-y-4">
                        {{-- Input nombre --}}
                        <div class="w-full">
                            <label for="nombre" class="block mb-1 text-sm font-medium text-gray-700">Nombre del grupo</label>
                            <input
                                type="text"
                                id="nombre"
                                wire:model="nombre"
                                placeholder="Ej. Egresados 2024"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900"
                            >
                        </div>

                        {{-- Input descripción --}}
                        <div class="w-full">
                            <label for="descripcion" class="block mb-1 text-sm font-medium text-gray-700">Descripción de grupo</label>
                            <input
                                type="text"
                                id="descripcion"
                                wire:model="descripcion"
                                placeholder="Ej. Grupo que incluye miembros de Sedipro que ..."
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900 truncate"
                            >
                        </div>

                        <!--------------- Dropdown Tipo de certificado ----------------->
                        <div x-data="{ 
                                open: false,
                                adjustDropdownHeight() {
                                    if (this.open) {
                                        setTimeout(() => {
                                            const dropdown = this.$refs.dropdown;
                                            const innerDiv = this.$refs.dropdownInner;
                                            if (dropdown && innerDiv) {
                                                const rect = dropdown.getBoundingClientRect();
                                                const footerHeight = 147;
                                                const paddingBottom = 200; // Espacio adicional que agregamos al contenedor
                                                const availableHeight = window.innerHeight - rect.top - footerHeight - paddingBottom - 20;
                                                const maxHeight = Math.min(400, Math.max(200, availableHeight));
                                                innerDiv.style.maxHeight = maxHeight + 'px';
                                            }
                                        }, 10);
                                    }
                                }
                             }" 
                             x-on:close-dropdown="open = false"
                             x-on:tipo-certificado-seleccionado.window="open = false"
                             class="w-full relative" 
                             style="z-index: 100; isolation: isolate;">
                            <p class="block mb-2 text-sm font-medium text-gray-700">Tipo de Certificado <span class="text-red-500">*</span></p>
                            <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer relative"
                                @click="open = !open; adjustDropdownHeight()"
                                style="z-index: 101;">
                                <p class="w-full truncate">{{ $tipoCertificacionId ? ($this->tipoCertificacion ? $this->tipoCertificacion->nombre : 'Cargando...') : 'Seleccionar tipo de certificado' }}</p>
                                <svg class="w-4 h-4 text-gray-600 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>

                            <div x-ref="dropdown"
                                 x-show="open" 
                                 x-cloak
                                 x-transition
                                 @click.outside="open = false"
                                 style="position: absolute; top: 100%; left: 0; right: 0; z-index: 99999 !important; margin-top: 4px; isolation: isolate;">
                                <div x-ref="dropdownInner" class="bg-white border border-gray-300 rounded-lg shadow-2xl" style="overflow-y: auto; overflow-x: hidden; position: relative; z-index: 99999 !important; isolation: isolate;">
                                    <input type="text"
                                            wire:model.live="searchTipoCertificado"
                                           placeholder="Buscar..."
                                           class="w-full p-2 border-b border-gray-300 outline-none sticky top-0 bg-white z-10"
                                           @click.stop
                                           style="position: sticky; top: 0; z-index: 10; background: white;">

                                    <ul style="overflow-y: visible; overflow-x: hidden;">
                                    @php
                                        $tiposCertificadosFiltrados = collect($this->tiposCertificados)->filter(function($tipoCertificado) {
                                            $search = $searchTipoCertificado ?? '';
                                            return str_contains(strtolower($tipoCertificado->nombre), strtolower($search));
                                        });
                                    @endphp

                                    @forelse ($tiposCertificadosFiltrados as $tipoCertificado)
                                        <li onclick="
                                            const component = Livewire.find('{{ $_instance->getId() }}');
                                            if (component) {
                                                component.call('selectTipoCertificado', {{ $tipoCertificado->id }});
                                            }
                                            setTimeout(() => {
                                                const dropdown = document.querySelector('[x-on\\:close-dropdown]');
                                                if (dropdown && dropdown.__x) {
                                                    dropdown.__x.$data.open = false;
                                                }
                                            }, 50);
                                        " 
                                            class="p-2 cursor-pointer hover:bg-gray-200 transition-colors">
                                            {{ $tipoCertificado->nombre }}
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

                        @if($tipoCertificacionId && $this->tipoCertificacion)
                            <div class="p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                <p class="text-sm text-blue-800">
                                    <strong>Tipo seleccionado:</strong> {{ $this->tipoCertificacion->nombre }}
                                </p>
                                @if($this->tipoCertificacion->descripcion)
                                    <p class="text-sm text-blue-700 mt-1">{{ $this->tipoCertificacion->descripcion }}</p>
                                @endif
                            </div>
                        @endif

                        {{-- CONTEXTO DINÁMICO (solo si se requiere) --}}
                        @if($tipoCertificacionId && ($this->contextoRequerido['requiere_proyecto'] || $this->contextoRequerido['requiere_evento'] || $this->contextoRequerido['requiere_anio_periodo']))
                            <div class="space-y-4 border-t border-gray-200 pt-4">
                                <h3 class="font-semibold text-lg text-gray-800">Contexto</h3>
                                
                                @if($this->contextoRequerido['requiere_proyecto'])
                                    <div class="w-full">
                                        <label class="block mb-2 text-sm font-medium text-gray-700">Proyecto <span class="text-red-500">*</span></label>
                                        <select 
                                            wire:model.live="proyectoId"
                                            class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900"
                                        >
                                            <option value="">Seleccione un proyecto</option>
                                            @foreach($this->proyectosDisponibles as $proyecto)
                                                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('proyectoId')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif

                                @if($this->contextoRequerido['requiere_evento'])
                                    <div class="w-full">
                                        <label class="block mb-2 text-sm font-medium text-gray-700">Evento <span class="text-red-500">*</span></label>
                                        <select 
                                            wire:model.live="eventoId"
                                            class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900"
                                            @if($this->contextoRequerido['evento_depende_proyecto'] && !$proyectoId) disabled @endif
                                        >
                                            <option value="">Seleccione un evento</option>
                                            @foreach($this->eventosDisponibles as $evento)
                                                <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @if($this->contextoRequerido['evento_depende_proyecto'] && !$proyectoId)
                                            <p class="mt-1 text-xs text-gray-500">Primero debe seleccionar un proyecto</p>
                                        @endif
                                        @error('eventoId')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif

                                @if($this->contextoRequerido['requiere_anio_periodo'])
                                    <div class="w-full grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Año <span class="text-red-500">*</span></label>
                                            <select 
                                                wire:model.live="anio"
                                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900"
                                            >
                                                <option value="">Seleccione año</option>
                                                @foreach($this->aniosPeriodosDisponibles->pluck('anio')->unique()->sortDesc() as $anioOption)
                                                    <option value="{{ $anioOption }}">{{ $anioOption }}</option>
                                                @endforeach
                                            </select>
                                            @error('anio')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Periodo <span class="text-red-500">*</span></label>
                                            <select 
                                                wire:model.live="periodo"
                                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-900"
                                                @if(!$anio) disabled @endif
                                            >
                                                <option value="">Seleccione periodo</option>
                                                @if($anio)
                                                    @foreach($this->aniosPeriodosDisponibles->where('anio', $anio)->pluck('periodo')->unique() as $periodoOption)
                                                        <option value="{{ $periodoOption }}">{{ $periodoOption }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if(!$anio)
                                                <p class="mt-1 text-xs text-gray-500">Primero debe seleccionar un año</p>
                                            @endif
                                            @error('periodo')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <!-- Botones -->
                <div class="mx-auto mt-12 flex gap-4">
                    <button
                        class="w-24 mt-4 px-4 py-2 border border-purple-500 text-purple-500 rounded hover:bg-purple-100 transition cursor-pointer"
                        wire:click="crearGrupo"
                        wire:loading.attr="disabled"
                        wire:target="crearGrupo"
                    >
                        <span wire:loading.remove wire:target="crearGrupo">Guardar</span>
                        <span wire:loading wire:target="crearGrupo">Guardando...</span>
                    </button>

                    <button
                        class="w-24 mt-4 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 transition cursor-pointer"
                        wire:click="limpiar">
                        Limpiar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
