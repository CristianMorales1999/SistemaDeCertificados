# Propuesta de Refactorización: Capa Livewire y Presentación

**Versión**: 1.0  
**Fecha**: 2025-01-XX  
**Estado**: Propuesta Técnica

---

## 1. Diagnóstico de Problemas Estructurales

### 1.1 Problemas Identificados en Componentes Actuales

#### 1.1.1 Uso de Datos Fake

**Problema**: Múltiples componentes dependen de `DatosController` que contiene arrays hardcodeados.

**Componentes afectados**:
- `PersonasPost.php`: Usa `DatosController->personas` (array hardcodeado)
- `CertificadosPost.php`: Usa `DatosController->certificados` (array generado)
- `GruposPost.php`: Usa `DatosController->grupos_certificacion` (array hardcodeado)
- `ValidarCodigo.php`: Datos hardcodeados directamente en el componente

**Impacto**:
- ❌ No refleja datos reales de la base de datos
- ❌ No puede probarse con datos reales
- ❌ No respeta relaciones del dominio
- ❌ Imposible validar reglas de negocio

**Ejemplo problemático**:
```php
// app/Livewire/PersonasPost.php
public function mount()
{
    $datos = new DatosController();
    $this->datosPersonas = $datos->personas; // Array hardcodeado
}
```

#### 1.1.2 Lógica de Negocio Mezclada

**Problema**: Componentes Livewire instancian controladores directamente y mezclan lógica de presentación con lógica de negocio.

**Componentes afectados**:
- `GrupoCertificacion.php`: Instancia `ControllersGrupoCertificacion` en `mount()`
- `GeneracionCertificados.php`: Lógica compleja de validación y generación mezclada

**Impacto**:
- ❌ Viola separación de responsabilidades
- ❌ Dificulta testing
- ❌ No usa servicios de dominio/aplicación existentes
- ❌ Duplica lógica que ya existe en servicios

**Ejemplo problemático**:
```php
// app/Livewire/GrupoCertificacion.php
protected $grupoCertificacionController;

public function mount()
{
    $this->grupoCertificacionController = new ControllersGrupoCertificacion();
    $this->tiposCertificados = collect($this->grupoCertificacionController->tiposCertificados);
}
```

#### 1.1.3 Estado No Preservado

**Problema**: Los componentes no preservan estado entre requests (filtros, selecciones, contexto).

**Síntomas**:
- Filtros se pierden al navegar
- Selecciones de sidebar no se mantienen
- Contexto (proyecto, evento) se pierde
- Paginación se resetea

**Impacto**:
- ❌ Mala experiencia de usuario
- ❌ Pérdida de trabajo del usuario
- ❌ Necesidad de re-seleccionar datos constantemente

**Ejemplo problemático**:
```php
// No hay uso de session, query params, o Livewire properties persistentes
public $search = ''; // Se pierde al recargar
public $selectedGrupos = []; // Se pierde al navegar
```

#### 1.1.4 Relaciones de Base de Datos Inexistentes

**Problema**: Estructura de datos usada no coincide con modelos Eloquent reales.

**Ejemplo**:
```php
// DatosController usa estructura plana
['id' => 1, 'nombre' => 'Grupo X', 'tipo' => 'Certificado de voluntariado']

// Pero el modelo real es:
GrupoDeCertificacion {
    tipo_de_certificacion_id -> TipoDeCertificacion
    proyecto_id -> Proyecto (opcional)
    evento_id -> Evento (opcional)
}
```

**Impacto**:
- ❌ No puede usar relaciones Eloquent
- ❌ No puede aplicar eager loading
- ❌ No respeta estructura del dominio

#### 1.1.5 Validaciones Inconsistentes

**Problema**: Validaciones se hacen en múltiples lugares o no se hacen.

**Síntomas**:
- Validaciones en Livewire que deberían estar en servicios
- Validaciones faltantes (ej: elegibilidad de personas)
- Validaciones duplicadas

**Impacto**:
- ❌ Reglas de negocio no se aplican consistentemente
- ❌ Posibilidad de crear datos inválidos
- ❌ Difícil mantener consistencia

#### 1.1.6 No Usa Servicios de Dominio/Aplicación

**Problema**: Los componentes no usan los servicios ya implementados y validados.

**Servicios disponibles pero no usados**:
- `GrupoCertificacionApplicationService`
- `GrupoCertificacionService`
- `ElegibilidadCertificacionService`
- `EstadoPersonaService`
- `TiempoMembresiaService`

**Impacto**:
- ❌ Duplicación de lógica
- ❌ Reglas de negocio no se aplican
- ❌ Inconsistencia con el dominio validado

---

## 2. Arquitectura Livewire Objetivo

