<?php

namespace App\Livewire;

use App\Models\TipoDeCertificacion;
use App\Models\GrupoDeCertificacion;
use App\Models\Certificado;
use App\Models\Imagen;
use App\Models\AreaPersona;
use App\Models\Persona;
use Livewire\Component;

class GeneracionCertificados extends Component
{
    public $showDropdownPlantilla = false;
    public $showDropdownTipoCertificado = false;
    public $showDropdownGrupo = false;

    public $fechaEmision;

    public $searchPlantilla = '';
    public $searchTipoCertificado = '';
    public $searchGrupo = '';

    public $plantillas = [];
    public $plantillaSeleccionada = null;

    public $tiposCertificados = [];
    public $tipoCertificadoSeleccionado = null;

    public $grupos = [];
    public $grupoSeleccionado = null;

    // Variables para datos dinámicos del certificado
    public $eventoSeleccionado = null;
    public $personaSeleccionada = null;
    public $tipoDeCertificacionSeleccionada = null;

    // Para crear nuevo grupo
    public $mostrarFormularioGrupo = false;
    public $nombreNuevoGrupo = '';
    public $descripcionNuevoGrupo = '';

    // Para personalización de certificados
    public $firmasDisponibles = [];
    public $firmasSeleccionadas = [];
    public $cantidadFirmas = 1;

    public $logosDisponibles = [];
    public $logosSeleccionados = [];
    public $cantidadLogos = 1;

    public $sellosDisponibles = [];
    public $selloSeleccionado = null;

    // Para código QR
    public $codigoQR = true; // Habilitado por defecto
    public $urlQR = 'https://sediprano.gob.pe/verificar-certificado/'; // URL base para verificación

    // Para personalización de textos
    public $tituloCertificado = 'CERTIFICADO';
    public $subtituloCertificado = 'DE RECONOCIMIENTO';
    public $textoDescripcion = ''; // Vacío por defecto para generar automático
    public $textoLugar = ''; // Vacío por defecto para usar datos del evento
    public $mostrarPersonalizacionTextos = false;

    public $estilosTextos = [];

    // Para estilos de textos editables
    public $textoSeleccionado = null; // 'titulo', 'subtitulo', 'descripcion', 'lugar', 'nombre'
    private function inicializarEstilos()
    {
        $this->estilosTextos = [
            'titulo' => [
                'font_family' => 'Times New Roman',
                'font_size' => 36,
                'font_weight' => 'bold',
                'color' => '#000000',
                'text_align' => 'center',
            ],
            'subtitulo' => [
                'font_family' => 'Times New Roman',
                'font_size' => 24,
                'font_weight' => 'semibold',
                'color' => '#D97706',
                'text_align' => 'center',
            ],
            'nombre' => [
                'font_family' => 'Times New Roman',
                'font_size' => 28,
                'font_weight' => 'bold',
                'color' => '#000000',
                'text_align' => 'center',
            ],
            'descripcion' => [
                'font_family' => 'Times New Roman',
                'font_size' => 14,
                'font_weight' => 'normal',
                'color' => '#000000',
                'text_align' => 'center',
            ],
            'ubicacion' => [
                'font_family' => 'Times New Roman',
                'font_size' => 12,
                'font_weight' => 'normal',
                'color' => '#000000',
                'text_align' => 'center',
            ],
        ];
    }

    public function mount()
    {
        $this->fechaEmision = now()->format('Y-m-d');

        // Inicializar estilos de textos
        $this->inicializarEstilos();

        // Inicializar datos por defecto para el certificado
        $this->inicializarDatosPorDefecto();

        // Cargar plantillas de imágenes (tipo plantilla) - corregir filtro de estado
        $this->plantillas = Imagen::where('tipo', 'Plantilla')
            ->whereIn('estado', ['activo', 'Activa']) // Aceptar ambos formatos
            ->get()
            ->map(function ($imagen) {
                return [
                    'id' => $imagen->id,
                    'name' => $imagen->nombre,
                    'imagen' => $imagen->ruta // Usar ruta directa sin /storage/
                ];
            });

        // Cargar tipos de certificación
        $this->tiposCertificados = TipoDeCertificacion::all()
            ->map(function ($tipo) {
                return [
                    'id' => $tipo->id,
                    'name' => $tipo->nombre
                ];
            });

        // Los grupos se cargarán dinámicamente según el tipo seleccionado
        $this->grupos = collect();

        // Cargar elementos disponibles para personalización
        $this->cargarElementosPersonalizacion();
    }

