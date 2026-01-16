# Integración: Crear Grupo de Certificación

**Versión**: 1.0  
**Fecha**: 2025-01-XX  
**Estado**: Implementación Completada

---

## 1. Archivos Creados

### 1.1 Componente Livewire

**Ruta**: `app/Livewire/GruposCertificacion/CrearGrupoCertificacion.php`

**Características**:
- ✅ Usa `GrupoCertificacionApplicationService` para crear grupos
- ✅ Usa `GrupoCertificacionService` para evaluar elegibilidad
- ✅ Preserva estado con query params
- ✅ Wizard de 4 pasos
- ✅ Campos dinámicos según tipo de certificado
- ✅ Filtrado de personas usando servicios de dominio

### 1.2 Vista Blade

**Ruta**: `resources/views/livewire/grupos-certificacion/crear-grupo-certificacion.blade.php`

**Características**:
- ✅ Usa sistema de diseño existente (Tailwind CSS + variables CSS)
- ✅ Wizard visual con indicadores de progreso
- ✅ Tabla de personas elegibles con búsqueda
- ✅ Manejo de estados de carga
- ✅ Mensajes de error y éxito

---

## 2. Ruta Temporal

### 2.1 Ruta Recomendada

Agregar en `routes/web.php`:

```php
// Ruta temporal para el nuevo componente (refactorizado)
Route::get('/grupos-certificacion/crear', function () {
    return view('livewire.grupos-certificacion.crear-grupo-certificacion-wrapper');
})->middleware(['auth'])->name('grupos.crear.nuevo');
```

### 2.2 Vista Wrapper (Opcional)

Si se necesita un wrapper, crear `resources/views/livewire/grupos-certificacion/crear-grupo-certificacion-wrapper.blade.php`:

```blade
@extends('layouts.app')

@section('content')
    @livewire('grupos-certificacion.crear-grupo-certificacion')
@endsection
```

**Nota**: Si el layout ya maneja Livewire automáticamente, se puede usar directamente:

```php
Route::get('/grupos-certificacion/crear', function () {
    return \Livewire\Volt\Volt::mount('grupos-certificacion.crear-grupo-certificacion');
})->middleware(['auth'])->name('grupos.crear.nuevo');
```

### 2.3 Ruta Actual (Legacy)

La ruta actual `/grupo-certificacion` sigue funcionando con el componente legacy `GrupoCertificacion.php`.

**No modificar** hasta que el nuevo componente esté validado.

---

## 3. Integración con Sistema Existente

### 3.1 Servicios Utilizados

El componente utiliza los siguientes servicios ya implementados:

1. **`GrupoCertificacionApplicationService`**
   - Método: `crearGrupo()`
   - Ubicación: `app/Application/Services/GrupoCertificacionApplicationService.php`
   - Estado: ✅ Implementado y validado

2. **`GrupoCertificacionService`**
   - Método: `evaluarGrupo()`
   - Ubicación: `app/Domain/Services/GrupoCertificacionService.php`
   - Estado: ✅ Implementado y validado

### 3.2 Modelos Utilizados

El componente utiliza los siguientes modelos Eloquent:

- `TipoDeCertificacion`: Para tipos de certificados
- `Proyecto`: Para proyectos (si aplica)
- `Evento`: Para eventos (si aplica)
- `Persona`: Para personas elegibles
- `Area`: Para áreas (si aplica)

**Todas las relaciones están definidas y funcionando.**

### 3.3 Autenticación y Autorización

**Middleware requerido**: `auth`

**Roles autorizados** (según documentación):
- Administrador
- Marketing

**Validación de autorización**: 
- Se debe agregar Policy o Gate si es necesario
- Por ahora, el middleware `auth` es suficiente para testing

### 3.4 Redirección Post-Creación

Después de crear el grupo exitosamente, el componente redirige a:

```php
route('grupos.show', $grupo->id)
```

**Nota**: Esta ruta debe existir. Si no existe, crear o modificar la redirección en el componente.

---

## 4. Dependencias

### 4.1 Dependencias de Laravel

- ✅ Laravel Framework (ya instalado)
- ✅ Livewire (ya instalado)
- ✅ Eloquent ORM (ya instalado)

### 4.2 Dependencias de Servicios

- ✅ `GrupoCertificacionApplicationService` (ya implementado)
- ✅ `GrupoCertificacionService` (ya implementado)
- ✅ `ElegibilidadCertificacionService` (usado internamente por GrupoCertificacionService)
- ✅ `EstadoPersonaService` (usado internamente)
- ✅ `TiempoMembresiaService` (usado internamente)