### 2.1 Principios de Diseño

#### 2.1.1 Separación de Responsabilidades

```
┌─────────────────────────────────────────────────────────┐
│                    Livewire Component                     │
│  Responsabilidades:                                       │
│  ✅ Manejo de estado de UI (filtros, selecciones)        │
│  ✅ Coordinación de eventos del usuario                    │
│  ✅ Llamadas a servicios de aplicación                   │
│  ✅ Preparación de datos para la vista                    │
│  ❌ NO lógica de negocio                                  │
│  ❌ NO validaciones de dominio                            │
│  ❌ NO acceso directo a modelos                           │
└──────────────────────┬──────────────────────────────────┘
                       │
                       ▼
┌─────────────────────────────────────────────────────────┐
│         Application Service (GrupoCertificacion...)      │
│  Responsabilidades:                                       │
│  ✅ Orquestación de casos de uso                         │
│  ✅ Validación de inputs                                  │
│  ✅ Llamadas a servicios de dominio                      │
│  ✅ Persistencia                                          │
└──────────────────────┬──────────────────────────────────┘
                       │
                       ▼
┌─────────────────────────────────────────────────────────┐
│              Domain Service (Elegibilidad...)            │
│  Responsabilidades:                                       │
│  ✅ Reglas de negocio                                     │
│  ✅ Validaciones de dominio                               │
│  ✅ Cálculos de negocio                                   │
└─────────────────────────────────────────────────────────┘
```

#### 2.1.2 Preservación de Estado

**Estrategias**:
1. **Livewire Properties**: Para estado de sesión (filtros, selecciones)
2. **Query Parameters**: Para estado compartible (búsquedas, paginación)
3. **Session**: Para estado temporal (mensajes, notificaciones)
4. **URL State**: Para deep linking (filtros aplicados)

#### 2.1.3 Uso de Modelos Eloquent

**Directrices**:
- ✅ Usar modelos Eloquent directamente
- ✅ Aplicar eager loading para evitar N+1
- ✅ Usar scopes para filtros comunes
- ✅ Respetar relaciones del dominio

### 2.2 Estructura de Componente Objetivo

