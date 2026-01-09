# Informe de Auditoría Técnica - SEDICERT

**Fecha**: 2025  
**Proyecto**: SEDICERT – Sistema de Generación y Validación de Certificados  
**Versión del Código Auditado**: Laravel 12 (proyecto existente con avances funcionales)

---

## A. Resumen Ejecutivo

### Nivel General de Alineación: **MEDIO-BAJO**

El proyecto presenta una **base funcional sólida** con modelos bien estructurados y relaciones correctas, pero muestra **desalineaciones significativas** con la documentación en áreas críticas de seguridad, validación de reglas de negocio y sistema de diseño.

### Principales Riesgos Detectados

1. **🔴 CRÍTICO**: Ausencia total de validación de reglas del estatuto institucional
2. **🔴 CRÍTICO**: Falta de sistema de autorización (Policies/Gates) para control de acceso
3. **🟡 ALTO**: Uso masivo de colores hardcodeados en vistas, violando sistema de diseño
4. **🟡 ALTO**: Validación pública de certificados con datos mock, no funcional
5. **🟡 MEDIO**: Falta de campo para identificar personas retiradas por bajo rendimiento

### Módulos Más Críticos

1. **Generación de Certificados** (`app/Livewire/GeneracionCertificados.php`, `app/Http/Controllers/ProyectoController.php`)
2. **Validación Pública** (`app/Livewire/ValidarCodigo.php`)
3. **Sistema de Autorización** (inexistente)
4. **Vistas Blade** (múltiples archivos con colores hardcodeados)

---

## B. Hallazgos por Categoría

### 1. Dominio y Modelos

#### ✅ **Alineado**

- **Separación Persona/User**: Correctamente implementada
  - `Persona` puede existir sin `User` (relación `hasOne` opcional)
  - `User` siempre está asociado a `Persona` (relación `belongsTo`)
  - Archivos: `app/Models/Persona.php` (línea 67-70), `app/Models/User.php` (línea 86-89)

- **Estructura de Historial**: Tablas históricas bien diseñadas
  - `area_persona` con `fecha_inicio` y `fecha_fin` (permite historial)
  - `area_persona_cargo` con timestamps y fechas
  - Archivos: `app/Models/AreaPersona.php`, `app/Models/AreaPersonaCargo.php`

- **Entidades Clave Existentes**: Todas las entidades del dominio están presentes
  - Persona, User, Certificado, GrupoDeCertificacion, Area, Cargo, Proyecto, Evento, TipoDeCertificacion
  - Relaciones bien definidas entre modelos

#### ⚠️ **Parcialmente Alineado**

- **Modelo Certificado**: Falta relación con `TipoDeCertificacion`
  - `Certificado` no tiene relación directa con `TipoDeCertificacion`
  - Solo se accede a través de `GrupoDeCertificacion`
  - Archivo: `app/Models/Certificado.php` (líneas 39-50)
  - **Impacto**: Dificulta consultas directas por tipo de certificado

- **Nomenclatura Inconsistente**: 
  - `Certificado::person()` debería ser `persona()` según dominio
  - Archivo: `app/Models/Certificado.php` (línea 46)

#### ❌ **No Alineado**

- **Estado de Retiro por Bajo Rendimiento**: **EXISTE PERO NO SE USA**
  - El estado **SÍ existe** como parte del historial en `area_persona`
  - Forma parte del dominio institucional
  - **Problema**: No se usa como criterio de elegibilidad ni se valida activamente
  - **Impacto CRÍTICO**: No se filtra ni valida esta regla del estatuto durante la generación

- **Validación de Tiempo Mínimo de Membresía**: **NO IMPLEMENTADA**
  - El historial en `area_persona` permite calcular el tiempo de membresía
  - **Problema**: No existe lógica explícita para calcular tiempo de membresía
  - No hay validación formal para certificados de Egresado/Retiro Voluntario
  - **Impacto CRÍTICO**: Se pueden generar certificados violando el estatuto

---

### 2. Autenticación, Roles y Permisos

#### ✅ **Alineado**

- **Estructura Multi-Rol**: Correctamente implementada
  - Tabla `user_rol` con timestamps (permite historial)
  - Relación `belongsToMany` entre User y Rol
  - Archivos: `app/Models/User.php` (línea 68-72), `app/Models/Rol.php` (línea 36-39)

#### ❌ **No Alineado**

- **Sistema de Policies**: **NO EXISTE**
  - No existe carpeta `app/Policies/`
  - No hay `CertificadoPolicy`, `GrupoDeCertificacionPolicy`, etc.
  - **Impacto CRÍTICO**: Sin control de acceso granular

