<div class="bg-blue-200 w-screen h-auto overflow-hidden">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="w-full mx-auto sm:p-2 md:p-4 lg:p-8 xl:p-16">
        <!-- Titulo -->
        <div class="w-full m-auto flex justify-center py-12">
            <h2 class="font-bold text-xl md:text-2xl xl:text-3xl">
                Generación de Certificado
            </h2>
        </div>
        {{-- CONTENIDO --}}
        <div class="w-full flex flex-col lg:flex-row items-stretch justify-between space-x-20">
            <!-------------------------------- CAJA DE CERTIFICADO ------------------>
            <div class="w-full lg:w-2/3 flex items-center gap-2">
                {{-- ANTERIOR --}}
                <flux:icon.chevron-left />                
                
                    {{-- TEMPLATE --}}
                <img 
                    src="{{ $plantillaSeleccionada['imagen'] ?? '/images/certificado-ejemplo.png' }}" 
                    alt="Certificado seleccionado" 
                    class="max-w-full h-auto rounded-xl shadow-md transition duration-300 ease-in-out"
                />    
                {{-- ACTUAL --}}
                <flux:icon.chevron-right />
            </div>
    
            <!------------------------------- ENTRADAS ------------------------------->
            <div class="w-full lg:w-1/3 mx-auto min-h-max h-auto flex flex-col justify-between content-between font-normal text-sm md:text-base text-gray-700 p-4">
                <div class="w-full space-y-8">

                    {{-- ===================== FECHA Y PLANTILLA=====================  --}}
                    <div class="space-y-4">
                        {{--------------- Dropdown Fecha de emision -----------------}}
                        <div class="relative w-full">
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
                        

                        <!--------------- Dropdown Plantilla ----------------->
                        <div x-data="{ open: @entangle('showDropdownPlantilla') }" class="relative w-full">
                            <p class="block text-sm font-medium text-gray-700 mb-2">Seleccionar plantilla: </p>
                            <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer"
                                @click="open = !open">
                                <p class="w-full">{{ $plantillaSeleccionada['name'] ?? 'Seleccionar plantilla' }}</p>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        
                            <div class="relative w-full" x-show="open" @click.outside="open = false">
                                <div class="absolute inset-x-0 z-10 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                    <input type="text" 
                                            wire:model.live="searchPlantilla" 
                                           placeholder="Buscar..."
                                           class="w-full p-2 border-b border-gray-300 outline-none">
                        
                                           <ul class="max-h-60 overflow-y-auto">
                                            @php
                                                $plantillasFiltradas = collect($plantillas)->filter(function($plantilla) use ($searchPlantilla) {
                                                    return str_contains(strtolower($plantilla['name']), strtolower($searchPlantilla));
                                                });
                                            @endphp
                                        
                                            @forelse($plantillasFiltradas as $plantilla)
                                                <li wire:click="selectPlantilla({{ $plantilla['id'] }})"
                                                    class="p-2 cursor-pointer hover:bg-gray-200">
                                                    {{ $plantilla['name'] }}
                                                </li>
                                            @empty
                                                <li class="p-2 text-gray-500">No se encuentran coincidencias.</li>
                                            @endforelse
                                        </ul>
                                        
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <!-- Division de entradas -->
                    <div class="w-full border-t border-gray-300 opacity-50"></div>


                    {{-- ==================TIPO DE CERTIFICADO Y GRUPO===================== --}}

                    <div class="space-y-4">
                        <!--------------- Dropdown Seleccionar Tipo de Certificado ----------------->
                        <div x-data="{ open: @entangle('showDropdownTipoCertificado') }" class="relative w-full">
                            <p class="block text-sm font-medium text-gray-700 mb-2">Seleccionar tipo de certificado: </p>
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
                    
                                        @forelse($tiposCertificadosFiltrados as $tipoCertificado)
                                            <li wire:click="selectTipoCertificado({{ $tipoCertificado['id'] }})"
                                                class="p-2 cursor-pointer hover:bg-gray-200">
                                                {{ $tipoCertificado['name'] }}
                                            </li>
                                        @empty
                                            <li class="p-2 text-gray-500">No se encuentran coincidencias.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                        <!--------------- Dropdown Seleccionar Grupo ----------------->
                        <div x-data="{ open: @entangle('showDropdownGrupo') }" class="relative w-full">
                            
                            <p class="block text-sm font-medium text-gray-700 mb-2">Seleccionar grupo: </p>
                            <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer"
                                 @click="open = !open">
                                <p class="w-full truncate">{{ $grupoSeleccionado['name'] ?? 'Seleccionar grupo' }}</p>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <div class="relative w-full" x-show="open" @click.outside="open = false">
                                <div class="absolute inset-x-0 z-10 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                    <input type="text" wire:model.live="searchGrupo" placeholder="Buscar..."
                                           class="w-full p-2 border-b border-gray-300 outline-none">
                                    <ul class="max-h-60 overflow-y-auto">
                                        @php
                                            $gruposFiltrados = collect($this->gruposFiltrados)->filter(function ($grupo) use ($searchGrupo) {
                                                return str_contains(strtolower($grupo['name']), strtolower($searchGrupo));
                                            });
                                        @endphp
                    
                                        @forelse($gruposFiltrados as $grupo)
                                            <li wire:click="selectGrupo({{ $grupo['id'] }})"
                                                class="p-2 cursor-pointer hover:bg-gray-200">
                                                {{ $grupo['name'] }}
                                            </li>
                                        @empty
                                            <li class="p-2 text-gray-500">No hay grupos para este tipo de certificados</li>
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