    /**
     * Inicializar datos por defecto para mostrar el certificado
     */
    private function inicializarDatosPorDefecto()
    {
        $this->eventoSeleccionado = (object)[
            'nombre' => 'Evento',
            'descripcion' => 'Descripción del evento',
            'lugar' => 'Trujillo',
            'fecha_inicio' => now()
        ];

        $this->personaSeleccionada = (object)[
            'nombres' => 'Nombre',
            'apellido_paterno' => 'Apellido',
            'apellido_materno' => 'Paterno'
        ];

        $this->tipoDeCertificacionSeleccionada = (object)[
            'descripcion' => 'su participación'
        ];
    }

    /* PARA PLANTILLAS */
    public function toggleDropdownPlantilla()
    {
        $this->showDropdownPlantilla = !$this->showDropdownPlantilla;
    }

    public function selectPlantilla($id)
    {
        $this->plantillaSeleccionada = collect($this->plantillas)->firstWhere('id', $id);
        $this->showDropdownPlantilla = false;
    }

    /* PARA TIPO DE CERTIFICADOS */
    public function toggleDropdownTipoCertificado()
    {
        $this->showDropdownTipoCertificado = !$this->showDropdownTipoCertificado;
    }

    public function selectTipoCertificado($id)
    {
        $this->tipoCertificadoSeleccionado = collect($this->tiposCertificados)->firstWhere('id', $id);
        $this->showDropdownTipoCertificado = false;
        $this->grupoSeleccionado = null; // Limpiar grupo si cambia el tipo
        $this->searchGrupo = ''; // Reset buscador de grupo

        // Cargar grupos dinámicamente según el tipo seleccionado
        $this->cargarGruposPorTipo($id);
    }

    public function cargarGruposPorTipo($tipoId)
    {
        // Cargar grupos existentes que ya tienen personas asociadas
        $this->grupos = GrupoDeCertificacion::where('tipo_de_certificacion_id', $tipoId)
            ->whereHas('proyecto') // Solo grupos con proyectos
            ->with(['imagenPlantilla', 'proyecto', 'tipoDeCertificacion'])
            ->get()
            ->map(function ($grupo) {
                return [
                    'id' => $grupo->id,
                    'name' => $grupo->nombre,
                    'certification_type_id' => $grupo->tipo_de_certificacion_id,
                    'descripcion' => $grupo->descripcion,
                    'fecha_emision' => $grupo->fecha_emision,
                    'proyecto' => $grupo->proyecto ? $grupo->proyecto->nombre : null
                ];
            });
    }

    /* PARA GRUPO DE CERTIFICADOS */
    public function toggleDropdownGrupo()
    {
        $this->showDropdownGrupo = !$this->showDropdownGrupo;
    }

    public function selectGrupo($id)
    {
        $this->grupoSeleccionado = $this->gruposFiltrados->firstWhere('id', $id);
        $this->showDropdownGrupo = false;

        // Cargar plantilla asociada al grupo si existe
        $grupo = GrupoDeCertificacion::with('imagenPlantilla')->find($id);
        if ($grupo && $grupo->imagenPlantilla) {
            $this->plantillaSeleccionada = [
                'id' => $grupo->imagenPlantilla->id,
                'name' => $grupo->imagenPlantilla->nombre,
                'imagen' => $grupo->imagenPlantilla->ruta
            ];
        }

        // Cargar datos adicionales para el certificado
        $this->cargarDatosCertificado($grupo);
    }

