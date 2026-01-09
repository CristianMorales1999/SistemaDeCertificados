# Contrato de Aplicación: Crear Grupo de Certificación

**Versión**: 1.0  
**Fecha**: 2025-01-XX  
**Estado**: ✅ Validado y Estable

---

## 1. Caso de Uso

### 1.1 Identificación

**Nombre**: Crear Grupo de Certificación  
**ID**: CU-001  
**Categoría**: Gestión de Certificados

### 1.2 Actor Principal

**Actor**: Usuario autenticado con permisos de generación de certificados

### 1.3 Roles Autorizados

El caso de uso **SOLO puede ser ejecutado** por usuarios con uno de los siguientes roles:

- ✅ **Administrador**: Control total del sistema
- ✅ **Marketing**: Gestión de grupos de certificación

**Roles NO autorizados**:
- ❌ **Supervisor**: Solo lectura, no puede crear grupos
- ❌ **Usuario Normal**: Solo puede ver sus propios certificados
- ❌ **Visitante**: No autenticado

**Validación de autorización**: Debe verificarse **antes** de permitir acceso al formulario y **antes** de procesar la creación del grupo.

### 1.4 Objetivo del Caso de Uso

Crear un `GrupoDeCertificacion` que:
1. Está asociado a un `TipoDeCertificacion` específico
2. Contiene una lista de `Personas` que han sido validadas como elegibles
3. Incluye contexto opcional (proyecto, evento, área) según el tipo de certificado
4. Almacena metadata de evaluación y auditoría en formato JSON
5. **NO genera certificados individuales** (eso es un caso de uso posterior)
6. **NO genera PDFs** (eso es un caso de uso posterior)

**Resultado esperado**: Un registro de `GrupoDeCertificacion` en estado "Pendiente" con metadata completa de la evaluación de elegibilidad.

---

## 2. Inputs Requeridos

### 2.1 Campos Obligatorios

Los siguientes campos **SIEMPRE son obligatorios**:

| Campo | Tipo | Descripción | Validación |
|-------|------|-------------|------------|
| `tipo_de_certificacion_id` | `int` | ID del tipo de certificación seleccionado | Debe existir en `tipos_de_certificacion` |
| `usuario_creador_id` | `int` | ID del usuario que crea el grupo | Debe existir en `users`, debe tener rol autorizado |
| `personas` | `array<int>` | Array de IDs de personas seleccionadas | Mínimo 1 persona, todas deben ser válidas |

### 2.2 Campos Opcionales

Los siguientes campos son opcionales y pueden ser generados automáticamente:

| Campo | Tipo | Descripción | Valor por Defecto |
|-------|------|-------------|-------------------|
| `nombre` | `string` | Nombre descriptivo del grupo | Generado automáticamente: `{Tipo} ({Cantidad} personas) - {Fecha}` |
| `fecha_emision` | `date` | Fecha de emisión del grupo | Fecha actual (`Carbon::now()`) |
| `descripcion` | `text` | Descripción del grupo (JSON metadata) | Generado automáticamente con metadata de evaluación |

### 2.3 Campos Condicionales según Tipo de Certificado

Los siguientes campos aparecen y se vuelven obligatorios **SOLO si el tipo de certificado lo requiere**:

#### 2.3.1 Campo: `proyecto_id`

**Aparece cuando**: El tipo de certificado requiere contexto de proyecto.

**Tipos que requieren proyecto** (10 tipos):
- Certificado de Director de Proyecto
- Certificado de Co-Director de Proyecto
- Certificado de Coordinador de Proyecto
- Certificado de Miembros Internos del Proyecto
- Certificado de Miembros Externos del Proyecto
- Certificado de Staff Interno de Apoyo de Proyecto
- Certificado de Staff Externo de Apoyo de Proyecto
- Certificado de Participación como Ponente para Proyecto
- Certificado de Participación en Evento de Proyecto
- Certificado de Participación en Ejecución de Proyecto

**Validación**: 
- Debe existir en `proyectos`
- Debe estar activo (si aplica)

#### 2.3.2 Campo: `evento_id`

**Aparece cuando**: El tipo de certificado requiere contexto de evento.

**Tipos que requieren evento** (4 tipos):
- Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT
- Certificado de Participación como Ponente para Proyecto
- Certificado de Participación en Evento General de SEDIPRO UNT
- Certificado de Participación en Evento de Proyecto

