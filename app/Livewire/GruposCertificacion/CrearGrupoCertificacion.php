<?php

namespace App\Livewire\GruposCertificacion;

use App\Application\Services\GrupoCertificacionApplicationService;
use App\Domain\Services\ReglaElegibilidadResolver;
use App\Domain\Services\ContextoRequeridoResolver;
use App\Models\TipoDeCertificacion;
use Livewire\Component;
use Illuminate\Support\Collection;

class CrearGrupoCertificacion extends Component
{
    // ============================================
    // PROPIEDADES PÚBLICAS (Estado de UI)
    // ============================================
    
    // Datos básicos
    public $tipoCertificacionId = null;
    public $nombre = null;
    public $descripcion = null;
    
    // Contexto dinámico
    public $proyectoId = null;
    public $eventoId = null;
    public $anio = null;
    public $periodo = null;
    
    // Selección de personas
    public $personasSeleccionadas = [];
    public $searchPersona = '';
    
    // Estado de UI
    public $loading = false;
    public $detallesNoElegibles = [];
    public $showDropdownTiposCertificados = false;
    public $searchTipoCertificado = '';
    
    // ============================================
    // SERVICIOS
    // ============================================
    
    protected $grupoCertificacionApplicationService;
    protected $reglaElegibilidadResolver;
    protected $contextoRequeridoResolver;
    
    public function boot()
    {
        $this->grupoCertificacionApplicationService = app(GrupoCertificacionApplicationService::class);
        $this->reglaElegibilidadResolver = app(ReglaElegibilidadResolver::class);
        $this->contextoRequeridoResolver = app(ContextoRequeridoResolver::class);
    }
    
    // ============================================
    // LIFECYCLE
    // ============================================
    
    public function mount()
    {
        // Restaurar estado desde query params
        $this->tipoCertificacionId = request()->query('tipo');
        $this->proyectoId = request()->query('proyecto');
        $this->eventoId = request()->query('evento');
        $this->anio = request()->query('anio');
        $this->periodo = request()->query('periodo');
    }
    
    // ============================================
    // EVENT HANDLERS
    // ============================================
    
    public function selectTipoCertificado($tipoId)
    {
        try {
            $this->tipoCertificacionId = (int)$tipoId;
            $this->showDropdownTiposCertificados = false;
            $this->searchTipoCertificado = '';
            $this->resetContexto();
            $this->resetPersonas();
            $this->updateQueryParams();
            $this->dispatch('tipo-certificado-seleccionado');
        } catch (\Exception $e) {
            \Log::error('Error en selectTipoCertificado: ' . $e->getMessage());
            $this->addError('general', 'Error al seleccionar tipo de certificado: ' . $e->getMessage());
        }
    }
    