    /**
     * Cargar datos necesarios para el certificado (evento, persona, tipo de certificación)
     */
    public function cargarDatosCertificado($grupo)
    {
        if (!$grupo) return;

        // Cargar tipo de certificación
        $this->tipoDeCertificacionSeleccionada = $grupo->tipoDeCertificacion;

        // Cargar evento relacionado (asumimos que hay un evento por proyecto)
        if ($grupo->proyecto) {
            // Por ahora creamos datos de ejemplo del evento basado en el proyecto
            $this->eventoSeleccionado = (object)[
                'nombre' => $grupo->proyecto->nombre ?? 'Evento',
                'descripcion' => $grupo->proyecto->descripcion ?? 'Descripción del evento',
                'lugar' => 'Trujillo', // Por defecto
                'fecha_inicio' => $grupo->fecha_emision ?? now()
            ];
        } else {
            // Datos por defecto si no hay proyecto
            $this->eventoSeleccionado = (object)[
                'nombre' => 'Evento',
                'descripcion' => 'Descripción del evento',
                'lugar' => 'Trujillo',
                'fecha_inicio' => now()
            ];
        }

        // Cargar primera persona del proyecto para mostrar como ejemplo
        if ($grupo->proyecto) {
            $areaPersona = \App\Models\AreaPersona::whereHas('proyectos', function($query) use ($grupo) {
                $query->where('proyecto_id', $grupo->proyecto->id);
            })->with(['persona', 'area', 'areaPersonaCargos.cargo'])->first();

            if ($areaPersona && $areaPersona->persona) {
                $personaData = $areaPersona->persona->toArray();

                // Agregamos área y cargos como campos adicionales
                $personaPlano = array_merge(
                    $personaData,
                    [
                        'area'   => $areaPersona->area->nombre ?? null,
                        'cargos' => $areaPersona->areaPersonaCargos
                                                ->pluck('cargo.nombre')
                                                ->first()
                    ]
                );
                $this->personaSeleccionada = (object)$personaPlano;
                // dd($this->personaSeleccionada);
            }
        }

        // Si no hay persona del proyecto, usar datos de ejemplo
        if (!$this->personaSeleccionada) {
            $this->personaSeleccionada = (object)[
                'nombres' => 'Nombre',
                'apellidos' => 'Apellidos',
            ];
        }
    }

    public function getGruposFiltradosProperty()
    {
        if (!$this->tipoCertificadoSeleccionado) {
            return collect();
        }

        return collect($this->grupos)->filter(function ($grupo) {
            return $grupo['certification_type_id'] === $this->tipoCertificadoSeleccionado['id'];
        });
    }

    public function crearGrupoNuevo()
    {
        // Deshabilitado - Los grupos deben crearse desde proyectos
        session()->flash('error', 'Los grupos de certificación deben crearse desde la gestión de proyectos para incluir las personas correspondientes.');
        return;
    }

    public function mostrarFormularioNuevoGrupo()
    {
        $this->mostrarFormularioGrupo = true;
        $this->nombreNuevoGrupo = '';
        $this->descripcionNuevoGrupo = '';
    }

    public function cancelarNuevoGrupo()
    {
        $this->mostrarFormularioGrupo = false;
        $this->nombreNuevoGrupo = '';
        $this->descripcionNuevoGrupo = '';
    }

    public function guardar()
    {
        if (!$this->tipoCertificadoSeleccionado || !$this->grupoSeleccionado) {
            session()->flash('error', 'Por favor complete al menos el tipo de certificado y grupo');
            return;
        }

        // Actualizar el grupo seleccionado con la nueva información
        $grupo = GrupoDeCertificacion::find($this->grupoSeleccionado['id']);
        if ($grupo) {
            $updateData = [
                'fecha_emision' => $this->fechaEmision,
                'estado' => 'Validado'
            ];

            // Solo actualizar plantilla si se seleccionó una
            if ($this->plantillaSeleccionada) {
                $updateData['imagen_plantilla_id'] = $this->plantillaSeleccionada['id'];
            }

            // Guardar logos seleccionados como imagen_logo_sediprano_id (el primero)
            if (!empty($this->logosSeleccionados)) {
                $updateData['imagen_logo_sediprano_id'] = $this->logosSeleccionados[0]['id'] ?? null;
            }

            // Guardar sello seleccionado
            if ($this->selloSeleccionado) {
                $updateData['imagen_sello_id'] = $this->selloSeleccionado['id'];
            }

            $grupo->update($updateData);

            // Guardar configuraciones de estilos en la tabla configuraciones
            $this->guardarConfiguracionesEstilos($grupo->id);
        }

        session()->flash('message', 'Configuración guardada exitosamente');
    }