**Validación**: 
- Debe existir en `eventos`
- Debe estar activo (si aplica)

**Nota**: Algunos tipos pueden requerir **tanto proyecto como evento** (ej: "Participación en Evento de Proyecto").

#### 2.3.3 Campo: `area_id` (implícito en contexto)

**Aparece cuando**: El tipo de certificado requiere contexto de área.

**Tipos que requieren área** (1 tipo):
- Certificado de Directiva

**Validación**: 
- Debe existir en `areas`
- Debe ser una de las 5 áreas oficiales de SEDIPRO UNT

**Nota**: Para certificados de Directiva, el área se determina implícitamente por el cargo de la persona en la directiva.

#### 2.3.4 Tipos sin Contexto Obligatorio

Los siguientes tipos **NO requieren contexto adicional**:

- Certificado de Egresado
- Certificado de Retiro Voluntario
- Certificado de Valores Destacados (puede tener contexto opcional)

**Comportamiento**: Los campos de contexto (proyecto, evento, área) **NO aparecen** en el formulario para estos tipos.

---

## 3. Reglas de Comportamiento Dinámico

### 3.1 Cambios al Seleccionar Tipo de Certificado

Cuando el usuario selecciona un `TipoDeCertificacion`, el sistema **DEBE**:

1. **Determinar contexto obligatorio**:
   - Consultar las constantes del servicio de dominio:
     - `ElegibilidadCertificacionService::TIPOS_REQUIEREN_PROYECTO`
     - `ElegibilidadCertificacionService::TIPOS_REQUIEREN_EVENTO`
     - `ElegibilidadCertificacionService::TIPOS_REQUIEREN_AREA`
   - Mostrar/ocultar campos según corresponda

2. **Recargar lista de personas elegibles**:
   - Filtrar personas según reglas de elegibilidad del tipo
   - Aplicar filtros de contexto si ya están seleccionados
   - Actualizar la interfaz con la nueva lista

3. **Actualizar validaciones del formulario**:
   - Marcar campos de contexto como obligatorios si el tipo los requiere
   - Remover validaciones de campos no requeridos

### 3.2 Cambios al Seleccionar Contexto (Proyecto/Evento)

Cuando el usuario selecciona un `Proyecto` o `Evento`, el sistema **DEBE**:

1. **Recargar lista de personas elegibles**:
   - Aplicar filtro adicional por asociación al proyecto/evento
   - Mantener filtros previos (tipo de certificado, reglas del estatuto)
   - Actualizar la interfaz con la nueva lista filtrada

2. **Validar coherencia**:
   - Si se selecciona un evento, verificar que pertenezca al proyecto (si el tipo requiere ambos)
   - Mostrar error si hay inconsistencia

### 3.3 Datos que Deben Recargarse Dinámicamente

#### 3.3.1 Lista de Personas Elegibles

**Cuándo se recarga**:
- Al seleccionar tipo de certificado
- Al seleccionar proyecto (si aplica)
- Al seleccionar evento (si aplica)
- Al cambiar cualquier filtro de contexto

**Fuente de datos**: 
- Modelo `Persona` con relaciones cargadas
- Filtrado por servicios de dominio (ver sección 4)

**Formato de respuesta** (para frontend):
```json
{
  "personas": [
    {
      "id": 1,
      "nombre_completo": "Juan Pérez",
      "dni": "12345678",
      "es_elegible": true,
      "motivo": "Persona cumple con todos los requisitos"
    }
  ],
  "total": 10,
  "filtros_aplicados": {
    "tipo_certificacion": "Certificado de Egresado",
    "proyecto": null,
    "evento": null
  }
}
```

#### 3.3.2 Lista de Proyectos Disponibles

**Cuándo se recarga**:
- Al seleccionar tipo de certificado que requiere proyecto
- Cuando cambia el estado de proyectos (si aplica)

**Fuente de datos**: 
- Modelo `Proyecto` con filtros básicos (activos, etc.)

#### 3.3.3 Lista de Eventos Disponibles

**Cuándo se recarga**:
- Al seleccionar tipo de certificado que requiere evento
- Al seleccionar proyecto (si el evento debe pertenecer al proyecto)
- Cuando cambia el estado de eventos (si aplica)

**Fuente de datos**: 
- Modelo `Evento` con filtros básicos (activos, etc.)
- Si hay proyecto seleccionado, filtrar eventos del proyecto

---

## 4. Selección de Personas

### 4.1 Fuente de Datos