- **Gates**: **NO IMPLEMENTADOS**
  - No se encontraron Gates definidos
  - No hay validación de permisos por acción

- **Middleware de Autorización**: **INSUFICIENTE**
  - Solo existe `auth` y `verified` en rutas básicas
  - No hay middleware para roles específicos
  - Archivo: `routes/web.php` (líneas 52, 55)
  - **Impacto CRÍTICO**: Cualquier usuario autenticado puede acceder a todo

- **Validación de Permisos en Controladores/Livewire**: **AUSENTE**
  - `ProyectoController` no valida roles antes de generar certificados
  - `GeneracionCertificados` no verifica permisos
  - Archivos: `app/Http/Controllers/ProyectoController.php`, `app/Livewire/GeneracionCertificados.php`

- **Método `hasRole()` en User**: **NO EXISTE**
  - Modelo `User` no tiene método para verificar roles
  - Documentación espera `$user->hasRole(['admin', 'marketing'])`
  - Archivo: `app/Models/User.php`

---

### 3. Flujo de Certificación

#### ✅ **Alineado**

- **Concepto de Grupo de Certificación**: Existe y está implementado
  - Modelo `GrupoDeCertificacion` con relaciones correctas
  - Archivo: `app/Models/GrupoDeCertificacion.php`

- **Generación de Códigos Únicos**: Implementada
  - Campo `codigo` en tabla `certificados`
  - Archivo: `app/Models/Certificado.php` (línea 28)

- **Generación de QR**: Implementada
  - Campo `ruta_qr` en tabla `certificados`
  - Uso de `simplesoftwareio/simple-qrcode`
  - Archivo: `app/Http/Controllers/ProyectoController.php` (línea 13)

#### ⚠️ **Parcialmente Alineado**

- **Flujo de Generación**: Existe pero incompleto
  - `GeneracionCertificados` tiene lógica de generación
  - Falta validación previa de reglas del estatuto
  - Archivo: `app/Livewire/GeneracionCertificados.php`

- **Selección de Personas**: Implementada pero sin filtros
  - No filtra personas retiradas por bajo rendimiento
  - No valida tiempo mínimo de membresía
  - Archivo: `app/Livewire/GeneracionCertificados.php` (líneas 275-297)

#### ❌ **No Alineado**

- **Validación de Reglas del Estatuto**: **NO IMPLEMENTADA**
  - No valida tiempo mínimo de 1 año para Egresado/Retiro Voluntario (aunque el historial permite calcularlo)
  - No filtra personas retiradas por bajo rendimiento (aunque el estado existe en `area_persona`)
  - No valida elegibilidad según tipo de certificado (miembros vs externos)
  - **Impacto CRÍTICO**: Violación de reglas institucionales
  - **Nota**: El problema es de **implementación de reglas**, no de ausencia de datos

- **Validación Pública**: **NO FUNCIONAL**
  - `ValidarCodigo` usa datos mock hardcodeados
  - No busca certificados reales en base de datos
  - Archivo: `app/Livewire/ValidarCodigo.php` (líneas 21-26)
  - **Impacto ALTO**: Funcionalidad crítica no operativa

- **Filtrado de Personas Elegibles**: **AUSENTE**
  - No filtra por tipo de certificado (miembros vs externos)
  - No filtra por contexto (proyecto/evento/área)
  - No aplica reglas del estatuto (retiro por bajo rendimiento, tiempo mínimo)
  - No diferencia entre certificados que requieren membresía y los que permiten externos
  - Archivo: `app/Livewire/GeneracionCertificados.php`

- **Validación de Contexto**: **INCOMPLETA**
  - `GrupoDeCertificacion` tiene campos `proyecto_id` y `evento_id`
  - No valida que el contexto sea requerido según tipo de certificado
  - Archivo: `app/Models/GrupoDeCertificacion.php` (líneas 31-32)

---

### 4. Arquitectura y Organización

#### ✅ **Alineado**

- **Estructura de Directorios**: Correcta según Laravel 12
  - Separación clara: Models, Controllers, Livewire
  - Archivos en ubicaciones estándar

- **Uso de Livewire**: Implementado correctamente
  - Componentes en `app/Livewire/`
  - Uso de Volt en rutas

- **Relaciones Eloquent**: Bien definidas
  - Uso correcto de `hasMany`, `belongsTo`, `belongsToMany`
  - Eager loading implementado en algunos lugares

#### ⚠️ **Parcialmente Alineado**