### 4.3 Dependencias de Base de Datos

**Tablas requeridas**:
- `tipos_de_certificacion`
- `proyectos`
- `eventos`
- `personas`
- `area_persona`
- `evento_persona`
- `area_persona_proyecto`
- `grupos_de_certificacion`

**Todas las tablas deben existir y tener datos de prueba.**

---

## 5. Consideraciones de Rendimiento

### 5.1 Carga de Personas Elegibles

**Optimización implementada**:
- Cache de personas elegibles (se recarga solo cuando cambia contexto)
- Búsqueda con debounce (300ms)
- Eager loading implícito en Eloquent

**Mejoras futuras**:
- Considerar paginación si hay muchas personas
- Considerar procesamiento en cola para grupos grandes (100+ personas)

### 5.2 Preservación de Estado

**Implementado**:
- Query params en URL
- Livewire properties (se preservan automáticamente)

**Limitaciones**:
- El estado se pierde al cerrar la sesión
- No se sincroniza entre pestañas

---

## 6. Testing Manual

### 6.1 Checklist de Validación

Ver archivo: `docs/checklist-validacion-crear-grupo.md`

### 6.2 Casos de Prueba Recomendados

1. **Flujo completo exitoso**:
   - Seleccionar tipo de certificado
   - Seleccionar contexto (si aplica)
   - Seleccionar personas
   - Crear grupo
   - Verificar redirección

2. **Validaciones**:
   - Intentar avanzar sin seleccionar tipo
   - Intentar avanzar sin seleccionar proyecto (si requiere)
   - Intentar crear grupo sin personas
   - Intentar crear grupo con personas no elegibles

3. **Campos dinámicos**:
   - Probar con tipo que requiere proyecto
   - Probar con tipo que requiere evento
   - Probar con tipo que requiere área
   - Probar con tipo sin contexto

4. **Filtrado de personas**:
   - Verificar que solo aparecen elegibles
   - Verificar que personas retiradas por bajo rendimiento no aparecen
   - Verificar filtrado por proyecto
   - Verificar filtrado por evento

5. **Preservación de estado**:
   - Recargar página y verificar que se mantiene el estado
   - Navegar hacia atrás y adelante
   - Verificar query params en URL

---

## 7. Migración del Componente Legacy

### 7.1 Estado Actual

**Componente legacy**: `app/Livewire/GrupoCertificacion.php`  
**Ruta legacy**: `/grupo-certificacion`

**Estado**: ✅ Funcional pero usa datos fake y lógica mezclada

### 7.2 Plan de Migración

**Fase 1: Testing del nuevo componente** (Actual)
- ✅ Componente creado
- ⏳ Testing manual
- ⏳ Validación con usuarios

**Fase 2: Reemplazo** (Futuro)
- Marcar componente legacy como deprecated
- Cambiar ruta `/grupo-certificacion` para usar nuevo componente
- Mantener componente legacy como backup temporal

**Fase 3: Eliminación** (Futuro)
- Eliminar componente legacy
- Eliminar vista legacy
- Actualizar documentación

---

## 8. Problemas Conocidos y Soluciones

### 8.1 Problema: Ruta de Redirección No Existe

**Síntoma**: Error 404 al crear grupo exitosamente

**Solución**: 
- Crear ruta `grupos.show` o
- Modificar redirección en componente a ruta existente

### 8.2 Problema: Personas No Se Cargan

**Síntoma**: Lista de personas vacía

**Posibles causas**:
- No hay personas en la base de datos
- No hay personas asociadas al proyecto/evento
- Error en relaciones de base de datos

**Solución**: Verificar datos de prueba y relaciones

### 8.3 Problema: Estado No Se Preserva

**Síntoma**: Al recargar, se pierde el estado

**Solución**: Verificar que query params se están actualizando correctamente

---

## 9. Próximos Pasos

1. ✅ Crear componente Livewire
2. ✅ Crear vista Blade
3. ⏳ Agregar ruta temporal
4. ⏳ Testing manual completo
5. ⏳ Validación con usuarios
6. ⏳ Reemplazar componente legacy
7. ⏳ Eliminar componente legacy

---

## 10. Referencias

- [Contrato de Aplicación](./contrato-aplicacion-crear-grupo-certificacion.md)
- [Propuesta de Refactorización](./propuesta-refactorizacion-livewire.md)
- [Dominio del Negocio](./dominio.md)
- [Flujo de Certificación](./flujo-certificacion.md)

---

**Fin de la Documentación de Integración**