```php
<?php

namespace App\Livewire\GruposCertificacion;

use App\Application\Services\GrupoCertificacionApplicationService;
use App\Models\TipoDeCertificacion;
use App\Models\Proyecto;
use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;

class CrearGrupoCertificacion extends Component
{
    use WithPagination;

    // ============================================
    // ESTADO DE UI (Preservado automáticamente)
    // ============================================
    
    // Selección de tipo de certificado
    public $tipoCertificacionId = null;
    public $tipoCertificacion = null;
    
    // Contexto condicional
    public $proyectoId = null;
    public $eventoId = null;
    public $areaId = null;
    
    // Personas seleccionadas
    public $personasSeleccionadas = [];
    
    // Filtros y búsqueda
    public $searchPersona = '';
    public $filtros = [];
    
    // UI State
    public $showModalPersonas = false;
    public $step = 1; // Paso actual del wizard
    
    // ============================================
    // SERVICIOS (Inyectados)
    // ============================================
    
    protected $grupoCertificacionService;
    
    public function boot()
    {
        $this->grupoCertificacionService = app(GrupoCertificacionApplicationService::class);
    }
    
    // ============================================
    // LIFECYCLE HOOKS
    // ============================================
    
    public function mount()
    {
        // Restaurar estado desde query params si existe
        $this->restoreStateFromQuery();
        
        // Cargar datos iniciales
        $this->loadInitialData();
    }
    
    // ============================================
    // EVENT HANDLERS (Coordinación)
    // ============================================
    
    public function updatedTipoCertificacionId($value)
    {
        // Cuando cambia el tipo, recargar contexto y personas
        $this->tipoCertificacion = TipoDeCertificacion::find($value);
        $this->resetContexto();
        $this->resetPersonas();
        $this->updateQueryParams();
    }
    
    public function updatedProyectoId($value)
    {
        // Cuando cambia el proyecto, recargar personas elegibles
        $this->loadPersonasElegibles();
        $this->updateQueryParams();
    }
    
    public function crearGrupo()
    {
        // Validar inputs básicos
        $this->validate([
            'tipoCertificacionId' => 'required|exists:tipos_de_certificacion,id',
            'personasSeleccionadas' => 'required|array|min:1',
        ]);
        
        // Preparar contexto
        $contexto = $this->buildContexto();
        
        // Llamar al servicio de aplicación
        $resultado = $this->grupoCertificacionService->crearGrupo(
            $this->tipoCertificacionId,
            $this->personasSeleccionadas,
            [
                'contexto' => $contexto,
                'usuario_creador_id' => auth()->id(),
                'nombre' => $this->nombre ?? null,
                'fecha_emision' => $this->fechaEmision ?? null,
            ]
        );
        
        // Manejar resultado
        if ($resultado['grupo_creado']) {
            session()->flash('success', $resultado['mensaje']);
            return redirect()->route('grupos.show', $resultado['grupo_creado']->id);
        } else {
            $this->addError('general', $resultado['mensaje']);
            // Mostrar detalles de no elegibles
            $this->mostrarDetallesNoElegibles($resultado['resultado_evaluacion']);
        }
    }
    
    // ============================================
    // MÉTODOS DE CARGA DE DATOS
    // ============================================
    
    public function loadPersonasElegibles()
    {
        if (!$this->tipoCertificacionId) {
            return;
        }
        
        // Usar servicio de dominio para obtener personas elegibles
        $tipo = TipoDeCertificacion::find($this->tipoCertificacionId);
        $contexto = $this->buildContexto();
        
        // Obtener todas las personas (o filtrar por contexto básico)
        $personas = Persona::query()
            ->when($this->proyectoId, function ($q) {
                // Filtrar por proyecto
            })
            ->when($this->eventoId, function ($q) {
                // Filtrar por evento
            })
            ->get();
        
        // Evaluar elegibilidad usando servicio de dominio
        $grupoService = app(\App\Domain\Services\GrupoCertificacionService::class);
        $resultado = $grupoService->evaluarGrupo($tipo, $personas->toArray(), $contexto);
        
        // Retornar solo elegibles
        return collect($resultado['elegibles'])
            ->pluck('persona')
            ->values();
    }
    
    // ============================================
    // MÉTODOS DE ESTADO
    // ============================================
    
    protected function restoreStateFromQuery()
    {
        $this->tipoCertificacionId = request()->query('tipo');
        $this->proyectoId = request()->query('proyecto');
        $this->eventoId = request()->query('evento');
    }
    
    protected function updateQueryParams()
    {
        $this->dispatch('update-url', [
            'tipo' => $this->tipoCertificacionId,
            'proyecto' => $this->proyectoId,
            'evento' => $this->eventoId,
        ]);
    }
    
    // ============================================
    // COMPUTED PROPERTIES
    // ============================================
    
    public function getTiposCertificadosProperty()
    {
        return TipoDeCertificacion::all();
    }
    
    public function getProyectosProperty()
    {
        return Proyecto::where('activo', true)->get();
    }
    
    public function getRequiereProyectoProperty()
    {
        if (!$this->tipoCertificacion) {
            return false;
        }
        
        return in_array($this->tipoCertificacion->nombre, [
            'Certificado de Director de Proyecto',
            'Certificado de Miembros Internos del Proyecto',
            // ... otros tipos
        ]);
    }
    
    public function getRequiereEventoProperty()
    {
        // Similar a requiereProyecto
    }
    
    // ============================================
    // RENDER
    // ============================================
    
    public function render()
    {
        return view('livewire.grupos-certificacion.crear-grupo-certificacion', [
            'personasElegibles' => $this->loadPersonasElegibles(),
        ]);
    }
}
```

### 2.3 Características Clave de la Arquitectura Objetivo

#### 2.3.1 Inyección de Dependencias

```php
// ✅ CORRECTO: Usar inyección de dependencias
protected $grupoCertificacionService;

public function boot()
{
    $this->grupoCertificacionService = app(GrupoCertificacionApplicationService::class);
}

// ❌ INCORRECTO: Instanciar directamente
public function mount()
{
    $this->service = new GrupoCertificacionApplicationService();
}
```

#### 2.3.2 Uso de Modelos Eloquent

```php
// ✅ CORRECTO: Usar modelos Eloquent
public function getTiposCertificadosProperty()
{
    return TipoDeCertificacion::all();
}

// ❌ INCORRECTO: Usar arrays hardcodeados
public function mount()
{
    $this->tiposCertificados = [['id' => 1, 'nombre' => '...']];
}
```

#### 2.3.3 Preservación de Estado

```php
// ✅ CORRECTO: Usar query params y Livewire properties
public $tipoCertificacionId = null; // Se preserva automáticamente

public function updatedTipoCertificacionId($value)
{
    $this->updateQueryParams(); // Sincronizar con URL
}

// ❌ INCORRECTO: Estado que se pierde
public $search = ''; // Sin sincronización
```

---

## 3. Estrategia de Migración Progresiva

### 3.1 Fase 1: Preparación (Semana 1)

#### 3.1.1 Eliminar Dependencias de Datos Fake

**Acciones**:
1. Identificar todos los usos de `DatosController`
2. Crear migración de datos reales si es necesario
3. Documentar qué datos fake se usan y para qué