- **Separación de Responsabilidades**: Mejorable
  - `ProyectoController` tiene demasiadas responsabilidades (945+ líneas)
  - Lógica de generación de PDFs mezclada con lógica de negocio
  - Archivo: `app/Http/Controllers/ProyectoController.php`

- **Lógica de Negocio**: Mezclada con presentación
  - `GeneracionCertificados` tiene lógica compleja (769 líneas)
  - Debería estar en Services o Actions
  - Archivo: `app/Livewire/GeneracionCertificados.php`

#### ❌ **No Alineado**

- **Carpeta Policies**: **NO EXISTE**
  - Documentación espera `app/Policies/` con múltiples policies
  - No existe en el proyecto

- **Service Classes**: **NO EXISTEN**
  - Documentación menciona Services para lógica de negocio
  - Toda la lógica está en Controllers/Livewire

- **Actions Reutilizables**: **INSUFICIENTES**
  - Solo existe `app/Livewire/Actions/Logout.php`
  - No hay Actions para generación de certificados, validaciones, etc.

- **Acoplamiento**: **ALTO**
  - `GrupoCertificacion` Livewire instancia Controller directamente
  - Archivo: `app/Livewire/GrupoCertificacion.php` (línea 32)

---

### 5. Sistema de Diseño

#### ✅ **Alineado**

- **Fuente de Verdad**: `resources/css/app.css` existe y está bien estructurado
  - Tokens de color definidos
  - Tokens tipográficos definidos
  - Variables CSS correctas
  - Archivo: `resources/css/app.css`

- **Tipografía Inter**: Configurada en variables CSS
  - Todas las escalas tipográficas definidas
  - Clases utilitarias disponibles

#### ❌ **No Alineado - VIOLACIONES MASIVAS**

- **Colores Hardcodeados**: **47+ instancias encontradas**
  - Uso extensivo de `#[0-9a-fA-F]{6}` en clases Tailwind
  - Ejemplos encontrados:
    - `bg-[#9636AD]`, `text-[#3454A1]`, `border-[#E7C9EE]`
    - `bg-[#EBF1FD]`, `hover:bg-[#3454A1]`
  - Archivos afectados:
    - `resources/views/welcome.blade.php` (múltiples líneas)
    - `resources/views/components/app/header.blade.php` (líneas 56, 68)
    - `resources/views/livewire/certificates/generacion-certificados.blade.php` (líneas 82, 113, 153, 184, 221)
    - `resources/views/certificates/pdf-template.blade.php` (múltiples líneas)
    - `resources/views/admin/people/index.blade.php` (líneas 16, 36)
    - Y más...
  - **Impacto ALTO**: Violación directa del sistema de diseño documentado

- **Estilos Inline con Colores Hex**: **Múltiples instancias**
  - `style="color: #000000"` en PDF template
  - `style="background: linear-gradient(to right, #3E1A6D, #6C2D91, #B57CBE)"`
  - Archivos: `resources/views/certificates/pdf-template.blade.php`, `resources/views/welcome.blade.php`

- **Tamaños Arbitrarios**: **Algunos encontrados**
  - Uso de valores hardcodeados en lugar de tokens
  - Menos crítico pero presente

---

## C. Deuda Técnica Identificada

### Prioridad CRÍTICA (Riesgo Funcional Alto)

1. **Validación de Reglas del Estatuto** ⚠️
   - **Problema**: No se valida tiempo mínimo ni estado de retiro
   - **Riesgo**: Certificados emitidos violando estatuto institucional
   - **Archivos**: `app/Livewire/GeneracionCertificados.php`, `app/Http/Controllers/ProyectoController.php`
   - **Esfuerzo**: Medio-Alto

2. **Sistema de Autorización** ⚠️
   - **Problema**: Sin Policies, Gates ni validación de roles
   - **Riesgo**: Acceso no autorizado a funcionalidades críticas
   - **Archivos**: Todo el proyecto
   - **Esfuerzo**: Alto

3. **Uso del Estado de Retiro por Bajo Rendimiento** ⚠️
   - **Problema**: El estado existe en `area_persona` pero NO SE USA como criterio de elegibilidad
   - **Riesgo**: No se puede filtrar ni validar esta regla durante generación
   - **Archivos**: Lógica de generación de certificados
   - **Esfuerzo**: Medio (implementar validación y filtrado)

4. **Validación Pública No Funcional** ⚠️
   - **Problema**: Usa datos mock, no consulta BD
   - **Riesgo**: Funcionalidad crítica no operativa
   - **Archivos**: `app/Livewire/ValidarCodigo.php`
   - **Esfuerzo**: Medio