**Modelo principal**: `Persona`

**Relaciones requeridas** (eager loading):
- `areaPersonas` (historial completo)
- `areaPersonas.area` (para validar contexto de área)
- Relaciones con proyectos/eventos según contexto

### 4.2 Reglas de Filtrado

El sistema **DEBE aplicar** las siguientes reglas de filtrado **en este orden**:

#### 4.2.1 Filtro Universal: Retiro por Bajo Rendimiento

**Regla**: **NUNCA mostrar** personas que tienen estado "Retiro por bajo rendimiento" en su historial `area_persona`.

**Aplicación**: 
- Para **TODOS los tipos de certificado**, sin excepción
- Se aplica **antes** de cualquier otro filtro
- Usar `EstadoPersonaService::determinarEstado()` y verificar `esta_retirada_por_bajo_rendimiento === true`

**Garantía**: Personas retiradas por bajo rendimiento **NUNCA aparecen** en la lista, independientemente del tipo de certificado.

#### 4.2.2 Filtro por Tipo de Certificado: Membresía Requerida

**Regla**: Si el tipo de certificado requiere membresía, **solo mostrar** personas con historial en `area_persona`.

**Tipos que requieren membresía** (9 tipos):
- Certificado de Egresado
- Certificado de Retiro Voluntario
- Certificado de Directiva
- Certificado de Director de Proyecto
- Certificado de Co-Director de Proyecto
- Certificado de Coordinador de Proyecto
- Certificado de Miembros Internos del Proyecto
- Certificado de Staff Interno de Apoyo de Proyecto
- Certificado de Valores Destacados

**Aplicación**: 
- Verificar que `Persona::areaPersonas()->exists() === true`
- Usar `EstadoPersonaService::determinarEstado()` y verificar `es_miembro === true`

#### 4.2.3 Filtro por Tipo de Certificado: Tiempo Mínimo

**Regla**: Si el tipo es Egresado o Retiro Voluntario, **solo mostrar** personas con mínimo 1 año de membresía.

**Tipos que requieren tiempo mínimo** (2 tipos):
- Certificado de Egresado
- Certificado de Retiro Voluntario

**Aplicación**: 
- Usar `TiempoMembresiaService::calcularTiempoMembresia()`
- Verificar que `total_anios >= 1` (o `total_dias >= 365`)

#### 4.2.4 Filtro por Contexto: Proyecto

**Regla**: Si el tipo requiere proyecto, **solo mostrar** personas asociadas al proyecto seleccionado.

**Aplicación**: 
- Verificar relación `Persona` → `Proyecto` (tabla pivot o relación directa)
- Si el tipo es "Miembro Interno" o "Staff Interno", verificar que la persona esté en el proyecto como miembro/staff interno
- Si el tipo es "Miembro Externo" o "Staff Externo", verificar que la persona esté en el proyecto como miembro/staff externo

#### 4.2.5 Filtro por Contexto: Evento

**Regla**: Si el tipo requiere evento, **solo mostrar** personas asociadas al evento seleccionado.

**Aplicación**: 
- Verificar relación `Persona` → `Evento` (tabla pivot o relación directa)
- Si el tipo es "Ponente", verificar que la persona sea ponente del evento
- Si el tipo es "Participante", verificar que la persona sea participante del evento

#### 4.2.6 Filtro por Contexto: Área (Directiva)

**Regla**: Si el tipo es "Directiva", **solo mostrar** personas que tienen cargo en la directiva.

**Aplicación**: 
- Verificar que la persona tenga un cargo de directiva activo
- Verificar que el cargo corresponda al área requerida (si aplica)

### 4.3 Garantías que Debe Cumplir el Sistema

El sistema **GARANTIZA** que:

1. ✅ **Nunca se muestran personas no elegibles**: Todas las personas en la lista cumplen las reglas de elegibilidad del tipo de certificado seleccionado.

2. ✅ **Filtrado es determinístico**: Dados los mismos inputs (tipo, contexto), la lista de personas elegibles es siempre la misma.

3. ✅ **Filtrado es completo**: Se aplican todas las reglas relevantes, no solo algunas.

4. ✅ **Filtrado es eficiente**: Se realiza en el backend usando servicios de dominio, no en el frontend.

5. ✅ **Filtrado es auditable**: Se registra qué filtros se aplicaron y por qué cada persona es elegible o no.

### 4.4 Qué NUNCA Debe Permitirse Mostrar