**Componentes a modificar**:
- `PersonasPost.php`
- `CertificadosPost.php`
- `GruposPost.php`
- `ValidarCodigo.php`

**Resultado esperado**: Lista de componentes que dependen de datos fake.

#### 3.1.2 Crear Base de Componentes Refactorizados

**Acciones**:
1. Crear estructura de directorios:
   ```
   app/Livewire/
   ├── GruposCertificacion/
   │   ├── CrearGrupoCertificacion.php
   │   ├── ListarGruposCertificacion.php
   │   └── VerGrupoCertificacion.php
   ├── Personas/
   │   └── ListarPersonas.php
   └── Certificados/
       └── ValidarCodigo.php
   ```

2. Crear traits compartidos:
   ```
   app/Livewire/Traits/
   ├── WithStatePreservation.php
   ├── WithElegibilityFiltering.php
   └── WithContextualFields.php
   ```

**Resultado esperado**: Estructura base lista para migración.

### 3.2 Fase 2: Migración Vertical Slice (Semana 2-3)

#### 3.2.1 Migrar "Crear Grupo de Certificación"

**Componente actual**: `GrupoCertificacion.php`  
**Componente nuevo**: `GruposCertificacion/CrearGrupoCertificacion.php`

**Pasos**:
1. Crear nuevo componente siguiendo arquitectura objetivo
2. Implementar usando `GrupoCertificacionApplicationService`
3. Implementar filtrado dinámico de personas usando servicios de dominio
4. Implementar preservación de estado
5. Crear vista usando sistema de diseño
6. Testing manual completo
7. Reemplazar ruta antigua por nueva

**Criterios de éxito**:
- ✅ No usa datos fake
- ✅ Usa servicios de aplicación/dominio
- ✅ Preserva estado correctamente
- ✅ Filtra personas según reglas de elegibilidad
- ✅ Campos dinámicos funcionan según tipo de certificado

**Componente a conservar temporalmente**: `GrupoCertificacion.php` (marcado como deprecated)

### 3.3 Fase 3: Migración de Componentes Relacionados (Semana 4-5)

#### 3.3.1 Migrar Listado de Grupos

**Componente actual**: `GruposPost.php`  
**Componente nuevo**: `GruposCertificacion/ListarGruposCertificacion.php`

**Pasos similares a Fase 2**

#### 3.3.2 Migrar Validación de Código

**Componente actual**: `ValidarCodigo.php`  
**Componente nuevo**: `Certificados/ValidarCodigo.php`

**Cambios clave**:
- Eliminar datos hardcodeados
- Usar modelo `Certificado` real
- Implementar búsqueda por código único

### 3.4 Fase 4: Limpieza (Semana 6)

#### 3.4.1 Eliminar Componentes Deprecados

**Componentes a eliminar**:
- `GrupoCertificacion.php` (deprecado en Fase 2)
- `GruposPost.php` (deprecado en Fase 3)
- `PersonasPost.php` (si se migró)
- `CertificadosPost.php` (si se migró)

#### 3.4.2 Eliminar DatosController

**Acciones**:
1. Verificar que ningún componente lo use
2. Eliminar archivo `app/Http/Controllers/DatosController.php`
3. Actualizar documentación

### 3.5 Qué Se Conserva Temporalmente

**Componentes que NO se migran inmediatamente**:
- `GeneracionCertificados.php`: Muy complejo, requiere análisis detallado
- `GestionProyecto.php`: Funcionalidad secundaria
- `inputImagen.php`: Componente auxiliar, puede mantenerse

**Estrategia**: Marcar como "pendiente de refactorización" y migrar cuando sea necesario.

---

## 4. Lineamientos Claros

### 4.1 Qué NO Debe Vivir en Livewire

#### 4.1.1 Lógica de Negocio

```php
// ❌ INCORRECTO: Lógica de negocio en Livewire
public function crearGrupo()
{
    // Validar elegibilidad directamente
    if ($persona->areaPersonas()->count() < 1) {
        $this->addError('persona', 'No es miembro');
        return;
    }
    
    // Calcular tiempo de membresía
    $tiempo = $this->calcularTiempoMembresia($persona);
    if ($tiempo < 365) {
        $this->addError('persona', 'Tiempo insuficiente');
        return;
    }
    
    // Crear grupo
    GrupoDeCertificacion::create([...]);
}

// ✅ CORRECTO: Delegar a servicios
public function crearGrupo()
{
    $resultado = $this->grupoCertificacionService->crearGrupo(
        $this->tipoCertificacionId,
        $this->personasSeleccionadas,
        $opciones
    );
    
    if (!$resultado['grupo_creado']) {
        $this->addError('general', $resultado['mensaje']);
    }
}
```

#### 4.1.2 Validaciones de Dominio