### Prioridad ALTA (Riesgo Técnico/Visual)

5. **Violaciones del Sistema de Diseño** ⚠️
   - **Problema**: 47+ instancias de colores hardcodeados
   - **Riesgo**: Inconsistencia visual, mantenimiento difícil
   - **Archivos**: Múltiples vistas Blade
   - **Esfuerzo**: Alto (refactorización extensa)

6. **Filtrado de Personas Elegibles** ⚠️
   - **Problema**: No filtra por tipo de certificado ni contexto
   - **Riesgo**: Selección incorrecta de personas
   - **Archivos**: `app/Livewire/GeneracionCertificados.php`
   - **Esfuerzo**: Medio

### Prioridad MEDIA (Mejoras Arquitectónicas)

7. **Separación de Responsabilidades** ⚠️
   - **Problema**: Controllers/Livewire con demasiada lógica
   - **Riesgo**: Código difícil de mantener y testear
   - **Archivos**: `ProyectoController.php`, `GeneracionCertificados.php`
   - **Esfuerzo**: Alto

8. **Relación Certificado-TipoDeCertificacion** ⚠️
   - **Problema**: Falta relación directa
   - **Riesgo**: Consultas menos eficientes
   - **Archivos**: `app/Models/Certificado.php`
   - **Esfuerzo**: Bajo

9. **Nomenclatura Inconsistente** ⚠️
   - **Problema**: `Certificado::person()` debería ser `persona()`
   - **Riesgo**: Confusión, inconsistencia con dominio
   - **Archivos**: `app/Models/Certificado.php`
   - **Esfuerzo**: Bajo

---

## D. Recomendaciones (SIN código)

### Qué Debe Abordarse PRIMERO

1. **Implementar Uso del Estado de Retiro por Bajo Rendimiento**
   - El estado ya existe en historial `area_persona`
   - Implementar consulta y validación del estado durante generación
   - Filtrar personas retiradas por bajo rendimiento en selección
   - **Razón**: Base necesaria para todas las validaciones

2. **Crear Sistema de Autorización Básico**
   - Crear carpeta `app/Policies/`
   - Implementar `CertificadoPolicy` y `GrupoDeCertificacionPolicy` básicas
   - Agregar método `hasRole()` en modelo `User`
   - **Razón**: Seguridad crítica antes de producción

3. **Implementar Validación de Reglas del Estatuto**
   - Crear Service o Action para validaciones
   - Implementar cálculo de tiempo de membresía desde historial `area_persona`
   - Implementar uso del estado de retiro por bajo rendimiento (ya existe, solo falta usarlo)
   - Filtrar personas retiradas por bajo rendimiento
   - Implementar diferenciación miembros vs externos por tipo de certificado
   - **Razón**: Cumplimiento normativo obligatorio

4. **Corregir Validación Pública**
   - Implementar búsqueda real en BD
   - Mostrar datos públicos correctos
   - **Razón**: Funcionalidad crítica para usuarios finales

### Qué Puede Dejarse para DESPUÉS

5. **Refactorizar Sistema de Diseño**
   - Reemplazar colores hardcodeados progresivamente
   - Priorizar vistas más visibles primero
   - **Razón**: No afecta funcionalidad, pero mejora mantenibilidad

6. **Separar Responsabilidades**
   - Extraer lógica de negocio a Services
   - Crear Actions reutilizables
   - **Razón**: Mejora arquitectónica, no bloquea funcionalidad

7. **Mejorar Relaciones de Modelos**
   - Agregar relación directa Certificado-TipoDeCertificacion
   - Corregir nomenclatura `person()` → `persona()`
   - **Razón**: Mejoras incrementales, bajo impacto inmediato

### Qué NO Debe Tocarse AÚN

- **Estructura de Base de Datos Principal**: Está bien diseñada
- **Modelos Eloquent Existentes**: Relaciones correctas (excepto mejoras menores)
- **Flujo General de Generación**: La estructura es correcta, solo falta validación
- **Componentes Livewire Funcionales**: No refactorizar hasta tener tests

---

## E. Métricas de Alineación

| Categoría | Alineación | Críticos | Parciales | Totales |
|-----------|------------|----------|-----------|---------|
| Dominio y Modelos | 70% | 2 | 2 | 4 |
| Roles y Permisos | 20% | 5 | 0 | 5 |
| Flujo de Certificación | 50% | 3 | 2 | 5 |
| Arquitectura | 60% | 1 | 2 | 3 |
| Sistema de Diseño | 30% | 1 | 0 | 1 |
| **TOTAL** | **46%** | **12** | **6** | **18** |