El sistema **NUNCA debe mostrar**:

1. ❌ **Personas retiradas por bajo rendimiento**: Para cualquier tipo de certificado, sin excepción.

2. ❌ **Personas sin membresía** (para tipos que la requieren): Si el tipo requiere membresía y la persona no tiene historial en `area_persona`, no debe aparecer.

3. ❌ **Personas con tiempo insuficiente** (para Egresado/Retiro Voluntario): Si el tipo requiere mínimo 1 año y la persona tiene menos, no debe aparecer.

4. ❌ **Personas no asociadas al contexto**: Si el tipo requiere proyecto/evento y la persona no está asociada, no debe aparecer.

5. ❌ **Personas que fallan validación de contexto**: Si el tipo requiere área y la persona no tiene cargo en esa área, no debe aparecer.

**Nota**: Estas reglas se aplican **en el backend** usando servicios de dominio. El frontend **NO debe** confiar en que la lista ya está filtrada; debe validar nuevamente antes de crear el grupo.

---

## 5. Validaciones

### 5.1 Validaciones Sincrónicas (Frontend)

Estas validaciones se realizan **antes** de enviar la petición al backend:

| Validación | Campo | Mensaje de Error |
|------------|-------|------------------|
| Tipo de certificado requerido | `tipo_de_certificacion_id` | "Debe seleccionar un tipo de certificado" |
| Tipo de certificado válido | `tipo_de_certificacion_id` | "El tipo de certificado seleccionado no es válido" |
| Al menos una persona | `personas` | "Debe seleccionar al menos una persona" |
| Proyecto requerido (si aplica) | `proyecto_id` | "Este tipo de certificado requiere un proyecto" |
| Evento requerido (si aplica) | `evento_id` | "Este tipo de certificado requiere un evento" |
| Proyecto válido (si se proporciona) | `proyecto_id` | "El proyecto seleccionado no es válido" |
| Evento válido (si se proporciona) | `evento_id` | "El evento seleccionado no es válido" |
| Coherencia proyecto-evento | `proyecto_id`, `evento_id` | "El evento debe pertenecer al proyecto seleccionado" |

### 5.2 Validaciones de Dominio (Backend)

Estas validaciones se realizan **en el backend** usando servicios de dominio:

#### 5.2.1 Validación de Autorización

**Servicio**: Middleware/Policy de autorización

**Validaciones**:
- Usuario autenticado
- Usuario tiene rol "Administrador" o "Marketing"
- Usuario tiene permisos para crear grupos de certificación

**Resultado si falla**: 
- HTTP 403 Forbidden
- Mensaje: "No tiene permisos para crear grupos de certificación"

#### 5.2.2 Validación de Tipo de Certificación

**Servicio**: `GrupoCertificacionApplicationService::crearGrupo()`

**Validaciones**:
- `tipo_de_certificacion_id` existe en `tipos_de_certificacion`
- Tipo de certificación está activo (si aplica)

**Resultado si falla**:
```json
{
  "grupo_creado": null,
  "resultado_evaluacion": null,
  "mensaje": "Tipo de certificación no encontrado"
}
```

#### 5.2.3 Validación de Usuario Creador

**Servicio**: `GrupoCertificacionApplicationService::crearGrupo()`

**Validaciones**:
- `usuario_creador_id` existe en `users`
- Usuario tiene rol autorizado

**Resultado si falla**:
```json
{
  "grupo_creado": null,
  "resultado_evaluacion": null,
  "mensaje": "Usuario creador no encontrado"
}
```

#### 5.2.4 Validación de Contexto

**Servicio**: `ElegibilidadCertificacionService::validarContexto()`

**Validaciones**:
- Si el tipo requiere proyecto → `proyecto_id` debe existir y ser válido
- Si el tipo requiere evento → `evento_id` debe existir y ser válido
- Si el tipo requiere área → Validar que el contexto de área sea válido
- Coherencia entre proyecto y evento (si ambos están presentes)

**Resultado si falla**:
- La evaluación de elegibilidad retornará `es_elegible: false` con motivo específico
- El grupo no se creará si todas las personas son no elegibles

#### 5.2.5 Validación de Elegibilidad Individual

**Servicio**: `GrupoCertificacionService::evaluarGrupo()` → `ElegibilidadCertificacionService::verificarElegibilidad()`