    /**
     * Guardar configuraciones de estilos en la tabla configuraciones
     */
    private function guardarConfiguracionesEstilos($grupoId)
    {
        // Mapeo entre las claves del frontend y los IDs de la tabla seccion_de_informacion
        $mapeoSecciones = [
            'titulo' => 1,        // "Titulo de certificación"
            'subtitulo' => 2,     // "Subtitulo de certificación"
            'otorgado' => 3,      // "Texto previo a titular de certificación"
            'nombre' => 4,        // "Titular de certificación"
            'descripcion' => 6,   // "Cuerpo del certificado"
            'ubicacion' => 7,     // "Lugar y fecha del certificado"
            'firmantes' => 8,     // "Firmantes del certificado"
        ];

        // Eliminar configuraciones anteriores
        \App\Models\Configuracion::where('grupo_de_certificacion_id', $grupoId)->delete();

        foreach ($this->estilosTextos as $seccionKey => $estilos) {
            // Solo procesar si existe el mapeo
            if (isset($mapeoSecciones[$seccionKey])) {
                \App\Models\Configuracion::create([
                    'grupo_de_certificacion_id' => $grupoId,
                    'seccion_de_informacion_id' => $mapeoSecciones[$seccionKey],
                    'fuente_id' => $estilos['fuente_id'] ?? 1,
                    'tamano' => $estilos['tamano'] ?? 12,
                    'color' => $estilos['color'] ?? '#000000',
                    'negrita' => $estilos['negrita'] ?? false,
                    'cursiva' => $estilos['cursiva'] ?? false,
                    'subrayado' => $estilos['subrayado'] ?? false,
                    'alineacion' => $estilos['alineacion'] ?? 'left',
                    'posicion_x' => $estilos['posicion_x'] ?? 0,
                    'posicion_y' => $estilos['posicion_y'] ?? 0,
                ]);
            }
        }
    }

    public function limpiar()
    {
        $this->plantillaSeleccionada = null;
        $this->tipoCertificadoSeleccionado = null;
        $this->grupoSeleccionado = null;
        $this->grupos = collect();
        $this->fechaEmision = now()->format('Y-m-d');
        $this->searchPlantilla = '';
        $this->searchTipoCertificado = '';
        $this->searchGrupo = '';

        // Limpiar formulario de nuevo grupo
        $this->nombreNuevoGrupo = '';
        $this->descripcionNuevoGrupo = '';
        $this->mostrarFormularioGrupo = false;

        // Cerrar todos los dropdowns
        $this->showDropdownPlantilla = false;
        $this->showDropdownTipoCertificado = false;
        $this->showDropdownGrupo = false;

        session()->flash('message', 'Formulario limpiado');
    }