```php
// ❌ INCORRECTO: Validaciones de dominio en Livewire
public function updatedTipoCertificacionId($value)
{
    $tipo = TipoDeCertificacion::find($value);
    if ($tipo->nombre === 'Egresado') {
        // Validar tiempo mínimo aquí
    }
}

// ✅ CORRECTO: Validaciones en servicios
public function updatedTipoCertificacionId($value)
{
    $this->tipoCertificacionId = $value;
    $this->loadPersonasElegibles(); // Servicio valida internamente
}
```

#### 4.1.3 Acceso Directo a Base de Datos Complejo

```php
// ❌ INCORRECTO: Queries complejos en Livewire
public function getPersonasElegiblesProperty()
{
    return Persona::whereHas('areaPersonas', function ($q) {
        $q->whereNull('fecha_fin')
          ->where('estado', '!=', 'Retiro por bajo rendimiento');
    })
    ->whereHas('proyectos', function ($q) {
        $q->where('id', $this->proyectoId);
    })
    ->get();
}

// ✅ CORRECTO: Usar servicios de dominio
public function getPersonasElegiblesProperty()
{
    $service = app(\App\Domain\Services\GrupoCertificacionService::class);
    $resultado = $service->evaluarGrupo($tipo, $personas, $contexto);
    return collect($resultado['elegibles'])->pluck('persona');
}
```

### 4.2 Qué SÍ Puede Vivir en Livewire

#### 4.2.1 Estado de UI

```php
// ✅ CORRECTO: Estado de UI en Livewire
public $showModal = false;
public $step = 1;
public $search = '';
public $filtros = [];
public $personasSeleccionadas = [];
```

#### 4.2.2 Coordinación de Eventos

```php
// ✅ CORRECTO: Coordinación de eventos
public function updatedTipoCertificacionId($value)
{
    $this->tipoCertificacionId = $value;
    $this->resetContexto();
    $this->loadPersonasElegibles();
    $this->updateQueryParams();
}

public function toggleModal()
{
    $this->showModal = !$this->showModal;
}
```

#### 4.2.3 Validaciones de Formulario Básicas

```php
// ✅ CORRECTO: Validaciones de formulario básicas
public function crearGrupo()
{
    $this->validate([
        'tipoCertificacionId' => 'required|exists:tipos_de_certificacion,id',
        'personasSeleccionadas' => 'required|array|min:1',
        'proyectoId' => 'required_if:tipoCertificacionId,5|exists:proyectos,id',
    ]);
    
    // Luego delegar a servicio
}
```

#### 4.2.4 Preparación de Datos para Vista

```php
// ✅ CORRECTO: Preparación de datos para vista
public function render()
{
    return view('livewire.grupos-certificacion.crear', [
        'tiposCertificados' => TipoDeCertificacion::all(),
        'proyectos' => Proyecto::where('activo', true)->get(),
        'personasElegibles' => $this->loadPersonasElegibles(),
    ]);
}
```

#### 4.2.5 Computed Properties Simples

```php
// ✅ CORRECTO: Computed properties simples
public function getRequiereProyectoProperty()
{
    if (!$this->tipoCertificacion) {
        return false;
    }
    
    return in_array($this->tipoCertificacion->nombre, [
        'Certificado de Director de Proyecto',
        // ...
    ]);
}
```

---

## 5. Aplicación Específica: "Crear Grupo de Certificación"

### 5.1 Componente Actual vs. Componente Objetivo

#### 5.1.1 Componente Actual (`GrupoCertificacion.php`)

**Problemas identificados**:
1. ❌ Usa `ControllersGrupoCertificacion` (lógica mezclada)
2. ❌ No preserva estado
3. ❌ No filtra personas por elegibilidad
4. ❌ No valida contexto según tipo de certificado
5. ❌ No usa servicios de dominio/aplicación

#### 5.1.2 Componente Objetivo (`GruposCertificacion/CrearGrupoCertificacion.php`)

**Características**:
1. ✅ Usa `GrupoCertificacionApplicationService`
2. ✅ Preserva estado con query params
3. ✅ Filtra personas usando `GrupoCertificacionService`
4. ✅ Campos dinámicos según tipo de certificado
5. ✅ Valida usando servicios de dominio

### 5.2 Estructura del Componente Refactorizado