**Validaciones** (para cada persona):
1. **Retiro por bajo rendimiento**: Si `esta_retirada_por_bajo_rendimiento === true` → NO ELEGIBLE
2. **Membresía requerida**: Si el tipo requiere membresía y `es_miembro === false` → NO ELEGIBLE
3. **Tiempo mínimo**: Si el tipo requiere tiempo mínimo y `total_anios < 1` → NO ELEGIBLE
4. **Contexto**: Si el tipo requiere contexto y la persona no está asociada → NO ELEGIBLE

**Resultado si falla**:
- La persona se marca como `no_elegible` en el resultado de evaluación
- Se registra el motivo específico
- El proceso continúa evaluando las demás personas

### 5.3 Casos de Rechazo y Motivos Esperados

#### 5.3.1 Rechazo: No Hay Personas Elegibles

**Condición**: `resultado_evaluacion['resumen']['total_elegibles'] === 0`

**Motivo**: "No se creó el grupo porque no hay personas elegibles"

**Estructura de respuesta**:
```json
{
  "grupo_creado": null,
  "resultado_evaluacion": {
    "total_personas": 5,
    "total_evaluadas": 5,
    "elegibles": [],
    "no_elegibles": [
      {
        "persona": {...},
        "detalle_elegibilidad": {
          "es_elegible": false,
          "motivo": "Persona retirada por bajo rendimiento no puede recibir ningún certificado."
        }
      }
    ],
    "resumen": {
      "total_elegibles": 0,
      "total_no_elegibles": 5
    }
  },
  "mensaje": "No se creó el grupo porque no hay personas elegibles"
}
```

#### 5.3.2 Rechazo: Error en Validación de Tipo

**Condición**: Tipo de certificación no encontrado o inválido

**Motivo**: "Tipo de certificación no encontrado"

**Estructura de respuesta**:
```json
{
  "grupo_creado": null,
  "resultado_evaluacion": null,
  "mensaje": "Tipo de certificación no encontrado"
}
```

#### 5.3.3 Rechazo: Error en Validación de Usuario

**Condición**: Usuario creador no encontrado o sin permisos

**Motivo**: "Usuario creador no encontrado" o "Usuario creador no tiene permisos"

**Estructura de respuesta**:
```json
{
  "grupo_creado": null,
  "resultado_evaluacion": null,
  "mensaje": "Usuario creador no encontrado"
}
```

#### 5.3.4 Rechazo: Error en Persistencia

**Condición**: Error al crear el registro en base de datos

**Motivo**: "Error al crear el grupo: {mensaje_de_excepcion}"

**Estructura de respuesta**:
```json
{
  "grupo_creado": null,
  "resultado_evaluacion": {...},
  "mensaje": "Error al crear el grupo: Integrity constraint violation"
}
```

---

## 6. Salidas del Caso de Uso

### 6.1 Resultado Exitoso

**Condición**: Se creó el grupo exitosamente con al menos una persona elegible.

**Estructura de respuesta**:
```json
{
  "grupo_creado": {
    "id": 1,
    "tipo_de_certificacion_id": 3,
    "usuario_creador_id": 5,
    "nombre": "Certificado de Egresado (8 personas) - 2025-01-15",
    "descripcion": "{...JSON metadata...}",
    "fecha_emision": "2025-01-15",
    "estado": "Pendiente",
    "proyecto_id": null,
    "evento_id": null,
    "created_at": "2025-01-15T10:30:00Z",
    "updated_at": "2025-01-15T10:30:00Z"
  },
  "resultado_evaluacion": {
    "total_personas": 10,
    "total_evaluadas": 10,
    "elegibles": [
      {
        "persona": {...},
        "detalle_elegibilidad": {
          "es_elegible": true,
          "motivo": "Persona cumple con todos los requisitos para este tipo de certificado.",
          "estado_persona": {...},
          "tiempo_membresia": {...},
          "reglas_aplicadas": {...}
        }
      }
    ],
    "no_elegibles": [
      {
        "persona": {...},
        "detalle_elegibilidad": {
          "es_elegible": false,
          "motivo": "Tiempo de membresía insuficiente: 200 días. Se requiere mínimo 365 días (1 año).",
          "estado_persona": {...},
          "tiempo_membresia": {...},
          "reglas_aplicadas": {...}
        }
      }
    ],
    "resumen": {
      "total_elegibles": 8,
      "total_no_elegibles": 2,
      "porcentaje_elegibles": 80.0
    },
    "auditoria": {
      "inicio": "2025-01-15T10:30:00Z",
      "fin": "2025-01-15T10:30:05Z",
      "duracion_segundos": 5.2,
      "tipo_certificacion": {...},
      "contexto": {...}
    }
  },
  "mensaje": "Grupo creado exitosamente con 8 personas elegibles"
}
```