---

## F. Conclusión

El proyecto SEDICERT tiene una **base sólida** con modelos bien estructurados y relaciones correctas. Sin embargo, presenta **desalineaciones críticas** en:

1. **Seguridad**: Ausencia total de autorización granular
2. **Validación de Negocio**: Reglas del estatuto no implementadas
3. **Sistema de Diseño**: Violaciones masivas de tokens CSS

**Recomendación General**: Priorizar implementación de validaciones de negocio y autorización antes de cualquier refactorización visual o arquitectónica. El sistema puede funcionar, pero **no cumple con los requisitos normativos** documentados.

---

## G. Aclaraciones de Dominio Posteriores a la Auditoría

### Contexto

Tras la auditoría inicial, se realizaron **aclaraciones importantes del dominio** que refinan y hacen explícitas reglas que estaban implícitas. Estas aclaraciones **NO invalidan la auditoría**, pero **mejoran la precisión** del plan de alineación.

### Aclaraciones Realizadas

#### 1. Estado "Retiro por Bajo Rendimiento"

**Aclaración**: El estado **"Retiro por bajo rendimiento"** **SÍ EXISTE** como estado dentro del historial `area_persona`. Forma parte del dominio institucional.

**Impacto en Auditoría**:
- ❌ **Antes**: Se reportó como "NO EXISTE" campo en tabla `personas`
- ✅ **Ahora**: El estado existe, pero **NO SE USA** como criterio de elegibilidad
- **Ajuste**: El problema es de **implementación de reglas**, no de ausencia de datos

#### 2. Tiempo Mínimo de Membresía

**Aclaración**: El tiempo mínimo de membresía **PUEDE CALCULARSE** a partir del historial completo en `area_persona`, considerando todos los periodos de pertenencia a SEDIPRO UNT.

**Impacto en Auditoría**:
- ❌ **Antes**: Se reportó como "NO EXISTE" lógica para calcular
- ✅ **Ahora**: El historial permite el cálculo, pero **NO EXISTE** función o servicio que lo implemente
- **Ajuste**: El problema es de **falta de implementación**, no de imposibilidad técnica

#### 3. Tipos de Certificados para Personas Externas

**Aclaración**: Existe una regla fundamental del dominio que debe quedar explícita:

**Certificados que PUEDEN ser otorgados a personas NO miembros de SEDIPRO UNT**:
- Certificado de Miembro Externo del Proyecto
- Certificado de Staff Externo de Apoyo de Proyecto
- Certificado de Participación como Ponente de Eventos Generales
- Certificado de Participación como Ponente para Proyecto
- Certificado de Participación en Evento General
- Certificado de Participación en Evento de Proyecto
- Certificado de Participación en Ejecución de Proyecto

**TODOS los demás tipos son EXCLUSIVOS para miembros de SEDIPRO UNT** (requieren historial en `area_persona`).

**Regla adicional**: Aunque algunos certificados permiten externos, si una persona **SÍ es miembro** y está **retirada por bajo rendimiento**, **NO puede recibir ningún tipo de certificado** (regla de exclusión absoluta).

**Impacto en Auditoría**:
- ✅ **Nuevo hallazgo**: Falta diferenciación entre certificados que requieren membresía y los que permiten externos
- ✅ **Nuevo hallazgo**: Falta validación de esta regla en el filtrado de personas elegibles

### Ajustes al Plan de Alineación

Estas aclaraciones **refinan** las recomendaciones sin cambiar las prioridades:

1. **Prioridad CRÍTICA se mantiene**: Implementar uso del estado de retiro (ya existe, solo falta usarlo)
2. **Prioridad CRÍTICA se mantiene**: Implementar cálculo de tiempo de membresía (historial existe, falta función)
3. **Nueva tarea**: Implementar diferenciación miembros vs externos por tipo de certificado

### Conclusión de Aclaraciones

El dominio fue **refinado** tras el análisis inicial. Esto **NO invalida la auditoría**, sino que **mejora la precisión** del plan de alineación. Los hallazgos siguen siendo válidos, pero ahora se entiende mejor que:

- El problema no es de **ausencia de datos**, sino de **falta de uso/validación**
- El problema no es de **imposibilidad técnica**, sino de **falta de implementación**

---

## Confirmación

> **La auditoría ha sido completada sin modificar el código y respetando el contexto maestro.**

> **El dominio ha sido refinado y la documentación ha sido actualizada para reflejar reglas explícitas de elegibilidad y certificación.**

---

**Fin del Informe**