```php
<?php

namespace App\Livewire\GruposCertificacion;

use App\Application\Services\GrupoCertificacionApplicationService;
use App\Domain\Services\GrupoCertificacionService;
use App\Models\TipoDeCertificacion;
use App\Models\Proyecto;
use App\Models\Evento;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class CrearGrupoCertificacion extends Component
{
    use WithPagination;

    // ============================================
    // PROPIEDADES PÚBLICAS (Estado de UI)
    // ============================================
    
    // Paso 1: Selección de tipo
    public $tipoCertificacionId = null;
    
    // Paso 2: Contexto (condicional)
    public $proyectoId = null;
    public $eventoId = null;
    public $areaId = null;
    
    // Paso 3: Selección de personas
    public $personasSeleccionadas = [];
    public $searchPersona = '';
    
    // Paso 4: Configuración adicional
    public $nombre = null;
    public $fechaEmision = null;
    
    // Estado de UI
    public $step = 1;
    public $showModalPersonas = false;
    public $loading = false;
    public $errors = [];
    
    // ============================================
    // SERVICIOS
    // ============================================
    
    protected $grupoCertificacionApplicationService;
    protected $grupoCertificacionService;
    
    public function boot()
    {
        $this->grupoCertificacionApplicationService = app(GrupoCertificacionApplicationService::class);
        $this->grupoCertificacionService = app(GrupoCertificacionService::class);
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
        
        // Si hay tipo seleccionado, avanzar al paso 2
        if ($this->tipoCertificacionId) {
            $this->step = 2;
        }
    }
    
    // ============================================
    // EVENT HANDLERS
    // ============================================
    
    public function updatedTipoCertificacionId($value)
    {
        $this->tipoCertificacionId = $value;
        $this->resetContexto();
        $this->resetPersonas();
        $this->step = 2;
        $this->updateQueryParams();
    }
    
    public function updatedProyectoId($value)
    {
        $this->proyectoId = $value;
        $this->resetPersonas();
        $this->updateQueryParams();
        $this->loadPersonasElegibles();
    }
    
    public function updatedEventoId($value)
    {
        $this->eventoId = $value;
        $this->resetPersonas();
        $this->updateQueryParams();
        $this->loadPersonasElegibles();
    }
    
    public function siguientePaso()
    {
        if ($this->step === 1) {
            $this->validate(['tipoCertificacionId' => 'required|exists:tipos_de_certificacion,id']);
            $this->step = 2;
        } elseif ($this->step === 2) {
            if ($this->requiereProyecto) {
                $this->validate(['proyectoId' => 'required|exists:proyectos,id']);
            }
            if ($this->requiereEvento) {
                $this->validate(['eventoId' => 'required|exists:eventos,id']);
            }
            $this->step = 3;
        } elseif ($this->step === 3) {
            $this->validate(['personasSeleccionadas' => 'required|array|min:1']);
            $this->step = 4;
        }
    }
    
    public function pasoAnterior()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }
    
    public function crearGrupo()
    {
        $this->loading = true;
        
        // Validar inputs básicos
        $this->validate([
            'tipoCertificacionId' => 'required|exists:tipos_de_certificacion,id',
            'personasSeleccionadas' => 'required|array|min:1',
        ]);
        
        // Preparar contexto
        $contexto = [];
        if ($this->proyectoId) {
            $contexto['proyecto'] = $this->proyectoId;
        }
        if ($this->eventoId) {
            $contexto['evento'] = $this->eventoId;
        }
        if ($this->areaId) {
            $contexto['area'] = $this->areaId;
        }
        
        // Llamar al servicio de aplicación
        $resultado = $this->grupoCertificacionApplicationService->crearGrupo(
            $this->tipoCertificacionId,
            $this->personasSeleccionadas,
            [
                'contexto' => $contexto,
                'usuario_creador_id' => auth()->id(),
                'nombre' => $this->nombre,
                'fecha_emision' => $this->fechaEmision,
            ]
        );
        
        $this->loading = false;
        
        // Manejar resultado
        if ($resultado['grupo_creado']) {
            session()->flash('success', $resultado['mensaje']);
            return redirect()->route('grupos.show', $resultado['grupo_creado']->id);
        } else {
            $this->addError('general', $resultado['mensaje']);
            // Mostrar detalles de no elegibles
            if (isset($resultado['resultado_evaluacion']['no_elegibles'])) {
                $this->mostrarDetallesNoElegibles($resultado['resultado_evaluacion']['no_elegibles']);
            }
        }
    }
    
    // ============================================
    // MÉTODOS DE CARGA DE DATOS
    // ============================================
    
    public function loadPersonasElegibles()
    {
        if (!$this->tipoCertificacionId) {
            return collect([]);
        }
        
        $this->loading = true;
        
        try {
            $tipo = TipoDeCertificacion::find($this->tipoCertificacionId);
            if (!$tipo) {
                return collect([]);
            }
            
            // Preparar contexto
            $contexto = [];
            if ($this->proyectoId) {
                $contexto['proyecto'] = $this->proyectoId;
            }
            if ($this->eventoId) {
                $contexto['evento'] = $this->eventoId;
            }
            
            // Obtener personas base (filtrar por contexto básico si aplica)
            $personasQuery = Persona::query();
            
            if ($this->proyectoId) {
                // Filtrar personas asociadas al proyecto
                $personasQuery->whereHas('proyectos', function ($q) {
                    $q->where('proyectos.id', $this->proyectoId);
                });
            }
            
            if ($this->eventoId) {
                // Filtrar personas asociadas al evento
                $personasQuery->whereHas('eventos', function ($q) {
                    $q->where('eventos.id', $this->eventoId);
                });
            }
            
            $personas = $personasQuery->get();
            
            // Evaluar elegibilidad usando servicio de dominio
            $resultado = $this->grupoCertificacionService->evaluarGrupo(
                $tipo,
                $personas->toArray(),
                $contexto
            );
            
            // Retornar solo elegibles
            $elegibles = collect($resultado['elegibles'])
                ->pluck('persona')
                ->values();
            
            // Aplicar búsqueda si existe
            if ($this->searchPersona) {
                $elegibles = $elegibles->filter(function ($persona) {
                    $nombreCompleto = $persona->nombres . ' ' . $persona->apellidos;
                    return stripos($nombreCompleto, $this->searchPersona) !== false ||
                           stripos($persona->dni, $this->searchPersona) !== false;
                });
            }
            
            return $elegibles;
        } finally {
            $this->loading = false;
        }
    }
    
    // ============================================
    // MÉTODOS AUXILIARES
    // ============================================
    
    protected function resetContexto()
    {
        $this->proyectoId = null;
        $this->eventoId = null;
        $this->areaId = null;
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
        
        $this->dispatch('update-url', $params);
    }
    
    protected function mostrarDetallesNoElegibles($noElegibles)
    {
        foreach ($noElegibles as $item) {
            $persona = $item['persona'];
            $motivo = $item['detalle_elegibilidad']['motivo'];
            $this->addError('personas.' . $persona->id, $motivo);
        }
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
    
    public function getProyectosProperty()
    {
        return Proyecto::where('activo', true)->orderBy('nombre')->get();
    }
    
    public function getEventosProperty()
    {
        $query = Evento::where('activo', true);
        
        // Si hay proyecto seleccionado, filtrar eventos del proyecto
        if ($this->proyectoId) {
            $query->where('proyecto_id', $this->proyectoId);
        }
        
        return $query->orderBy('nombre')->get();
    }
    
    public function getRequiereProyectoProperty()
    {
        if (!$this->tipoCertificacion) {
            return false;
        }
        
        return in_array($this->tipoCertificacion->nombre, [
            'Certificado de Director de Proyecto',
            'Certificado de Co-Director de Proyecto',
            'Certificado de Coordinador de Proyecto',
            'Certificado de Miembros Internos del Proyecto',
            'Certificado de Miembros Externos del Proyecto',
            'Certificado de Staff Interno de Apoyo de Proyecto',
            'Certificado de Staff Externo de Apoyo de Proyecto',
            'Certificado de Participación como Ponente para Proyecto',
            'Certificado de Participación en Evento de Proyecto',
            'Certificado de Participación en Ejecución de Proyecto',
        ]);
    }
    
    public function getRequiereEventoProperty()
    {
        if (!$this->tipoCertificacion) {
            return false;
        }
        
        return in_array($this->tipoCertificacion->nombre, [
            'Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT',
            'Certificado de Participación como Ponente para Proyecto',
            'Certificado de Participación en Evento General de SEDIPRO UNT',
            'Certificado de Participación en Evento de Proyecto',
        ]);
    }
    
    public function getRequiereAreaProperty()
    {
        if (!$this->tipoCertificacion) {
            return false;
        }
        
        return $this->tipoCertificacion->nombre === 'Certificado de Directiva';
    }
    
    public function getPersonasElegiblesProperty()
    {
        return $this->loadPersonasElegibles();
    }
    
    // ============================================
    // RENDER
    // ============================================
    
    public function render()
    {
        return view('livewire.grupos-certificacion.crear-grupo-certificacion');
    }
}
```