**Acciones posteriores**:
- Redirigir al usuario a la vista de detalle del grupo creado
- Mostrar resumen de elegibles y no elegibles
- Permitir continuar con la generación de certificados (caso de uso posterior)

### 6.2 Resultado Sin Elegibles

**Condición**: Se evaluaron las personas pero ninguna resultó elegible.

**Estructura de respuesta**: Ver sección 5.3.1

**Acciones posteriores**:
- Mostrar mensaje explicativo al usuario
- Mostrar detalles de por qué cada persona no es elegible
- Permitir al usuario corregir la selección o cancelar
- **NO crear el grupo** (regla de dominio)

### 6.3 Resultado con Error Controlado

**Condición**: Ocurrió un error durante el proceso pero fue manejado correctamente.

**Tipos de errores controlados**:
- Tipo de certificación no encontrado
- Usuario creador no encontrado
- Error de validación de contexto
- Error de persistencia (base de datos)

**Estructura de respuesta**: Ver secciones 5.3.2, 5.3.3, 5.3.4

**Acciones posteriores**:
- Mostrar mensaje de error al usuario
- Permitir al usuario corregir los datos y reintentar
- Registrar el error en logs para auditoría

---

## 7. Relación con Servicios Existentes

### 7.1 Servicios de Dominio que Intervienen

#### 7.1.1 `GrupoCertificacionService` (Dominio)

**Responsabilidad**: Evaluar elegibilidad masiva de un grupo de personas.

**Método utilizado**: `evaluarGrupo($tipoCertificacion, array $personas, array $contexto = []): array`

**Inputs**:
- `$tipoCertificacion`: TipoDeCertificacion|int|string
- `$personas`: array de Persona|int
- `$contexto`: array con proyecto, evento, área (opcional)

**Outputs**:
- `total_personas`: int
- `elegibles`: array (personas elegibles con detalle)
- `no_elegibles`: array (personas no elegibles con motivo)
- `resumen`: array (estadísticas)
- `auditoria`: array (información de auditoría)

**Uso en el caso de uso**: 
- Se llama **una vez** con todas las personas seleccionadas
- El resultado se usa para determinar si se crea el grupo
- El resultado se almacena como metadata en el grupo

#### 7.1.2 `ElegibilidadCertificacionService` (Dominio)

**Responsabilidad**: Determinar si una persona individual es elegible para un tipo de certificación.

**Método utilizado**: `verificarElegibilidad($persona, $tipoCertificacion, array $contexto = []): array`

**Uso en el caso de uso**: 
- **NO se llama directamente** desde el caso de uso
- Es llamado **internamente** por `GrupoCertificacionService` para cada persona
- Su lógica define las reglas de elegibilidad que se aplican

#### 7.1.3 `EstadoPersonaService` (Dominio)

**Responsabilidad**: Determinar el estado actual de una persona.

**Método utilizado**: `determinarEstado(Persona $persona): array`

**Uso en el caso de uso**: 
- **NO se llama directamente** desde el caso de uso
- Es llamado **internamente** por `ElegibilidadCertificacionService`
- Proporciona información sobre membresía, estado activo, retiro por bajo rendimiento

#### 7.1.4 `TiempoMembresiaService` (Dominio)

**Responsabilidad**: Calcular el tiempo total de membresía de una persona.

**Método utilizado**: `calcularTiempoMembresia(Persona $persona): array`

**Uso en el caso de uso**: 
- **NO se llama directamente** desde el caso de uso
- Es llamado **internamente** por `EstadoPersonaService` y `ElegibilidadCertificacionService`
- Proporciona información sobre tiempo de membresía para validar requisitos mínimos

### 7.2 Servicios de Aplicación que Intervienen

#### 7.2.1 `GrupoCertificacionApplicationService` (Aplicación)

**Responsabilidad**: Orquestar la creación y persistencia de un `GrupoDeCertificacion`.

**Método utilizado**: `crearGrupo($tipoCertificacion, array $personas, array $opciones = []): array`

