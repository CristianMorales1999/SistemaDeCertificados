# Estándar: Layouts Híbridos (Blade + Livewire)

**Versión**: 1.0  
**Fecha**: 2025-01-XX  
**Estado**: ✅ Estándar Aprobado

---

## 1. Contexto y Justificación

### 1.1 Situación Actual

El proyecto SEDICERT está en un proceso de **refactorización progresiva** donde:

- ✅ **Vistas Blade clásicas** siguen funcionando y no deben romperse
- ✅ **Componentes Livewire** se están introduciendo gradualmente
- ✅ **Ambos sistemas deben coexistir** sin conflictos

### 1.2 Problema Resuelto

**Problema original**: Livewire Page Components intentaban usar `components.layouts.app` por defecto, que no existe en el proyecto.

**Solución**: Convertir `layouts/app.blade.php` en un **layout híbrido** que soporte ambos sistemas.

---

## 2. Estándar de Layout Híbrido

### 2.1 Implementación

El layout `resources/views/layouts/app.blade.php` debe usar la siguiente estructura:

```blade
<main>
    {{-- Layout híbrido: soporta tanto Livewire ($slot) como Blade clásico (@yield) --}}
    {{-- Prioridad: $slot (Livewire) > @yield (Blade clásico) --}}
    @if(isset($slot) && !empty($slot))
        {{ $slot }}
    @else
        @yield('content')
    @endif
</main>
```

### 2.2 Lógica de Prioridad

1. **Si existe `$slot` y no está vacío** → Usar `$slot` (Livewire)
2. **Si no hay `$slot`** → Usar `@yield('content')` (Blade clásico)

**Razón**: Livewire inyecta contenido en `$slot` cuando se usa `->layout()`. Las vistas Blade clásicas usan `@section('content')` que se renderiza con `@yield('content')`.

### 2.3 Compatibilidad

✅ **Vistas Blade clásicas** siguen funcionando:
```blade
@extends('layouts.app')
@section('content')
    <!-- Contenido -->
@endsection
```

✅ **Componentes Livewire** funcionan correctamente:
```php
public function render()
{
    return view('livewire.mi-componente')
        ->layout('layouts.app');
}
```

---

## 3. Uso en Componentes Livewire

### 3.1 Estándar para Livewire Page Components

**Todos los componentes Livewire que actúan como páginas completas** deben:

1. ✅ Especificar explícitamente el layout usando `->layout('layouts.app')`
2. ✅ **NO usar** `->section('content')` (no es necesario con el layout híbrido)
3. ✅ **NO depender** de layouts por defecto de Livewire

**Ejemplo correcto**:
```php
<?php

namespace App\Livewire\MiModulo;

use Livewire\Component;

class MiComponente extends Component
{
    public function render()
    {
        return view('livewire.mi-modulo.mi-componente')
            ->layout('layouts.app');
    }
}
```

### 3.2 Componentes Livewire Anidados

**Componentes Livewire que se usan dentro de otras vistas** (no como páginas completas):

- ✅ **NO necesitan** especificar layout
- ✅ Se renderizan directamente en la vista padre

**Ejemplo**:
```blade
{{-- Vista Blade --}}
@extends('layouts.app')
@section('content')
    @livewire('mi-componente-anidado')
@endsection
```

---

## 4. Layouts Existentes

### 4.1 Layouts que NO se Modifican

Los siguientes layouts **NO deben modificarse** y mantienen su estructura original:

- ✅ `layouts/auth.blade.php` - Solo para autenticación
- ✅ `components/auth/simple.blade.php` - Componente de autenticación

**Razón**: Estos layouts tienen un propósito específico y no necesitan soportar Livewire.

### 4.2 Layout Principal

**Único layout modificado**: `layouts/app.blade.php`

**Razón**: Es el layout principal usado por la mayoría de las vistas del sistema.

---

## 5. Migración de Vistas Legacy

### 5.1 Estrategia

Cuando se migre una vista Blade clásica a Livewire:

1. ✅ **Crear nuevo componente Livewire** (no modificar vista existente)
2. ✅ **Usar layout híbrido** con `->layout('layouts.app')`
3. ✅ **Mantener vista legacy** hasta validación completa
4. ✅ **Reemplazar ruta** cuando el nuevo componente esté validado
5. ✅ **Eliminar vista legacy** después de período de transición

### 5.2 Ejemplo de Migración