### 5.3 Vista Correspondiente (Estructura)

```blade
{{-- resources/views/livewire/grupos-certificacion/crear-grupo-certificacion.blade.php --}}

<div>
    {{-- Wizard Steps --}}
    <div class="wizard-steps">
        <div class="step {{ $step >= 1 ? 'active' : '' }}">1. Tipo de Certificado</div>
        <div class="step {{ $step >= 2 ? 'active' : '' }}">2. Contexto</div>
        <div class="step {{ $step >= 3 ? 'active' : '' }}">3. Personas</div>
        <div class="step {{ $step >= 4 ? 'active' : '' }}">4. Configuración</div>
    </div>
    
    {{-- Step 1: Tipo de Certificado --}}
    @if($step === 1)
        <div>
            <label>Tipo de Certificado</label>
            <select wire:model.live="tipoCertificacionId">
                <option value="">Seleccione un tipo</option>
                @foreach($this->tiposCertificados as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            @error('tipoCertificacionId') <span>{{ $message }}</span> @enderror
        </div>
    @endif
    
    {{-- Step 2: Contexto (Condicional) --}}
    @if($step === 2)
        @if($this->requiereProyecto)
            <div>
                <label>Proyecto *</label>
                <select wire:model.live="proyectoId">
                    <option value="">Seleccione un proyecto</option>
                    @foreach($this->proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
                @error('proyectoId') <span>{{ $message }}</span> @enderror
            </div>
        @endif
        
        @if($this->requiereEvento)
            <div>
                <label>Evento *</label>
                <select wire:model.live="eventoId">
                    <option value="">Seleccione un evento</option>
                    @foreach($this->eventos as $evento)
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                    @endforeach
                </select>
                @error('eventoId') <span>{{ $message }}</span> @enderror
            </div>
        @endif
    @endif
    
    {{-- Step 3: Selección de Personas --}}
    @if($step === 3)
        <div>
            <input type="text" wire:model.live.debounce.300ms="searchPersona" placeholder="Buscar persona...">
            
            @if($loading)
                <div>Cargando personas elegibles...</div>
            @else
                <div>
                    @foreach($this->personasElegibles as $persona)
                        <div>
                            <input 
                                type="checkbox" 
                                wire:model="personasSeleccionadas" 
                                value="{{ $persona->id }}"
                            >
                            {{ $persona->nombres }} {{ $persona->apellidos }} ({{ $persona->dni }})
                        </div>
                    @endforeach
                </div>
            @endif
            
            @error('personasSeleccionadas') <span>{{ $message }}</span> @enderror
        </div>
    @endif
    
    {{-- Step 4: Configuración --}}
    @if($step === 4)
        <div>
            <label>Nombre del Grupo (opcional)</label>
            <input type="text" wire:model="nombre">
            
            <label>Fecha de Emisión (opcional)</label>
            <input type="date" wire:model="fechaEmision">
        </div>
    @endif
    
    {{-- Navegación --}}
    <div>
        @if($step > 1)
            <button wire:click="pasoAnterior">Anterior</button>
        @endif
        
        @if($step < 4)
            <button wire:click="siguientePaso">Siguiente</button>
        @else
            <button wire:click="crearGrupo" wire:loading.attr="disabled">
                <span wire:loading.remove>Crear Grupo</span>
                <span wire:loading>Creando...</span>
            </button>
        @endif
    </div>
</div>
```