**Inputs**:
- `$tipoCertificacion`: TipoDeCertificacion|int|string
- `$personas`: array de Persona|int
- `$opciones`: array con:
  - `contexto`: array (proyecto, evento, área)
  - `usuario_creador_id`: int
  - `nombre`: string (opcional)
  - `fecha_emision`: string|Carbon (opcional)

**Outputs**:
- `grupo_creado`: GrupoDeCertificacion|null
- `resultado_evaluacion`: array (resultado de GrupoCertificacionService)
- `mensaje`: string

**Uso en el caso de uso**: 
- Este es el **servicio principal** que se debe llamar desde el controlador/Livewire
- Orquesta todo el flujo: validación → evaluación → persistencia
- Retorna el resultado completo del caso de uso

**Flujo interno**:
1. Normaliza inputs (tipo, usuario, contexto)
2. Valida que tipo y usuario existan
3. Llama a `GrupoCertificacionService::evaluarGrupo()`
4. Si hay elegibles, crea `GrupoDeCertificacion` con metadata
5. Retorna resultado completo

### 7.3 Qué NO Debe Hacer Este Caso de Uso

El caso de uso **NO debe**:

1. ❌ **Generar certificados individuales**: Eso es responsabilidad de un caso de uso posterior ("Generar Certificados de un Grupo")

2. ❌ **Generar PDFs**: Eso es responsabilidad de un caso de uso posterior ("Generar PDF de Certificado")

3. ❌ **Validar firmas**: La validación de firmas se hace en el caso de uso de generación de certificados

4. ❌ **Enviar notificaciones**: Las notificaciones se envían en casos de uso posteriores

5. ❌ **Modificar personas o proyectos**: Solo lee datos, no los modifica

6. ❌ **Aplicar reglas de negocio directamente**: Delega toda la lógica de negocio a los servicios de dominio

7. ❌ **Manejar autenticación**: La autenticación se maneja en middleware/policies

8. ❌ **Renderizar vistas**: Solo retorna datos, la presentación es responsabilidad del controlador/Livewire

### 7.4 Separación de Responsabilidades

```
┌─────────────────────────────────────────────────────────────┐
│                    Controlador/Livewire                     │
│  - Recibe request del usuario                                │
│  - Valida inputs básicos (sincrónicos)                       │
│  - Llama a GrupoCertificacionApplicationService              │
│  - Maneja respuesta y renderiza vista                        │
└──────────────────────────┬──────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────┐
│         GrupoCertificacionApplicationService                  │
│  - Normaliza inputs                                          │
│  - Valida existencia de entidades                           │
│  - Llama a GrupoCertificacionService (dominio)              │
│  - Crea y persiste GrupoDeCertificacion                     │
│  - Retorna resultado completo                                │
└──────────────────────────┬──────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────┐
│              GrupoCertificacionService (Dominio)            │
│  - Evalúa elegibilidad masiva                               │
│  - Llama a ElegibilidadCertificacionService por persona     │
│  - Agrupa resultados                                        │
│  - Genera resumen y auditoría                               │
└──────────────────────────┬──────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────┐
│         ElegibilidadCertificacionService (Dominio)          │
│  - Aplica reglas de elegibilidad                            │
│  - Usa EstadoPersonaService y TiempoMembresiaService         │
│  - Valida contexto                                          │
│  - Retorna resultado individual                             │
└─────────────────────────────────────────────────────────────┘
```

---

## 8. Ejemplo de Implementación (Pseudocódigo)

### 8.1 En el Controlador/Livewire

```php
public function crearGrupo(Request $request)
{
    // 1. Validar autorización (middleware/policy)
    $this->authorize('create', GrupoDeCertificacion::class);
    
    // 2. Validar inputs básicos (sincrónicos)
    $validated = $request->validate([
        'tipo_de_certificacion_id' => 'required|exists:tipos_de_certificacion,id',
        'personas' => 'required|array|min:1',
        'personas.*' => 'exists:personas,id',
        'proyecto_id' => 'nullable|exists:proyectos,id',
        'evento_id' => 'nullable|exists:eventos,id',
        'nombre' => 'nullable|string|max:255',
        'fecha_emision' => 'nullable|date',
    ]);
    
    // 3. Preparar contexto
    $contexto = [];
    if ($request->has('proyecto_id')) {
        $contexto['proyecto'] = $request->proyecto_id;
    }
    if ($request->has('evento_id')) {
        $contexto['evento'] = $request->evento_id;
    }
    
    // 4. Preparar opciones
    $opciones = [
        'contexto' => $contexto,
        'usuario_creador_id' => auth()->id(),
        'nombre' => $request->nombre,
        'fecha_emision' => $request->fecha_emision,
    ];
    
    // 5. Llamar al servicio de aplicación
    $service = new GrupoCertificacionApplicationService();
    $resultado = $service->crearGrupo(
        $request->tipo_de_certificacion_id,
        $request->personas,
        $opciones
    );
    
    // 6. Manejar respuesta
    if ($resultado['grupo_creado']) {
        return redirect()
            ->route('grupos.show', $resultado['grupo_creado']->id)
            ->with('success', $resultado['mensaje']);
    } else {
        return back()
            ->withInput()
            ->withErrors(['error' => $resultado['mensaje']]);
    }
}
```