**Antes (Blade clásico)**:
```blade
{{-- resources/views/mi-vista.blade.php --}}
@extends('layouts.app')
@section('content')
    <h1>Mi Vista</h1>
@endsection
```

**Después (Livewire)**:
```php
{{-- app/Livewire/MiModulo/MiVista.php --}}
public function render()
{
    return view('livewire.mi-modulo.mi-vista')
        ->layout('layouts.app');
}
```

**Ruta temporal**:
```php
// Ruta nueva (temporal)
Route::get('/mi-vista-nueva', \App\Livewire\MiModulo\MiVista::class)
    ->middleware(['auth'])
    ->name('mi-vista.nueva');

// Ruta legacy (mantener hasta validación)
Route::get('/mi-vista', function () {
    return view('mi-vista');
})->name('mi-vista');
```

---

## 6. Ventajas del Layout Híbrido

### 6.1 Compatibilidad

- ✅ **No rompe vistas existentes**: Todas las vistas Blade clásicas siguen funcionando
- ✅ **Soporta Livewire**: Componentes Livewire funcionan correctamente
- ✅ **Migración gradual**: Permite refactorización sin presión

### 6.2 Mantenibilidad

- ✅ **Un solo layout**: No necesitamos layouts separados para Blade y Livewire
- ✅ **Código claro**: La lógica de prioridad es explícita y fácil de entender
- ✅ **Estándar consistente**: Todos los componentes Livewire usan el mismo patrón

### 6.3 Flexibilidad

- ✅ **Coexistencia**: Ambos sistemas pueden coexistir indefinidamente
- ✅ **Sin dependencias**: No requiere cambios en vistas existentes
- ✅ **Fácil testing**: Se puede probar cada sistema independientemente

---

## 7. Checklist para Nuevos Componentes Livewire

Al crear un nuevo componente Livewire que actúe como página completa:

- [ ] Componente extiende `Livewire\Component`
- [ ] Método `render()` especifica `->layout('layouts.app')`
- [ ] **NO usa** `->section('content')` (no necesario)
- [ ] Vista Blade está en la estructura correcta
- [ ] Ruta especifica el componente directamente o usa wrapper
- [ ] Middleware de autenticación aplicado (si es necesario)

**Ejemplo de checklist completo**:
```php
<?php

namespace App\Livewire\MiModulo;

use Livewire\Component;

class MiComponente extends Component
{
    // ✅ Extiende Component
    // ✅ Propiedades públicas para estado
    
    public function render()
    {
        // ✅ Especifica layout explícitamente
        // ✅ NO usa ->section()
        return view('livewire.mi-modulo.mi-componente')
            ->layout('layouts.app');
    }
}
```

---

## 8. Troubleshooting

### 8.1 Error: MissingLayoutException

**Síntoma**: `Livewire\Exceptions\MissingLayoutException`

**Causa**: Componente Livewire no especifica layout o layout no existe.

**Solución**: 
- Agregar `->layout('layouts.app')` en método `render()`
- Verificar que `layouts/app.blade.php` existe

### 8.2 Contenido Duplicado

**Síntoma**: El contenido aparece dos veces en la página.

**Causa**: Uso incorrecto de `->section('content')` con layout híbrido.

**Solución**: 
- Remover `->section('content')`
- Usar solo `->layout('layouts.app')`

### 8.3 Layout No Se Aplica

**Síntoma**: El componente se renderiza sin layout (sin header/footer).

**Causa**: Layout no especificado o ruta incorrecta.

**Solución**:
- Verificar que `->layout('layouts.app')` está presente
- Verificar que la ruta apunta al componente correctamente

---

## 9. Referencias

### 9.1 Archivos Relacionados

- `resources/views/layouts/app.blade.php` - Layout híbrido principal
- `app/Livewire/GruposCertificacion/CrearGrupoCertificacion.php` - Ejemplo de implementación

### 9.2 Documentación Relacionada

- [Propuesta de Refactorización](./propuesta-refactorizacion-livewire.md)
- [Integración: Crear Grupo de Certificación](./integracion-crear-grupo-certificacion.md)

---

## 10. Conclusión

El layout híbrido permite:

✅ **Coexistencia pacífica** entre Blade clásico y Livewire  
✅ **Migración gradual** sin romper funcionalidad existente  
✅ **Estándar claro** para futuras implementaciones  
✅ **Mantenibilidad** con un solo layout para ambos sistemas  

**Este estándar debe seguirse en todas las futuras migraciones y nuevos componentes Livewire.**

---

**Fin del Estándar de Layouts Híbridos**