    /* MÉTODOS PARA PERSONALIZACIÓN DE CERTIFICADOS */
    public function cargarElementosPersonalizacion()
    {
        // Cargar firmas desde la tabla personas
        $this->firmasDisponibles = Persona::whereNotNull('imagen_firma')
            ->where('imagen_firma', '!=', '')
            ->with([
                'areaPersonas.areaPersonaCargos.cargo', // nombre exacto del método en Persona.php
            ])
            ->get()
            ->map(function ($persona) {
                // primer cargo disponible, protegiendo valores nulos
                $primerCargo = $persona->areaPersonas
                    ->first()?->areaPersonaCargos
                    ->first()?->cargo;

                return [
                    'id'    => 'persona_' . $persona->id,
                    'name'  => trim($persona->nombres . ' ' . $persona->apellidos),
                    'ruta'  => $persona->imagen_firma,
                    'cargo' => $primerCargo?->nombre ?? '', // o 'PARTICIPANTE' si deseas un valor por defecto
                ];
            })
            ->toArray();

        // Cargar logos disponibles
        $this->logosDisponibles = Imagen::where('tipo', 'Logo')
            ->whereIn('estado', ['activo', 'Activa'])
            ->get()
            ->map(function ($imagen) {
                return [
                    'id' => $imagen->id,
                    'name' => $imagen->nombre,
                    'ruta' => $imagen->ruta
                ];
            })->toArray();

        // Cargar sellos disponibles
        $this->sellosDisponibles = Imagen::where('tipo', 'Sello')
            ->whereIn('estado', ['activo', 'Activa'])
            ->get()
            ->map(function ($imagen) {
                return [
                    'id' => $imagen->id,
                    'name' => $imagen->nombre,
                    'ruta' => $imagen->ruta
                ];
            })->toArray();
    }

    public function actualizarCantidadFirmas($cantidad)
    {
        $this->cantidadFirmas = max(1, min(3, $cantidad)); // Entre 1 y 3
        $this->firmasSeleccionadas = array_slice($this->firmasSeleccionadas, 0, $this->cantidadFirmas);
    }

    public function actualizarCantidadLogos($cantidad)
    {
        $this->cantidadLogos = max(1, min(2, $cantidad)); // Entre 1 y 2
        $this->logosSeleccionados = array_slice($this->logosSeleccionados, 0, $this->cantidadLogos);
    }

    public function seleccionarFirma($id, $posicion)
    {
        $firma = collect($this->firmasDisponibles)->firstWhere('id', $id);
        if ($firma) {
            $this->firmasSeleccionadas[$posicion] = $firma;
        }
    }

    public function seleccionarLogo($id, $posicion)
    {
        $logo = collect($this->logosDisponibles)->firstWhere('id', $id);
        if ($logo) {
            $this->logosSeleccionados[$posicion] = $logo;
        }
    }

    public function seleccionarSello($id)
    {
        $this->selloSeleccionado = collect($this->sellosDisponibles)->firstWhere('id', $id);
    }

    public function generarPDFPersonalizado()
    {
        \Log::info('=== LIVEWIRE: Iniciando generación de PDF ===');

        if (!$this->tipoCertificadoSeleccionado || !$this->grupoSeleccionado) {
            \Log::error('LIVEWIRE: Faltan datos - Tipo: ' . ($this->tipoCertificadoSeleccionado ? 'OK' : 'NULL') . ', Grupo: ' . ($this->grupoSeleccionado ? 'OK' : 'NULL'));
            session()->flash('error', 'Selecciona un tipo de certificado y grupo antes de generar el PDF');
            return;
        }

        try {
            // Preparar datos para el PDF con formato de URL
            $params = [
                'tipo_certificado_id' => $this->tipoCertificadoSeleccionado['id'],
                'grupo_id' => $this->grupoSeleccionado['id'],
                'fecha_emision' => $this->fechaEmision,
                'cantidad_firmas' => $this->cantidadFirmas,
                'cantidad_logos' => $this->cantidadLogos
            ];

            // Agregar firmas si existen
            if (!empty($this->firmasSeleccionadas)) {
                $params['firmas'] = json_encode($this->firmasSeleccionadas);
            }

            // Agregar logos si existen
            if (!empty($this->logosSeleccionados)) {
                $params['logos'] = json_encode($this->logosSeleccionados);
            }

            // Agregar sello si existe
            if ($this->selloSeleccionado) {
                $params['sello'] = json_encode($this->selloSeleccionado);
            }

            // Agregar textos personalizados
            $params['titulo_certificado'] = $this->tituloCertificado;
            // quitar la palabra "certificado" del subtítulo si ya está en el título
            $params['subtitulo_certificado'] = str_replace('Certificado', '', $this->tipoCertificadoSeleccionado['name']);

            // Solo agregar descripción si no está vacía
            if (!empty($this->textoDescripcion)) {
                $params['texto_descripcion'] = $this->textoDescripcion;
            }

            // Solo agregar lugar si no está vacío
            if (!empty($this->textoLugar)) {
                $params['texto_lugar'] = $this->textoLugar;
            }

            // Agregar estilos de textos
            $params['estilos_textos'] = json_encode($this->estilosTextos);

            // Agregar configuración de QR
            $params['codigo_qr'] = $this->codigoQR;
            $params['url_qr'] = $this->urlQR;

            // Crear URL con parámetros
            $url = route('generar.pdf.personalizado', $params);

            \Log::info('LIVEWIRE: URL generada: ' . $url);
            \Log::info('LIVEWIRE: Parámetros: ', $params);

            // Usar JavaScript más robusto para abrir el PDF
            $this->dispatch('open-pdf-window', url: $url);

            session()->flash('message', 'Generando PDF... Se abrirá en una nueva ventana');

        } catch (\Exception $e) {
            \Log::error('LIVEWIRE: Error preparando PDF: ' . $e->getMessage());
            session()->flash('error', 'Error preparando el PDF: ' . $e->getMessage());
        }
    }