    public function updatedTipoCertificacionId($value)
    {
        $this->tipoCertificacionId = $value;
        $this->showDropdownTiposCertificados = false;
        $this->resetContexto();
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    public function updatedProyectoId($value)
    {
        $this->proyectoId = $value;
        // Si el evento depende del proyecto, resetear evento
        if ($this->contextoRequerido['evento_depende_proyecto']) {
            $this->eventoId = null;
        }
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    public function updatedEventoId($value)
    {
        $this->eventoId = $value;
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    public function updatedAnio($value)
    {
        $this->anio = $value;
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    public function updatedPeriodo($value)
    {
        $this->periodo = $value;
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    public function updatedSearchPersona()
    {
        // La búsqueda se aplica en el computed property
    }
    
    public function crearGrupo()
    {
        $this->loading = true;
        $this->resetErrorBag();
        
        // Validar inputs básicos
        $this->validate([
            'tipoCertificacionId' => 'required|exists:tipos_de_certificacion,id',
            'personasSeleccionadas' => 'required|array|min:1',
        ], [
            'tipoCertificacionId.required' => 'Debe seleccionar un tipo de certificado.',
            'personasSeleccionadas.required' => 'Debe seleccionar al menos una persona.',
            'personasSeleccionadas.min' => 'Debe seleccionar al menos una persona.',
        ]);
        
        // Validar contexto requerido
        $contextoRequerido = $this->contextoRequerido;
        if ($contextoRequerido['requiere_proyecto'] && !$this->proyectoId) {
            $this->addError('proyectoId', 'Este tipo de certificado requiere un proyecto.');
            $this->loading = false;
            return;
        }
        if ($contextoRequerido['requiere_evento'] && !$this->eventoId) {
            $this->addError('eventoId', 'Este tipo de certificado requiere un evento.');
            $this->loading = false;
            return;
        }
        if ($contextoRequerido['requiere_anio_periodo']) {
            if (!$this->anio || !$this->periodo) {
                $this->addError('anio', 'Este tipo de certificado requiere año y periodo.');
                $this->loading = false;
                return;
            }
        }
        
        // Preparar contexto
        $contexto = [];
        if ($this->proyectoId) {
            $contexto['proyecto_id'] = $this->proyectoId;
        }
        if ($this->eventoId) {
            $contexto['evento_id'] = $this->eventoId;
        }
        if ($this->anio && $this->periodo) {
            $contexto['anio'] = $this->anio;
            $contexto['periodo'] = $this->periodo;
        }
        
        // Llamar al servicio de aplicación
        try {
            // Convertir IDs de personas a instancias
            $personas = \App\Models\Persona::whereIn('id', $this->personasSeleccionadas)->get()->all();
            
            // Asegurar que tipoCertificacionId sea un entero
            $tipoId = is_numeric($this->tipoCertificacionId) ? (int)$this->tipoCertificacionId : $this->tipoCertificacionId;
            
            $resultado = $this->grupoCertificacionApplicationService->crearGrupo(
                $tipoId,
                $personas,
                [
                    'contexto' => $contexto,
                    'usuario_creador_id' => auth()->id(),
                    'nombre' => $this->nombre,
                ]
            );
            
            if ($resultado['grupo_creado']) {
                session()->flash('success', $resultado['mensaje']);
                return redirect()->route('grupos.show', $resultado['grupo_creado']->id);
            } else {
                $this->addError('general', $resultado['mensaje']);
                if (isset($resultado['resultado_evaluacion']['no_elegibles'])) {
                    $this->detallesNoElegibles = $resultado['resultado_evaluacion']['no_elegibles'];
                }
            }
        } catch (\Exception $e) {
            $this->addError('general', 'Error al crear el grupo: ' . $e->getMessage());
        } finally {
            $this->loading = false;
        }
    }
    
    public function togglePersona($personaId)
    {
        if (in_array($personaId, $this->personasSeleccionadas)) {
            $this->personasSeleccionadas = array_values(array_diff($this->personasSeleccionadas, [$personaId]));
        } else {
            $this->personasSeleccionadas[] = $personaId;
        }
    }
    
    public function seleccionarTodasPersonas()
    {
        $this->personasSeleccionadas = $this->personasElegibles->pluck('id')->toArray();
    }
    
    public function deseleccionarTodasPersonas()
    {
        $this->personasSeleccionadas = [];
    }
    
    public function limpiar()
    {
        $this->tipoCertificacionId = null;
        $this->nombre = null;
        $this->descripcion = null;
        $this->resetContexto();
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    // ============================================
    // MÉTODOS AUXILIARES
    // ============================================
    
    protected function resetContexto()
    {
        $this->proyectoId = null;
        $this->eventoId = null;
        $this->anio = null;
        $this->periodo = null;
    }
    
    protected function resetPersonas()
    {
        $this->personasSeleccionadas = [];
        $this->searchPersona = '';
    }
    
    protected function updateQueryParams()
    {
        $params = [];
        if ($this->tipoCertificacionId) {
            $params['tipo'] = $this->tipoCertificacionId;
        }
        if ($this->proyectoId) {
            $params['proyecto'] = $this->proyectoId;
        }
        if ($this->eventoId) {
            $params['evento'] = $this->eventoId;
        }
        if ($this->anio) {
            $params['anio'] = $this->anio;
        }
        if ($this->periodo) {
            $params['periodo'] = $this->periodo;
        }
        
        $this->dispatch('update-url', $params);
    }
    
    // ============================================
    // COMPUTED PROPERTIES
    // ============================================
    
    public function getTipoCertificacionProperty()
    {
        if (!$this->tipoCertificacionId) {
            return null;
        }
        return TipoDeCertificacion::find($this->tipoCertificacionId);
    }
    
    public function getTiposCertificadosProperty()
    {
        return TipoDeCertificacion::orderBy('nombre')->get();
    }
    
    public function getContextoRequeridoProperty()
    {
        if (!$this->tipoCertificacionId) {
            return [
                'requiere_proyecto' => false,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => false,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ];
        }
        
        return $this->contextoRequeridoResolver->resolverContextoRequerido($this->tipoCertificacionId);
    }
    
    public function getProyectosDisponiblesProperty()
    {
        if (!$this->tipoCertificacion || !$this->contextoRequerido['proyecto_filtrado']) {
            return \App\Models\Proyecto::orderBy('nombre')->get();
        }
        
        return $this->contextoRequeridoResolver->obtenerProyectosDisponibles($this->tipoCertificacion);
    }
    
    public function getEventosDisponiblesProperty()
    {
        if (!$this->tipoCertificacion) {
            return collect([]);
        }
        
        $contextoRequerido = $this->contextoRequerido;
        
        if (!$contextoRequerido['requiere_evento']) {
            return collect([]);
        }
        
        $soloGenerales = $contextoRequerido['evento_solo_generales'] ?? false;
        
        return $this->contextoRequeridoResolver->obtenerEventosDisponibles(
            $this->tipoCertificacion,
            $this->proyectoId,
            $soloGenerales
        );
    }
    
    public function getAniosPeriodosDisponiblesProperty()
    {
        return $this->contextoRequeridoResolver->obtenerAniosPeriodosDisponibles();
    }
    
    public function getPersonasElegiblesProperty()
    {
        if (!$this->tipoCertificacionId || !$this->tipoCertificacion) {
            return collect([]);
        }
        
        // Verificar que el contexto requerido esté completo
        $contextoRequerido = $this->contextoRequerido;
        
        if ($contextoRequerido['requiere_proyecto'] && !$this->proyectoId) {
            return collect([]);
        }
        
        if ($contextoRequerido['requiere_evento'] && !$this->eventoId) {
            return collect([]);
        }
        
        if ($contextoRequerido['requiere_anio_periodo'] && (!$this->anio || !$this->periodo)) {
            return collect([]);
        }
        
        // Preparar contexto para el resolver
        $contexto = [];
        if ($this->proyectoId) {
            $contexto['proyecto_id'] = $this->proyectoId;
        }
        if ($this->eventoId) {
            $contexto['evento_id'] = $this->eventoId;
        }
        if ($this->anio && $this->periodo) {
            $contexto['anio'] = $this->anio;
            $contexto['periodo'] = $this->periodo;
        }
        
        try {
            // Obtener personas elegibles usando el resolver
            $personas = $this->reglaElegibilidadResolver->resolverPersonasElegibles(
                $this->tipoCertificacion,
                $contexto
            );
            
            // Aplicar búsqueda si existe
            if ($this->searchPersona) {
                $personas = $personas->filter(function ($persona) {
                    $nombreCompleto = $persona->nombres . ' ' . $persona->apellidos;
                    return stripos($nombreCompleto, $this->searchPersona) !== false ||
                           stripos($persona->codigo ?? '', $this->searchPersona) !== false;
                });
            }
            
            return $personas;
        } catch (\Exception $e) {
            \Log::error('Error al obtener personas elegibles: ' . $e->getMessage());
            return collect([]);
        }
    }
    
    public function getTotalPersonasSeleccionadasProperty()
    {
        return count($this->personasSeleccionadas);
    }
    
    // ============================================
    // RENDER
    // ============================================
    
    public function render()
    {
        return view('livewire.grupos-certificacion.crear-grupo-certificacion')
            ->layout('layouts.app');
    }
}
