<div class="bg-[var(--color-primary-50)] w-screen h-auto overflow-hidden">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="w-full mx-auto sm:p-2 md:p-4 lg:p-8 xl:p-16">
        <!-- Titulo -->
        <div class="w-full m-auto flex justify-center py-12">
            <h2 class="font-bold text-xl md:text-2xl xl:text-3xl">
                Generación de Certificado
            </h2>
        </div>
        {{-- CONTENIDO --}}
        <div class="w-full flex flex-col md:flex-row  justify-between md:space-x-20">
            <!-------------------------------- CAJA DE CERTIFICADO ------------------>
            <div class="w-full flex md:w-2/3 flex-col items-center gap-4">
                {{-- CONTROLES DE NAVEGACIÓN --}}
                <div class="flex items-center gap-2 w-full justify-center">
                    <flux:icon.chevron-left class="text-gray-400" />
                    <span class="text-sm text-gray-600 px-3 py-1 bg-gray-100 rounded-full">
                        {{ $plantillaSeleccionada['name'] ?? 'Plantilla por defecto' }}
                    </span>
                    <flux:icon.chevron-right class="text-gray-400" />
                </div>

                {{-- PREVIEW DEL CERTIFICADO --}}
                <div
                    class="relative w-full max-w-2xl bg-white rounded-xl shadow-lg border-2 border-gray-200 overflow-hidden">
                    {{-- PLANTILLA BASE --}}
                    <img src="{{ isset($plantillaSeleccionada['imagen']) ? asset('storage/' . $plantillaSeleccionada['imagen']) : '/images/certificado-ejemplo.png' }}"
                        alt="Certificado seleccionado" class="w-full h-auto rounded-xl" />

                    {{-- OVERLAY PARA ELEMENTOS PERSONALIZADOS Y TEXTOS EDITABLES --}}
                    @if ($grupoSeleccionado && $plantillaSeleccionada)
                        <div class="absolute inset-0">

                            {{-- ESTRUCTURA DEL CERTIFICADO SEGÚN DISEÑO DE REFERENCIA --}}
                            <div class="absolute inset-0" style="aspect-ratio: 297/210;"> <!-- Mantener proporción A4 landscape -->

                                {{-- 1. LOGOS SUPERIORES (máximo 2, centrados si es solo 1) --}}
                                @if (!empty($logosSeleccionados))
                                    <div class="absolute top-4 left-1/2 transform -translate-x-1/2 flex gap-8 justify-center"
                                         style="width: 80%;">
                                        @if (count($logosSeleccionados) == 1)
                                            {{-- Solo 1 logo: centrado --}}
                                            <div class="flex justify-center">
                                                <img src="{{ asset('storage/' . $logosSeleccionados[0]['ruta']) }}"
                                                    alt="{{ $logosSeleccionados[0]['name'] }}"
                                                    class="h-16 object-contain">
                                            </div>
                                        @else
                                            {{-- 2 logos: distribuidos --}}
                                            @foreach ($logosSeleccionados as $index => $logo)
                                                <img src="{{ asset('storage/' . $logo['ruta']) }}"
                                                    alt="{{ $logo['name'] }}"
                                                    class="h-16 object-contain {{ $index == 0 ? 'mr-auto' : 'ml-auto' }}">
                                            @endforeach
                                        @endif
                                    </div>
                                @endif

                                {{-- 2. TÍTULO PRINCIPAL "CERTIFICADO" --}}
                                <div class="absolute left-1/2 transform -translate-x-1/2 w-full px-8"
                                     style="top: 20%;">
                                    <div class="relative cursor-pointer hover:bg-blue-50/30 p-3 rounded transition-all
                                           {{ $textoSeleccionado === 'titulo' ? 'ring-2 ring-blue-500 bg-blue-50/50' : '' }}"
                                        wire:click="seleccionarTexto('titulo')">
                                        {{-- Toolbar flotante --}}
                                        @if ($textoSeleccionado === 'titulo')
                                            <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 bg-white shadow-lg border rounded-lg p-2 z-20 flex items-center gap-2 text-xs">
                                                <select wire:change="actualizarEstiloTexto('font_family', $event.target.value)" class="text-xs border rounded px-1">
                                                    <option value="Times New Roman" {{ $estilosTextos['titulo']['font_family'] === 'Times New Roman' ? 'selected' : '' }}>Times</option>
                                                    <option value="Arial" {{ $estilosTextos['titulo']['font_family'] === 'Arial' ? 'selected' : '' }}>Arial</option>
                                                    <option value="Georgia" {{ $estilosTextos['titulo']['font_family'] === 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                </select>
                                                <input type="range" min="24" max="48" wire:model.live="estilosTextos.titulo.font_size" wire:change="actualizarEstiloTexto('font_size', $event.target.value)" class="w-16">
                                                <span class="text-xs">{{ $estilosTextos['titulo']['font_size'] }}px</span>
                                                <input type="color" wire:model.live="estilosTextos.titulo.color" wire:change="actualizarEstiloTexto('color', $event.target.value)" class="w-8 h-6 rounded">
                                                <button type="button" wire:click.stop="deseleccionarTexto()" class="text-red-500 hover:bg-red-50 px-2 py-1 rounded border border-red-300 hover:border-red-500 transition-colors text-xs font-bold ml-2">✕ Cerrar</button>
                                            </div>
                                        @endif
                                        <h1 style="font-family: {{ $estilosTextos['titulo']['font_family'] ?? 'Times New Roman' }};
                                               font-size: {{ $estilosTextos['titulo']['font_size'] ?? '36' }}px;
                                               font-weight: {{ $estilosTextos['titulo']['font_weight'] ?? 'bold' }};
                                               color: {{ $estilosTextos['titulo']['color'] ?? '#000000' }};
                                               text-align: {{ $estilosTextos['titulo']['text_align'] ?? 'center' }};"
                                            class="drop-shadow-sm font-bold">
                                            {{ $tituloCertificado ?? 'CERTIFICADO' }}
                                        </h1>
                                    </div>
                                </div>

                                {{-- 3. SUBTÍTULO Tipo de certificado --}}
                                <div class="absolute left-1/2 transform -translate-x-1/2 w-full px-8"
                                     style="top: 28%;">
                                    <div class="relative cursor-pointer hover:bg-blue-50/30 p-2 rounded transition-all
                                           {{ $textoSeleccionado === 'subtitulo' ? 'ring-2 ring-blue-500 bg-blue-50/50' : '' }}"
                                        wire:click="seleccionarTexto('subtitulo')">
                                        {{-- Toolbar flotante --}}
                                        @if ($textoSeleccionado === 'subtitulo')
                                            <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 bg-white shadow-lg border rounded-lg p-2 z-20 flex items-center gap-2 text-xs">
                                                <select wire:change="actualizarEstiloTexto('font_family', $event.target.value)" class="text-xs border rounded px-1">
                                                    <option value="Times New Roman" {{ $estilosTextos['subtitulo']['font_family'] === 'Times New Roman' ? 'selected' : '' }}>Times</option>
                                                    <option value="Arial" {{ $estilosTextos['subtitulo']['font_family'] === 'Arial' ? 'selected' : '' }}>Arial</option>
                                                    <option value="Georgia" {{ $estilosTextos['subtitulo']['font_family'] === 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                </select>
                                                <input type="range" min="16" max="32" wire:model.live="estilosTextos.subtitulo.font_size" wire:change="actualizarEstiloTexto('font_size', $event.target.value)" class="w-16">
                                                <span class="text-xs">{{ $estilosTextos['subtitulo']['font_size'] }}px</span>
                                                <input type="color" wire:model.live="estilosTextos.subtitulo.color" wire:change="actualizarEstiloTexto('color', $event.target.value)" class="w-8 h-6 rounded">
                                                <button type="button" wire:click.stop="deseleccionarTexto()" class="text-red-500 hover:bg-red-50 px-2 py-1 rounded border border-red-300 hover:border-red-500 transition-colors text-xs font-bold ml-2">✕ Cerrar</button>
                                            </div>
                                        @endif
                                        <h2 style="font-family: {{ $estilosTextos['subtitulo']['font_family'] ?? 'Times New Roman' }};
                                               font-size: {{ $estilosTextos['subtitulo']['font_size'] ?? '24' }}px;
                                               font-weight: {{ $estilosTextos['subtitulo']['font_weight'] ?? 'semibold' }};
                                               color: {{ $estilosTextos['subtitulo']['color'] ?? '#D97706' }};
                                               text-align: {{ $estilosTextos['subtitulo']['text_align'] ?? 'center' }};"
                                            class="drop-shadow-sm font-semibold">
                                            {{ str_replace('Certificado', '', $tipoCertificadoSeleccionado['name'] ?? 'TIPO DE CERTIFICADO') }}
                                        </h2>
                                    </div>
                                </div>

                                {{-- 4. "Otorgado a:" --}}
                                <div class="absolute left-1/2 transform -translate-x-1/2 w-full px-8"
                                     style="top: 36%;">
                                    <p class="text-center text-black font-medium"
                                       style="font-size: 16px; font-family: Times, serif;">
                                        Otorgado a:
                                    </p>
                                </div>

                                {{-- 5. NOMBRE DE LA PERSONA --}}
                                <div class="absolute left-1/2 transform -translate-x-1/2 w-full px-8"
                                     style="top: 42%;">
                                    <div class="relative cursor-pointer hover:bg-blue-50/30 p-2 rounded transition-all
                                           {{ $textoSeleccionado === 'nombre' ? 'ring-2 ring-blue-500 bg-blue-50/50' : '' }}"
                                        wire:click="seleccionarTexto('nombre')">
                                        {{-- Toolbar flotante --}}
                                        @if ($textoSeleccionado === 'nombre')
                                            <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 bg-white shadow-lg border rounded-lg p-2 z-20 flex items-center gap-2 text-xs">
                                                <select wire:change="actualizarEstiloTexto('font_family', $event.target.value)" class="text-xs border rounded px-1">
                                                    <option value="Times New Roman" {{ $estilosTextos['nombre']['font_family'] === 'Times New Roman' ? 'selected' : '' }}>Times</option>
                                                    <option value="Arial" {{ $estilosTextos['nombre']['font_family'] === 'Arial' ? 'selected' : '' }}>Arial</option>
                                                    <option value="Georgia" {{ $estilosTextos['nombre']['font_family'] === 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                </select>
                                                <input type="range" min="20" max="40" wire:model.live="estilosTextos.nombre.font_size" wire:change="actualizarEstiloTexto('font_size', $event.target.value)" class="w-16">
                                                <span class="text-xs">{{ $estilosTextos['nombre']['font_size'] }}px</span>
                                                <input type="color" wire:model.live="estilosTextos.nombre.color" wire:change="actualizarEstiloTexto('color', $event.target.value)" class="w-8 h-6 rounded">
                                                <button type="button" wire:click.stop="deseleccionarTexto()" class="text-red-500 hover:bg-red-50 px-2 py-1 rounded border border-red-300 hover:border-red-500 transition-colors text-xs font-bold ml-2">✕ Cerrar</button>
                                            </div>
                                        @endif
                                        <h3 style="font-family: {{ $estilosTextos['nombre']['font_family'] ?? 'Times New Roman' }};
                                               font-size: {{ $estilosTextos['nombre']['font_size'] ?? '28' }}px;
                                               font-weight: {{ $estilosTextos['nombre']['font_weight'] ?? 'bold' }};
                                               color: {{ $estilosTextos['nombre']['color'] ?? '#000000' }};
                                               text-align: {{ $estilosTextos['nombre']['text_align'] ?? 'center' }};"
                                            class="drop-shadow-sm border-b-2 border-black  font-bold">
                                            {{ $personaSeleccionada->nombres ?? 'NOMBRE DE LA PERSONA' }}
                                            {{ $personaSeleccionada->apellidos ?? '' }}
                                        </h3>
                                    </div>
                                </div>

                                {{-- 6. DESCRIPCIÓN DEL RECONOCIMIENTO --}}
                                <div class="absolute left-1/2 transform -translate-x-1/2 w-full px-12"
                                     style="top: 52%;">
                                    <div class="relative cursor-pointer hover:bg-blue-50/30 p-4 rounded transition-all
                                           {{ $textoSeleccionado === 'descripcion' ? 'ring-2 ring-blue-500 bg-blue-50/50' : '' }}"
                                        wire:click="seleccionarTexto('descripcion')">
                                        @if ($textoSeleccionado === 'descripcion')
                                            <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 bg-white shadow-lg border rounded-lg p-2 z-20 flex items-center gap-2 text-xs">
                                                <select wire:change="actualizarEstiloTexto('font_family', $event.target.value)" class="text-xs border rounded px-1">
                                                    <option value="Times New Roman" {{ $estilosTextos['descripcion']['font_family'] === 'Times New Roman' ? 'selected' : '' }}>Times</option>
                                                    <option value="Arial" {{ $estilosTextos['descripcion']['font_family'] === 'Arial' ? 'selected' : '' }}>Arial</option>
                                                    <option value="Georgia" {{ $estilosTextos['descripcion']['font_family'] === 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                </select>
                                                <input type="range" min="12" max="18" wire:model.live="estilosTextos.descripcion.font_size" wire:change="actualizarEstiloTexto('font_size', $event.target.value)" class="w-16">
                                                <span class="text-xs">{{ $estilosTextos['descripcion']['font_size'] }}px</span>
                                                <input type="color" wire:model.live="estilosTextos.descripcion.color" wire:change="actualizarEstiloTexto('color', $event.target.value)" class="w-8 h-6 rounded">
                                                <button type="button" wire:click.stop="deseleccionarTexto()" class="text-red-500 hover:bg-red-50 px-2 py-1 rounded border border-red-300 hover:border-red-500 transition-colors text-xs font-bold ml-2">✕ Cerrar</button>
                                            </div>
                                        @endif
                                        <div style="font-family: {{ $estilosTextos['descripcion']['font_family'] ?? 'Times New Roman' }};
                                               font-size: {{ $estilosTextos['descripcion']['font_size'] ?? '14' }}px;
                                               font-weight: {{ $estilosTextos['descripcion']['font_weight'] ?? 'normal' }};
                                               color: {{ $estilosTextos['descripcion']['color'] ?? '#000000' }};
                                               text-align: {{ $estilosTextos['descripcion']['text_align'] ?? 'center' }};
                                               line-height: 1.4;">
                                            @if(!empty($textoDescripcion))
                                                {!! nl2br(e($textoDescripcion)) !!}
                                            @else
                                                <p class="mb-2">Por su destacada participación como <strong>{{ $personaSeleccionada->cargos ?? 'CARGO' }}</strong> del área de <strong>{{ $personaSeleccionada->area ?? 'ÁREA' }}</strong> del proyecto</p>
                                                <p class="mb-2"><strong>"{{ $eventoSeleccionado->nombre ?? 'NOMBRE DEL PROYECTO' }}"</strong> organizado por la Sección Estudiantil de Dirección de</p>
                                                <p>Proyectos de la Universidad Nacional de Trujillo</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- 7. FECHA Y LUGAR --}}
                                <div class="absolute right-12 w-auto"
                                     style="top: 68%;">
                                    <div class="relative cursor-pointer hover:bg-blue-50/30 p-3 rounded transition-all
                                           {{ $textoSeleccionado === 'ubicacion' ? 'ring-2 ring-blue-500 bg-blue-50/50' : '' }}"
                                        wire:click="seleccionarTexto('ubicacion')">
                                        {{-- Toolbar flotante --}}
                                        @if ($textoSeleccionado === 'ubicacion')
                                            <div class="absolute -top-16 left-1/2 transform -translate-x-1/2 bg-white shadow-lg border rounded-lg p-2 z-10 flex items-center gap-2 text-xs">
                                                <select wire:change="actualizarEstiloTexto('font_family', $event.target.value)" class="text-xs border rounded px-1">
                                                    <option value="Times New Roman" {{ ($estilosTextos['ubicacion']['font_family'] ?? 'Times New Roman') === 'Times New Roman' ? 'selected' : '' }}>Times</option>
                                                    <option value="Arial" {{ ($estilosTextos['ubicacion']['font_family'] ?? 'Times New Roman') === 'Arial' ? 'selected' : '' }}>Arial</option>
                                                    <option value="Georgia" {{ ($estilosTextos['ubicacion']['font_family'] ?? 'Times New Roman') === 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                </select>
                                                <input type="range" min="10" max="16" wire:model.live="estilosTextos.ubicacion.font_size" wire:change="actualizarEstiloTexto('font_size', $event.target.value)" class="w-16">
                                                <span class="text-xs">{{ $estilosTextos['ubicacion']['font_size'] ?? '12' }}px</span>
                                                <input type="color" wire:model.live="estilosTextos.ubicacion.color" wire:change="actualizarEstiloTexto('color', $event.target.value)" class="w-8 h-6 rounded">
                                                <button type="button" wire:click.stop="deseleccionarTexto()" class="text-red-500 hover:bg-red-50 px-2 py-1 rounded border border-red-300 hover:border-red-500 transition-colors text-xs font-bold ml-2">✕ Cerrar</button>
                                            </div>
                                        @endif
                                        <p style="font-family: {{ $estilosTextos['ubicacion']['font_family'] ?? 'Times New Roman' }};
                                               font-size: {{ $estilosTextos['ubicacion']['font_size'] ?? '12' }}px;
                                               font-weight: {{ $estilosTextos['ubicacion']['font_weight'] ?? 'normal' }};
                                               color: {{ $estilosTextos['ubicacion']['color'] ?? '#000000' }};
                                               text-align: right;">
                                            @if(!empty($textoLugar))
                                                {{ $textoLugar }}, {{ $eventoSeleccionado->fecha_inicio ? \Carbon\Carbon::parse($eventoSeleccionado->fecha_inicio)->format('d') : '01' }} de {{ $eventoSeleccionado->fecha_inicio ? \Carbon\Carbon::parse($eventoSeleccionado->fecha_inicio)->locale('es')->monthName : 'marzo' }}, {{ $eventoSeleccionado->fecha_inicio ? \Carbon\Carbon::parse($eventoSeleccionado->fecha_inicio)->format('Y') : '2025' }}
                                            @else
                                                {{ $eventoSeleccionado->lugar ?? 'Trujillo' }}, {{ $eventoSeleccionado->fecha_inicio ? \Carbon\Carbon::parse($eventoSeleccionado->fecha_inicio)->format('d') : '01' }} de {{ $eventoSeleccionado->fecha_inicio ? \Carbon\Carbon::parse($eventoSeleccionado->fecha_inicio)->locale('es')->monthName : 'marzo' }}, {{ $eventoSeleccionado->fecha_inicio ? \Carbon\Carbon::parse($eventoSeleccionado->fecha_inicio)->format('Y') : '2025' }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                {{-- 8. CÓDIGO QR (esquina inferior izquierda) --}}
                                <div class="absolute left-6"
                                     style="top: 76%;">
                                    <div class="bg-white p-2 rounded border-2 border-gray-400 shadow-sm">
                                        <div class="w-16 h-16 bg-gray-200 border-2 border-dashed border-gray-500 flex items-center justify-center text-xs text-gray-700 font-bold">
                                            QR
                                        </div>
                                        <p class="text-xs text-center mt-1 text-black font-medium w-16">QR siempre en esta ubicación<br>(parte inferior izquierda)</p>
                                    </div>
                                </div>

                                {{-- 9. FIRMAS (parte inferior, centradas si es solo 1) --}}
                                @if (!empty($firmasSeleccionadas))
                                    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex justify-center gap-8"
                                         style="width: 90%;">
                                        @if (count($firmasSeleccionadas) == 1)
                                            {{-- Solo 1 firma: centrada --}}
                                            <div class="text-center">
                                                <div class="relative">
                                                    <img src="{{ asset('storage/' . $firmasSeleccionadas[0]['ruta']) }}"
                                                        alt="{{ $firmasSeleccionadas[0]['name'] }}"
                                                        class="w-24 h-16 object-contain bg-white rounded border border-gray-300 shadow-sm mb-2">

                                                    {{-- Sello superpuesto si es la presidenta y hay sello seleccionado --}}
                                                    @if ($selloSeleccionado && stripos($firmasSeleccionadas[0]['name'], 'president') !== false)
                                                        <img src="{{ asset('storage/' . $selloSeleccionado['ruta']) }}"
                                                            alt="{{ $selloSeleccionado['name'] }}"
                                                            class="absolute -top-2 -right-2 w-12 h-12 object-contain opacity-80">
                                                    @endif
                                                </div>
                                                <div class="border-t-2 border-black pt-1">
                                                    <p class="text-xs font-bold text-black">{{ $firmasSeleccionadas[0]['name'] }}</p>
                                                    <p class="text-xs text-black">{{ $firmasSeleccionadas[0]['cargo'] ?? 'Cargo' }}</p>
                                                    <p class="text-xs text-black">{{ $firmasSeleccionadas[0]['entidad'] ?? 'SEDIPRO UNT' }}</p>
                                                </div>
                                            </div>
                                        @elseif (count($firmasSeleccionadas) == 2)
                                            {{-- 2 firmas: distribuidas --}}
                                            @foreach ($firmasSeleccionadas as $index => $firma)
                                                <div class="text-center {{ $index == 0 ? 'mr-auto' : 'ml-auto' }}">
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/' . $firma['ruta']) }}"
                                                            alt="{{ $firma['name'] }}"
                                                            class="w-24 h-16 object-contain bg-white rounded border border-gray-300 shadow-sm mb-2">

                                                        {{-- Sello superpuesto si es la presidenta --}}
                                                        @if ($selloSeleccionado && stripos($firma['name'], 'president') !== false)
                                                            <img src="{{ asset('storage/' . $selloSeleccionado['ruta']) }}"
                                                                alt="{{ $selloSeleccionado['name'] }}"
                                                                class="absolute -top-2 -right-2 w-12 h-12 object-contain opacity-80">
                                                        @endif
                                                    </div>
                                                    <div class="border-t-2 border-black pt-1">
                                                        <p class="text-xs font-bold text-black">{{ $firma['name'] }}</p>
                                                        <p class="text-xs text-black">{{ $firma['cargo'] ?? 'Cargo' }}</p>
                                                        <p class="text-xs text-black">{{ $firma['entidad'] ?? 'SEDIPRO UNT' }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            {{-- 3 firmas: distribuidas --}}
                                            @foreach ($firmasSeleccionadas as $index => $firma)
                                                <div class="text-center">
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/' . $firma['ruta']) }}"
                                                            alt="{{ $firma['name'] }}"
                                                            class="w-20 h-14 object-contain bg-white rounded border border-gray-300 shadow-sm mb-2">

                                                        {{-- Sello superpuesto si es la presidenta --}}
                                                        @if ($selloSeleccionado && stripos($firma['name'], 'president') !== false)
                                                            <img src="{{ asset('storage/' . $selloSeleccionado['ruta']) }}"
                                                                alt="{{ $selloSeleccionado['name'] }}"
                                                                class="absolute -top-1 -right-1 w-10 h-10 object-contain opacity-80">
                                                        @endif
                                                    </div>
                                                    <div class="border-t-2 border-black pt-1">
                                                        <p class="text-xs font-bold text-black">{{ $firma['name'] }}</p>
                                                        <p class="text-xs text-black">{{ $firma['cargo'] ?? 'Cargo' }}</p>
                                                        <p class="text-xs text-black">{{ $firma['entidad'] ?? 'SEDIPRO UNT' }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif

                                {{-- Indicador de configuración activa --}}
                                <div class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full shadow">
                                    ✓ Configurado según diseño de referencia
                                </div>
                            </div>

                        </div>
                    @endif
                </div>

                {{-- LEYENDA DEL PREVIEW --}}
                @if (
                    $grupoSeleccionado &&
                        $plantillaSeleccionada &&
                        (!empty($logosSeleccionados) || !empty($firmasSeleccionadas) || $selloSeleccionado))
                    <div class="w-full max-w-2xl bg-gray-50 p-3 rounded-lg text-xs text-gray-600">
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            @if (!empty($logosSeleccionados))
                                <div class="flex items-center gap-1">
                                    <div class="w-3 h-3 bg-blue-100 border border-blue-300 rounded-full"></div>
                                    <span>Logos ({{ count($logosSeleccionados) }})</span>
                                </div>
                            @endif
                            @if (!empty($firmasSeleccionadas))
                                <div class="flex items-center gap-1">
                                    <div class="w-3 h-3 bg-green-100 border border-green-300 rounded"></div>
                                    <span>Firmas ({{ count($firmasSeleccionadas) }})</span>
                                </div>
                            @endif
                            @if ($selloSeleccionado)
                                <div class="flex items-center gap-1">
                                    <div class="w-3 h-3 bg-purple-100 border border-purple-300 rounded-full"></div>
                                    <span>Sello</span>
                                </div>
                            @endif
                            <div class="flex items-center gap-1">
                                <div class="w-3 h-3 bg-yellow-100 border border-yellow-300 rounded"></div>
                                <span>Código QR</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!------------------------------- ENTRADAS ------------------------------->
            <div
                class="mx-auto grow min-h-max h-auto flex flex-col justify-between content-between font-normal text-sm md:text-base text-gray-700 p-4">
                <div class="w-full space-y-6">

                    {{-- ===================== CONFIGURACIÓN BÁSICA =====================  --}}
                    <div class="space-y-4">
                        {{-- ------------- Fecha de emisión (simplificada) ------------- --}}
                        <div class="relative w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Fecha de emisión</label>
                            <input type="date" wire:model="fechaEmision"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>

                        <!--------------- Tipo de Certificado ----------------->
                        <div x-data="{ open: @entangle('showDropdownTipoCertificado') }" class="relative w-full">
                            <p class="block text-sm font-medium text-gray-700 mb-2">Tipo de certificado</p>
                            <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:border-purple-300 transition-colors"
                                @click="open = !open">
                                <p class="w-full truncate">
                                    {{ $tipoCertificadoSeleccionado['name'] ?? 'Selecciona un tipo' }}</p>
                                <svg class="w-4 h-4 text-gray-600 transform transition-transform"
                                    :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <div class="relative w-full" x-show="open" @click.outside="open = false" x-transition>
                                <div
                                    class="absolute inset-x-0 z-20 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                    <input type="text" wire:model.live="searchTipoCertificado"
                                        placeholder="Buscar tipo..."
                                        class="w-full p-2 border-b border-gray-300 outline-none focus:border-purple-500">
                                    <ul class="max-h-60 overflow-y-auto">
                                        @php
                                            $tiposCertificadosFiltrados = collect($tiposCertificados)->filter(function (
                                                $tipoCertificado,
                                            ) use ($searchTipoCertificado) {
                                                return str_contains(
                                                    strtolower($tipoCertificado['name']),
                                                    strtolower($searchTipoCertificado),
                                                );
                                            });
                                        @endphp

                                        @forelse($tiposCertificadosFiltrados as $tipoCertificado)
                                            <li wire:click="selectTipoCertificado({{ $tipoCertificado['id'] }})"
                                                class="p-2 cursor-pointer hover:bg-purple-50 transition-colors">
                                                {{ $tipoCertificado['name'] }}
                                            </li>
                                        @empty
                                            <li class="p-2 text-gray-500">No se encuentran tipos de certificado.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--------------- Grupo (con opción de crear nuevo) ----------------->
                        @if ($tipoCertificadoSeleccionado)
                            <div x-data="{ open: @entangle('showDropdownGrupo') }" class="relative w-full">
                                <p class="block text-sm font-medium text-gray-700 mb-2">Grupo de certificación</p>
                                <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:border-purple-300 transition-colors"
                                    @click="open = !open">
                                    <p class="w-full truncate">
                                        {{ $grupoSeleccionado['name'] ?? 'Selecciona o crea un grupo' }}</p>
                                    <svg class="w-4 h-4 text-gray-600 transform transition-transform"
                                        :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                <div class="relative w-full" x-show="open" @click.outside="open = false"
                                    x-transition>
                                    <div
                                        class="absolute inset-x-0 z-20 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                        <input type="text" wire:model.live="searchGrupo"
                                            placeholder="Buscar grupo..."
                                            class="w-full p-2 border-b border-gray-300 outline-none focus:border-purple-500">
                                        <ul class="max-h-60 overflow-y-auto">
                                            @php
                                                $gruposFiltrados = collect($this->gruposFiltrados)->filter(function (
                                                    $grupo,
                                                ) use ($searchGrupo) {
                                                    return str_contains(
                                                        strtolower($grupo['name']),
                                                        strtolower($searchGrupo),
                                                    );
                                                });
                                            @endphp

                                            {{-- Información sobre crear grupos desde proyectos --}}
                                            <li class="border-b border-gray-200">
                                                <div class="p-3 bg-blue-50 text-center space-y-2">
                                                    <div class="text-xs text-blue-700 font-medium">💡 ¿Necesitas crear
                                                        un grupo nuevo?</div>
                                                    <div class="text-xs text-blue-600">Los grupos de certificación se
                                                        crean desde la gestión de proyectos para incluir automáticamente
                                                        las personas correspondientes.</div>
                                                    <a href="{{ route('proyectos.index') }}"
                                                        class="inline-block text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded transition-colors">
                                                        📂 Ir a Gestión de Proyectos
                                                    </a>
                                                </div>
                                            </li>

                                            @forelse($gruposFiltrados as $grupo)
                                                <li wire:click="selectGrupo({{ $grupo['id'] }})"
                                                    class="p-2 cursor-pointer hover:bg-purple-50 transition-colors">
                                                    <div class="font-medium">{{ $grupo['name'] }}</div>
                                                    @if ($grupo['proyecto'])
                                                        <div class="text-xs text-blue-600 mt-1">📂 Proyecto:
                                                            {{ $grupo['proyecto'] }}</div>
                                                    @endif
                                                    @if ($grupo['descripcion'])
                                                        <div class="text-xs text-gray-500 mt-1">
                                                            {{ $grupo['descripcion'] }}</div>
                                                    @endif
                                                </li>
                                            @empty
                                                <li class="p-2 text-gray-500 text-center">
                                                    No hay grupos existentes para este tipo de certificado.
                                                    <div class="text-xs mt-1">Crea uno desde la gestión de proyectos.
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    {{-- ===================== PLANTILLA (OPCIONAL - MINIMALIZADA) =====================  --}}
                    @if ($grupoSeleccionado)
                        <div class="border-t border-gray-200 pt-4">
                            <div x-data="{ open: @entangle('showDropdownPlantilla'), showPlantillas: false }" class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-700">Plantilla (opcional)</p>
                                    <button @click="showPlantillas = !showPlantillas"
                                        class="text-sm text-purple-600 hover:text-purple-800 underline">
                                        {{ $plantillaSeleccionada ? 'Cambiar' : 'Seleccionar' }}
                                    </button>
                                </div>

                                <div x-show="showPlantillas" x-transition class="space-y-2">
                                    <div class="w-full flex items-center justify-between p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:border-purple-300 transition-colors"
                                        @click="open = !open">
                                        <p class="w-full truncate text-sm">
                                            {{ $plantillaSeleccionada['name'] ?? 'Usar plantilla por defecto' }}</p>
                                        <svg class="w-4 h-4 text-gray-600 transform transition-transform"
                                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>

                                    <div class="relative w-full" x-show="open" @click.outside="open = false"
                                        x-transition>
                                        <div
                                            class="absolute inset-x-0 z-20 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg w-full">
                                            <input type="text" wire:model.live="searchPlantilla"
                                                placeholder="Buscar plantilla..."
                                                class="w-full p-2 border-b border-gray-300 outline-none focus:border-purple-500">

                                            <ul class="max-h-60 overflow-y-auto">
                                                @php
                                                    $plantillasFiltradas = collect($plantillas)->filter(function (
                                                        $plantilla,
                                                    ) use ($searchPlantilla) {
                                                        return str_contains(
                                                            strtolower($plantilla['name']),
                                                            strtolower($searchPlantilla),
                                                        );
                                                    });
                                                @endphp

                                                @forelse($plantillasFiltradas as $plantilla)
                                                    <li wire:click="selectPlantilla({{ $plantilla['id'] }})"
                                                        class="p-2 cursor-pointer hover:bg-purple-50 transition-colors">
                                                        {{ $plantilla['name'] }}
                                                    </li>
                                                @empty
                                                    <li class="p-2 text-gray-500">No se encuentran plantillas.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- ===================== PERSONALIZACIÓN DE CERTIFICADO =====================  --}}
                    @if ($grupoSeleccionado && $plantillaSeleccionada)
                        <div class="border-t border-gray-200 pt-6 space-y-6">
                            <div class="text-center">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">🎨 Personalización del Certificado
                                </h3>
                                <p class="text-sm text-gray-600">Configura los elementos que aparecerán en tu
                                    certificado</p>
                            </div>

                            {{-- Configuración de Textos --}}
                            <div class="space-y-3 border border-blue-200 rounded-lg p-4 bg-blue-50/30">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-bold text-blue-800 flex items-center">
                                        ✏️ Edición de Contenido
                                    </label>
                                    <button wire:click="togglePersonalizacionTextos"
                                        class="text-xs px-3 py-1 rounded {{ $mostrarPersonalizacionTextos ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                                        {{ $mostrarPersonalizacionTextos ? 'Ocultar' : 'Mostrar' }}
                                    </button>
                                </div>

                                @if ($mostrarPersonalizacionTextos)
                                    <div class="space-y-4 mt-3">
                                        {{-- Instrucciones --}}
                                        <div
                                            class="text-xs text-blue-700 bg-blue-100 p-3 rounded border-l-4 border-blue-500">
                                            💡 <strong>Instrucciones:</strong><br>
                                            • Haz clic en cualquier texto del certificado para editarlo<br>
                                            • Usa la barra de herramientas que aparece para cambiar fuente, tamaño y
                                            color<br>
                                            • También puedes editar el contenido aquí abajo
                                        </div>

                                        {{-- Título principal --}}
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">Título Principal</label>
                                            <input type="text" wire:model.live="tituloCertificado"
                                                placeholder="CERTIFICADO"
                                                value="{{ $tituloCertificado ?? 'CERTIFICADO' }}"
                                                class="w-full text-sm p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <p class="text-xs text-gray-500 mt-1">Se muestra en la parte superior del certificado</p>
                                        </div>

                                        {{-- Subtítulo --}}
                                        {{-- <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">Subtítulo</label>
                                            <input type="text" wire:model.live="subtituloCertificado"
                                                placeholder="DE RECONOCIMIENTO"
                                                value="{{ $subtituloCertificado ?? 'DE RECONOCIMIENTO' }}"
                                                class="w-full text-sm p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <p class="text-xs text-gray-500 mt-1">Aparece debajo del título principal</p>
                                        </div> --}}

                                        {{-- Texto "Otorgado a:" (fijo) --}}
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">Texto de presentación</label>
                                            <input type="text" value="Otorgado a:" readonly
                                                class="w-full text-sm p-2 border border-gray-200 rounded bg-gray-50 text-gray-600">
                                            <p class="text-xs text-gray-500 mt-1">Texto fijo que aparece antes del nombre</p>
                                        </div>

                                        {{-- Descripción personalizada --}}
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">Descripción del reconocimiento</label>
                                            <textarea wire:model.live="textoDescripcion" rows="4"
                                                placeholder="Por su destacada participación como [CARGO] del área de [ÁREA] del proyecto &quot;[NOMBRE DEL PROYECTO]&quot; organizado por la Sección Estudiantil de Dirección de Proyectos de la Universidad Nacional de Trujillo"
                                                class="w-full text-sm p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                            <p class="text-xs text-gray-500 mt-1">Si está vacío, se generará automáticamente con los datos del proyecto. Puedes usar variables: [CARGO], [ÁREA], [PROYECTO]</p>
                                        </div>

                                        {{-- Lugar de emisión --}}
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">Lugar de emisión</label>
                                            <input type="text" wire:model.live="textoLugar"
                                                placeholder="{{ $eventoSeleccionado->lugar ?? 'Trujillo' }}"
                                                class="w-full text-sm p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <p class="text-xs text-gray-500 mt-1">Ciudad donde se emite el certificado (aparece en la fecha)</p>
                                        </div>

                                        {{-- Botones de acción --}}
                                        <div class="flex gap-2 pt-2">
                                            <button wire:click="aplicarTextosPorDefecto"
                                                class="flex-1 text-xs py-2 px-3 bg-green-500 text-white rounded hover:bg-green-600 transition-colors">
                                                📝 Generar textos automáticos
                                            </button>
                                            <button wire:click="resetearTextos"
                                                class="flex-1 text-xs py-2 px-3 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                                                🔄 Valores por defecto
                                            </button>
                                        </div>

                                        {{-- Vista previa de los textos actuales --}}
                                        <div class="mt-4 p-3 bg-gray-50 rounded-lg border">
                                            <h4 class="text-xs font-bold text-gray-700 mb-2">📄 Vista previa de textos:</h4>
                                            <div class="space-y-2 text-xs text-gray-600">
                                                <div><strong>Título:</strong> "{{ $tituloCertificado ?? 'CERTIFICADO' }}"</div>
                                                <div><strong>Subtítulo:</strong> "{{ $subtituloCertificado ?? 'DE RECONOCIMIENTO' }}"</div>
                                                <div><strong>Para:</strong> "{{ $personaSeleccionada->nombres ?? 'NOMBRE' }} {{ $personaSeleccionada->apellido_paterno ?? '' }} {{ $personaSeleccionada->apellido_materno ?? '' }}"</div>
                                                <div><strong>Lugar:</strong> "{{ $textoLugar ?: ($eventoSeleccionado->lugar ?? 'Trujillo') }}"</div>
                                                @if($textoDescripcion)
                                                    <div><strong>Descripción personalizada:</strong> {{ Str::limit($textoDescripcion, 100) }}</div>
                                                @else
                                                    <div><strong>Descripción:</strong> Se generará automáticamente</div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Reset de estilos --}}
                                        <div class="pt-2 border-t border-blue-300">
                                            <button wire:click="resetearEstilos"
                                                class="w-full text-xs py-2 px-3 bg-purple-500 text-white rounded hover:bg-purple-600 transition-colors">
                                                🎨 Restablecer Estilos
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div> {{-- Configuración de Firmas --}}
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-medium text-gray-700">Firmas</label>
                                    <div class="flex items-center space-x-2">
                                        <button wire:click="actualizarCantidadFirmas(1)"
                                            class="px-3 py-1 text-xs rounded {{ $cantidadFirmas == 1 ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">1</button>
                                        <button wire:click="actualizarCantidadFirmas(2)"
                                            class="px-3 py-1 text-xs rounded {{ $cantidadFirmas == 2 ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">2</button>
                                        <button wire:click="actualizarCantidadFirmas(3)"
                                            class="px-3 py-1 text-xs rounded {{ $cantidadFirmas == 3 ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">3</button>
                                    </div>
                                </div>

                                @for ($i = 0; $i < $cantidadFirmas; $i++)
                                    <div class="space-y-2">
                                        <label class="text-xs font-medium text-gray-600">Firma
                                            {{ $i + 1 }}</label>
                                        <select
                                            wire:change="seleccionarFirma($event.target.value, {{ $i }})"
                                            class="w-full text-sm p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                            <option value="">Seleccionar firma...</option>
                                            @foreach ($firmasDisponibles as $firma)
                                                <option value="{{ $firma['id'] }}"
                                                    {{ isset($firmasSeleccionadas[$i]) && $firmasSeleccionadas[$i]['id'] == $firma['id'] ? 'selected' : '' }}>
                                                    {{ $firma['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if (isset($firmasSeleccionadas[$i]))
                                            <div class="text-xs text-green-600 bg-green-50 p-2 rounded">
                                                ✓ {{ $firmasSeleccionadas[$i]['name'] }}
                                            </div>
                                        @endif
                                    </div>
                                @endfor
                            </div>

                            {{-- Configuración de Logos --}}
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-medium text-gray-700">Logos</label>
                                    <div class="flex items-center space-x-2">
                                        <button wire:click="actualizarCantidadLogos(1)"
                                            class="px-3 py-1 text-xs rounded {{ $cantidadLogos == 1 ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">1</button>
                                        <button wire:click="actualizarCantidadLogos(2)"
                                            class="px-3 py-1 text-xs rounded {{ $cantidadLogos == 2 ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">2</button>
                                    </div>
                                </div>

                                @for ($i = 0; $i < $cantidadLogos; $i++)
                                    <div class="space-y-2">
                                        <label class="text-xs font-medium text-gray-600">Logo
                                            {{ $i + 1 }}</label>
                                        <select
                                            wire:change="seleccionarLogo($event.target.value, {{ $i }})"
                                            class="w-full text-sm p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                            <option value="">Seleccionar logo...</option>
                                            @foreach ($logosDisponibles as $logo)
                                                <option value="{{ $logo['id'] }}"
                                                    {{ isset($logosSeleccionados[$i]) && $logosSeleccionados[$i]['id'] == $logo['id'] ? 'selected' : '' }}>
                                                    {{ $logo['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if (isset($logosSeleccionados[$i]))
                                            <div class="text-xs text-green-600 bg-green-50 p-2 rounded">
                                                ✓ {{ $logosSeleccionados[$i]['name'] }}
                                            </div>
                                        @endif
                                    </div>
                                @endfor
                            </div>

                            {{-- Configuración de Sello --}}
                            <div class="space-y-3">
                                <label class="text-sm font-medium text-gray-700">Sello SEDIPRO</label>
                                <select wire:change="seleccionarSello($event.target.value)"
                                    class="w-full text-sm p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    <option value="">Seleccionar sello...</option>
                                    @foreach ($sellosDisponibles as $sello)
                                        <option value="{{ $sello['id'] }}"
                                            {{ $selloSeleccionado && $selloSeleccionado['id'] == $sello['id'] ? 'selected' : '' }}>
                                            {{ $sello['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($selloSeleccionado)
                                    <div class="text-xs text-green-600 bg-green-50 p-2 rounded">
                                        ✓ {{ $selloSeleccionado['name'] }}
                                    </div>
                                @endif
                            </div>

                            {{-- Preview de la configuración --}}
                            <div
                                class="bg-gradient-to-br from-purple-50 to-indigo-50 p-4 rounded-lg border border-purple-200">
                                <h4 class="text-sm font-medium text-purple-800 mb-2">📋 Resumen de configuración:</h4>
                                <div class="space-y-1 text-xs text-purple-700">
                                    <div>• Plantilla: {{ $plantillaSeleccionada['name'] ?? 'Por defecto' }}</div>
                                    <div>• Firmas: {{ $cantidadFirmas }} ({{ count($firmasSeleccionadas) }}
                                        seleccionadas)</div>
                                    <div>• Logos: {{ $cantidadLogos }} ({{ count($logosSeleccionados) }}
                                        seleccionados)</div>
                                    <div>• Sello:
                                        {{ $selloSeleccionado ? $selloSeleccionado['name'] : 'No seleccionado' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div> <!-- Botones de acción -->
                <div class="mt-8 space-y-3">
                    {{-- Botón principal: Generar PDF personalizado --}}
                    @if ($grupoSeleccionado && $plantillaSeleccionada)
                        <button
                            class="w-full px-4 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-colors font-medium flex items-center justify-center gap-2"
                            wire:click="generarPDFPersonalizado"
                            wire:loading.attr="disabled"
                            wire:loading.class="opacity-50 cursor-not-allowed">
                            <span wire:loading.remove>📄 Generar Certificado PDF</span>
                            <span wire:loading>⏳ Generando PDF...</span>
                        </button>

                        {{-- Botón de debug (temporal) --}}
                        <button
                            class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium text-sm"
                            onclick="debugPDF()">
                            🔍 Debug: Ver HTML del certificado
                        </button>

                        {{-- Botón alternativo: Descarga directa --}}
                        <button
                            class="w-full px-4 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors font-medium text-sm"
                            onclick="descargarPDFDirecto()">
                            💾 Alternativo: Descarga directa
                        </button>

                        {{-- Botón de descarga masiva --}}
                        <button
                            class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-colors font-medium flex items-center justify-center gap-2"
                            wire:click="descargarCertificadosMasivos"
                            wire:loading.attr="disabled"
                            wire:loading.class="opacity-50 cursor-not-allowed"
                            title="Descarga todos los certificados del grupo en un archivo ZIP">
                            <span wire:loading.remove wire:target="descargarCertificadosMasivos">📦 Descargar TODOS los Certificados (ZIP)</span>
                            <span wire:loading wire:target="descargarCertificadosMasivos">⏳ Generando certificados masivos...</span>
                        </button>
                    @endif

                    {{-- Botón secundario: Guardar configuración --}}
                    @if ($grupoSeleccionado)
                        <button
                            class="w-full px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium"
                            wire:click="guardar">
                            � Guardar configuración
                        </button>
                    @endif

                    {{-- Botón de limpiar --}}
                    <button
                        class="w-full px-4 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors"
                        wire:click="limpiar">
                        🗑️ Limpiar todo
                    </button>
                </div>

                <!-- Mensajes flash -->
                @if (session()->has('message'))
                    <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

</div>

<script>
    // Escuchar el evento para abrir PDF
    document.addEventListener('livewire:initialized', function () {
        Livewire.on('open-pdf-window', function (event) {
            console.log('Evento recibido:', event);
            const url = event.url || event[0]?.url || event;
            console.log('Abriendo PDF:', url);

            if (!url || url === 'undefined') {
                console.error('URL no válida:', url);
                alert('Error: No se pudo generar la URL del PDF');
                return;
            }

            // Intentar abrir en nueva ventana
            const newWindow = window.open(url, '_blank', 'noopener,noreferrer');
        });

        // Escuchar evento de descarga masiva
        Livewire.on('open-download-window', function (event) {
            console.log('Evento descarga masiva recibido:', event);
            const url = event.url || event[0]?.url || event;
            console.log('Iniciando descarga masiva desde:', url);

            if (!url || url === 'undefined') {
                console.error('URL no válida para descarga masiva:', url);
                alert('Error: No se pudo generar la URL para descarga masiva');
                return;
            }

            // Redirigir directamente a la URL de descarga
            window.location.href = url;
        });
    });

    // Función para debug del PDF
    function debugPDF() {
        const component = Livewire.find('{{ $_instance->getId() }}');
        const params = {
            'tipo_certificado_id': component.tipoCertificadoSeleccionado?.id,
            'grupo_id': component.grupoSeleccionado?.id,
            'debug': 'true'
        };

        const url = new URL('{{ route("generar.pdf.personalizado") }}');
        Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

        window.open(url.toString(), '_blank');
    }

    // Función para descarga directa del PDF
    function descargarPDFDirecto() {
        const component = Livewire.find('{{ $_instance->getId() }}');

        if (!component.tipoCertificadoSeleccionado || !component.grupoSeleccionado) {
            alert('Selecciona un tipo de certificado y grupo antes de generar el PDF');
            return;
        }

        const params = {
            'tipo_certificado_id': component.tipoCertificadoSeleccionado.id,
            'grupo_id': component.grupoSeleccionado.id,
            'fecha_emision': component.fechaEmision,
            'cantidad_firmas': component.cantidadFirmas,
            'cantidad_logos': component.cantidadLogos,
            'titulo_certificado': component.tituloCertificado,
            'subtitulo_certificado': component.subtituloCertificado,
            'codigo_qr': component.codigoQR,
            'url_qr': component.urlQR
        };

        // Agregar arrays como JSON si existen
        if (component.firmasSeleccionadas && component.firmasSeleccionadas.length > 0) {
            params['firmas'] = JSON.stringify(component.firmasSeleccionadas);
        }
        if (component.logosSeleccionados && component.logosSeleccionados.length > 0) {
            params['logos'] = JSON.stringify(component.logosSeleccionados);
        }
        if (component.selloSeleccionado) {
            params['sello'] = JSON.stringify(component.selloSeleccionado);
        }
        if (component.estilosTextos) {
            params['estilos_textos'] = JSON.stringify(component.estilosTextos);
        }

        const url = new URL('{{ route("generar.pdf.personalizado") }}');
        Object.keys(params).forEach(key => {
            if (params[key] !== null && params[key] !== undefined) {
                url.searchParams.append(key, params[key]);
            }
        });

        console.log('Descargando PDF desde:', url.toString());
        window.open(url.toString(), '_blank');
    }
</script>