    /* MÉTODOS PARA PERSONALIZACIÓN DE TEXTOS */
    public function togglePersonalizacionTextos()
    {
        $this->mostrarPersonalizacionTextos = !$this->mostrarPersonalizacionTextos;
    }

    public function resetearTextos()
    {
        $this->tituloCertificado = 'CERTIFICADO';
        $this->subtituloCertificado = 'DE RECONOCIMIENTO';
        $this->textoDescripcion = '';
        $this->textoLugar = '';

        session()->flash('message', 'Textos restablecidos a valores por defecto');
    }

    public function aplicarTextosPorDefecto()
    {
        // Generar descripción automática basada en los datos disponibles
        if ($this->grupoSeleccionado) {
            $cargo = $this->personaSeleccionada->cargo ?? 'CARGO';
            $area = $this->personaSeleccionada->area ?? 'ÁREA';
            $proyecto = $this->eventoSeleccionado->nombre ?? $this->grupoSeleccionado['name'] ?? 'NOMBRE DEL PROYECTO';

            $this->textoDescripcion = "Por su destacada participación como {$cargo} del área de {$area} del proyecto \"{$proyecto}\" organizado por la Sección Estudiantil de Dirección de Proyectos de la Universidad Nacional de Trujillo";

            // Establecer lugar si no está definido
            if (empty($this->textoLugar)) {
                $this->textoLugar = $this->eventoSeleccionado->lugar ?? 'Trujillo';
            }
        } else {
            $this->textoDescripcion = 'Por su destacada participación como CARGO del área de ÁREA del proyecto "NOMBRE DEL PROYECTO" organizado por la Sección Estudiantil de Dirección de Proyectos de la Universidad Nacional de Trujillo';
        }

        session()->flash('message', 'Textos generados automáticamente basados en los datos del proyecto');
    }

    /* MÉTODOS PARA EDICIÓN DE ESTILOS DE TEXTOS */
    public function seleccionarTexto($texto)
    {
        $this->textoSeleccionado = $texto;
    }

    public function deseleccionarTexto()
    {
        \Log::info('deseleccionarTexto llamado - texto seleccionado antes: ' . $this->textoSeleccionado);
        $this->textoSeleccionado = null;
        \Log::info('deseleccionarTexto ejecutado - texto seleccionado después: ' . ($this->textoSeleccionado ?? 'null'));
    }

    public function actualizarEstiloTexto($propiedad, $valor)
    {
        if ($this->textoSeleccionado && isset($this->estilosTextos[$this->textoSeleccionado])) {
            $this->estilosTextos[$this->textoSeleccionado][$propiedad] = $valor;
        }
    }