### 8.2 Endpoint para Obtener Personas Elegibles (AJAX)

```php
public function obtenerPersonasElegibles(Request $request)
{
    // 1. Validar inputs
    $validated = $request->validate([
        'tipo_de_certificacion_id' => 'required|exists:tipos_de_certificacion,id',
        'proyecto_id' => 'nullable|exists:proyectos,id',
        'evento_id' => 'nullable|exists:eventos,id',
    ]);
    
    // 2. Preparar contexto
    $contexto = [];
    if ($request->has('proyecto_id')) {
        $contexto['proyecto'] = $request->proyecto_id;
    }
    if ($request->has('evento_id')) {
        $contexto['evento'] = $request->evento_id;
    }
    
    // 3. Obtener todas las personas (o filtrar por contexto básico)
    $personas = Persona::query()
        ->when($request->proyecto_id, function ($q) use ($request) {
            // Filtrar por proyecto si aplica
        })
        ->when($request->evento_id, function ($q) use ($request) {
            // Filtrar por evento si aplica
        })
        ->get();
    
    // 4. Evaluar elegibilidad usando servicio de dominio
    $tipo = TipoDeCertificacion::find($request->tipo_de_certificacion_id);
    $service = new GrupoCertificacionService();
    $resultado = $service->evaluarGrupo($tipo, $personas->toArray(), $contexto);
    
    // 5. Formatear respuesta para frontend
    $personasElegibles = collect($resultado['elegibles'])
        ->map(function ($item) {
            return [
                'id' => $item['persona']->id,
                'nombre_completo' => $item['persona']->nombre_completo,
                'dni' => $item['persona']->dni,
                'es_elegible' => true,
                'motivo' => $item['detalle_elegibilidad']['motivo'],
            ];
        });
    
    return response()->json([
        'personas' => $personasElegibles,
        'total' => $personasElegibles->count(),
        'filtros_aplicados' => [
            'tipo_certificacion' => $tipo->nombre,
            'proyecto' => $request->proyecto_id,
            'evento' => $request->evento_id,
        ],
    ]);
}
```

---

## 9. Notas de Implementación

### 9.1 Consideraciones de Rendimiento

- **Evaluación masiva**: Si hay muchas personas (100+), considerar procesamiento en cola (Queue)
- **Filtrado de personas**: Usar eager loading para evitar N+1 queries
- **Caché de tipos de certificación**: Los tipos y sus reglas pueden cachearse

### 9.2 Consideraciones de Seguridad

- **Validación de autorización**: Siempre verificar en backend, no confiar solo en frontend
- **Validación de inputs**: Validar existencia de entidades antes de procesar
- **Sanitización**: Sanitizar todos los inputs antes de almacenar

### 9.3 Consideraciones de Auditoría

- **Metadata completa**: El campo `descripcion` debe contener JSON con toda la información de evaluación
- **Timestamps**: Registrar inicio y fin de evaluación
- **Reglas aplicadas**: Registrar qué reglas se aplicaron y por qué

---

## 10. Referencias

- [Dominio del Negocio](./dominio.md) - Reglas de elegibilidad y tipos de certificados
- [Flujo de Certificación](./flujo-certificacion.md) - Flujo completo de generación
- [Roles y Permisos](./roles-y-permisos.md) - Autorización y permisos
- `app/Application/Services/GrupoCertificacionApplicationService.php` - Servicio de aplicación
- `app/Domain/Services/GrupoCertificacionService.php` - Servicio de dominio
- `app/Domain/Services/ElegibilidadCertificacionService.php` - Servicio de elegibilidad

---

**Fin del Contrato de Aplicación**