### 5.4 Checklist de Implementación

- [ ] Crear componente `CrearGrupoCertificacion.php`
- [ ] Implementar preservación de estado con query params
- [ ] Implementar filtrado dinámico de personas usando servicios
- [ ] Implementar campos condicionales según tipo de certificado
- [ ] Crear vista con wizard de pasos
- [ ] Integrar con sistema de diseño
- [ ] Testing manual completo
- [ ] Reemplazar ruta antigua
- [ ] Marcar componente antiguo como deprecated
- [ ] Documentar cambios

---

## 6. Resumen y Próximos Pasos

### 6.1 Resumen de la Propuesta

**Problemas identificados**:
1. ✅ Uso de datos fake (`DatosController`)
2. ✅ Lógica mezclada (controladores en Livewire)
3. ✅ Estado no preservado
4. ✅ Relaciones de BD inexistentes
5. ✅ No usa servicios de dominio/aplicación

**Solución propuesta**:
1. ✅ Arquitectura clara con separación de responsabilidades
2. ✅ Uso de servicios de aplicación/dominio
3. ✅ Preservación de estado con query params
4. ✅ Uso de modelos Eloquent
5. ✅ Migración progresiva sin romper funcionalidad

### 6.2 Próximos Pasos Inmediatos

1. **Revisar y aprobar esta propuesta**
2. **Crear estructura de directorios** (Fase 1)
3. **Implementar componente "Crear Grupo de Certificación"** (Fase 2)
4. **Testing y validación**
5. **Migrar componentes relacionados** (Fase 3)

### 6.3 Métricas de Éxito

- ✅ 0 componentes usando `DatosController`
- ✅ 100% de componentes usando servicios de aplicación/dominio
- ✅ Estado preservado en todos los componentes críticos
- ✅ Filtrado de personas según reglas de elegibilidad funcionando
- ✅ Campos dinámicos funcionando según tipo de certificado

---

**Fin de la Propuesta de Refactorización**