    public function resetearEstilos()
    {
        $this->estilosTextos = [
            'titulo' => [
                'font_family' => 'Times New Roman',
                'font_size' => 36,
                'font_weight' => 'bold',
                'color' => '#000000',
                'text_align' => 'center'
            ],
            'subtitulo' => [
                'font_family' => 'Times New Roman',
                'font_size' => 24,
                'font_weight' => 'semibold',
                'color' => '#D97706',
                'text_align' => 'center'
            ],
            'nombre' => [
                'font_family' => 'Times New Roman',
                'font_size' => 28,
                'font_weight' => 'bold',
                'color' => '#000000',
                'text_align' => 'center'
            ],
            'descripcion' => [
                'font_family' => 'Times New Roman',
                'font_size' => 14,
                'font_weight' => 'normal',
                'color' => '#000000',
                'text_align' => 'center'
            ],
            'ubicacion' => [
                'font_family' => 'Times New Roman',
                'font_size' => 12,
                'font_weight' => 'normal',
                'color' => '#000000',
                'text_align' => 'center'
            ]
        ];

        session()->flash('message', 'Estilos restablecidos a valores por defecto');
    }

    /* MÉTODO PARA DESCARGA MASIVA DE CERTIFICADOS */
    public function descargarCertificadosMasivos()
    {
        try {
            if (!$this->grupoSeleccionado || !$this->tipoCertificadoSeleccionado) {
                session()->flash('error', 'Debe seleccionar un grupo y tipo de certificado');
                return;
            }

            // Obtener todas las personas del grupo desde la tabla intermedia certificados
            $grupo = GrupoDeCertificacion::find($this->grupoSeleccionado['id']);
            if (!$grupo) {
                session()->flash('error', 'Grupo no encontrado');
                return;
            }

            // Obtener todos los certificados del grupo con sus personas
            $certificados = \App\Models\Certificado::where('grupo_de_certificacion_id', $grupo->id)
                ->with('person')
                ->get();

            if ($certificados->isEmpty()) {
                session()->flash('error', 'No hay personas registradas en este grupo');
                return;
            }

            // Preparar datos para enviar al controlador
            $parametros = [
                'grupo_id' => $grupo->id,
                'tipo_certificado_id' => $this->tipoCertificadoSeleccionado['id'],
                'fecha_emision' => $this->fechaEmision,
                'cantidad_firmas' => $this->cantidadFirmas,
                'cantidad_logos' => $this->cantidadLogos,
                'titulo_certificado' => $this->tituloCertificado,
                'subtitulo_certificado' =>  str_replace('Certificado', '', $this->tipoCertificadoSeleccionado['name']),
                'codigo_qr' => $this->codigoQR,
                'url_qr' => $this->urlQR,
                'firmas' => json_encode($this->firmasSeleccionadas),
                'logos' => json_encode($this->logosSeleccionados),
                'sello' => json_encode($this->selloSeleccionado),
                'estilos_textos' => json_encode($this->estilosTextos),
                'texto_descripcion' => $this->textoDescripcion,
                'texto_lugar' => $this->textoLugar
            ];

            // Generar URL para descarga masiva
            try {
                $url = route('generar.certificados.masivos', $parametros);
            } catch (\Exception $routeException) {
                // Fallback: construir URL manualmente
                $baseUrl = request()->getSchemeAndHttpHost();
                $queryString = http_build_query($parametros);
                $url = $baseUrl . '/generar-certificados-masivos?' . $queryString;
                \Log::warning('Ruta no encontrada, usando URL manual: ' . $url);
            }

            // Emitir evento para abrir la descarga
            $this->dispatch('open-download-window', ['url' => $url]);

            session()->flash('message', 'Iniciando descarga masiva de ' . $certificados->count() . ' certificados...');        } catch (\Exception $e) {
            session()->flash('error', 'Error al preparar descarga masiva: ' . $e->getMessage());
        }
    }

    /* DEFAULT */
    public function render()
    {
        return view('livewire.certificates.generacion-certificados');
    }
}
