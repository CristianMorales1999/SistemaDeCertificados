# Dominio del Negocio

## Contexto Organizacional

### SEDIPRO UNT

SEDIPRO UNT es una organización estudiantil con estructura formal y estatuto interno. El sistema SEDICERT está diseñado para automatizar la gestión de certificados dentro de este contexto institucional.

---

## Estructura Organizacional

### Áreas Oficiales

SEDIPRO UNT está organizada en **5 áreas oficiales**:

1. **GTH** (Gestión de Talento Humano)
2. **TI** (Tecnologías de la Información)
3. **LTK & FNZ** (Logística, Transporte y Finanzas)
4. **PMO** (Project Management Office)
5. **MKT** (Marketing)

### Reglas de Membresía

**Principios fundamentales**:

- Un miembro **ingresa a una sola área inicialmente**
- Un miembro **puede cambiar de área** a lo largo del tiempo
- Un miembro puede ocupar **distintos cargos** dentro de su área
- Un miembro puede participar en **proyectos y eventos**
- Un miembro puede llegar a **egresar o retirarse**

⚠️ **Regla crítica**: El sistema **NO elimina historial**. Todo es histórico y auditable.

**Implicaciones técnicas**:
- Cambios de área se registran como nuevas entradas en `area_persona`
- Cambios de cargo se registran como nuevas entradas en `area_persona_cargo`
- Las consultas deben considerar rangos de fechas para determinar el estado actual

---

## Directiva Institucional

### Composición

La directiva institucional está compuesta por **7 cargos**:

1. **Presidente**
2. **Vicepresidente**
3. **5 Directores de Área** (uno por cada área oficial)

### Características

- **Renovación periódica**: Normalmente anual
- **Flexibilidad**: Una persona puede repetir cargos
- **Movilidad**: Una persona puede cambiar de cargo o área
- **Historial**: El historial de cargos debe preservarse

**Implicaciones técnicas**:
- Tabla `area_persona_cargo` con timestamps
- Consultas por rango de fechas para determinar cargo actual
- No se eliminan registros históricos

---

## Estatuto Institucional

### Reglas que el Sistema DEBE Respetar

El sistema **NO gestiona sanciones**, pero **sí respeta sus efectos**.

#### Reglas para Certificados de Egresado o Retiro Voluntario

Para que una persona pueda recibir un certificado de **Egresado** o **Retiro Voluntario**, debe cumplir:

1. **Mínimo 1 año como miembro activo**
   - El tiempo mínimo de membresía **PUEDE CALCULARSE** a partir del historial completo en `area_persona`
   - Debe considerarse **todos los periodos de pertenencia** a SEDIPRO UNT
   - Los cambios de área se consideran como **continuidad** (no reinicia el tiempo)
   - **Problema actual**: No existe una regla explícita documentada ni una validación formal implementada
   - **Solución requerida**: 
     - Crear función o servicio de dominio para calcular tiempo de membresía
     - Validar antes de permitir la generación de certificados de Egresado/Retiro Voluntario

2. **No haber sido retirado por bajo rendimiento**
   - Las personas retiradas por bajo rendimiento tienen un estado especial
   - Este estado debe ser consultable y verificable

#### Reglas para Personas Retiradas por Bajo Rendimiento

**Restricciones estrictas**:

- ❌ **NO pueden ser certificadas** (ningún tipo de certificado)
- ❌ **NO deben aparecer como seleccionables** en interfaces de generación
- ✅ El sistema debe validar esto **en el momento de generar certificados**

**Implementación técnica**:
- El estado **"Retiro por bajo rendimiento"** **SÍ EXISTE** como estado dentro del historial `area_persona`
- Forma parte del dominio institucional y debe ser tratado como **criterio de exclusión** para certificación
- **Problema actual**: El estado existe pero **NO SE USA** como criterio de elegibilidad
- **Solución requerida**: 
  - Validación activa durante la generación de certificados
  - Filtrado en consultas de selección de personas
  - Uso explícito del estado como regla de negocio

---

## Tipos de Certificados

El sistema maneja **16 tipos de certificados**, agrupados conceptualmente:

### 3.1 Certificados de Ciclo de Vida

Estos certificados marcan el final de la membresía:

- **Egresado**: Persona que completa su ciclo en SEDIPRO
- **Retiro Voluntario**: Persona que decide retirarse voluntariamente

**Reglas especiales**: Requieren validación de tiempo mínimo y estado (ver Estatuto).

### 3.2 Certificados por Cargos

Certificados que reconocen responsabilidades específicas:

- **Cargo en Directiva**: Miembro de la directiva institucional
- **Director de Proyecto**: Responsable principal de un proyecto
- **Co-Director de Proyecto**: Co-responsable de un proyecto
- **Coordinador de Proyecto**: Coordinador de actividades de proyecto

**Contexto requerido**: Área o Proyecto específico.

### 3.3 Certificados por Proyectos

Certificados que reconocen participación en proyectos:

- **Miembro Interno**: Miembro de SEDIPRO participando en proyecto
- **Miembro Externo**: Persona externa participando en proyecto
- **Staff Interno**: Staff de SEDIPRO en proyecto
- **Staff Externo**: Staff externo en proyecto

**Contexto requerido**: Proyecto específico.

**Regla de elegibilidad**:
- **Miembro Interno** y **Staff Interno**: Requieren historial en `area_persona` (son miembros de SEDIPRO)
- **Miembro Externo** y **Staff Externo**: **NO requieren** historial en `area_persona` (son personas externas)

### 3.4 Certificados por Eventos

Certificados que reconocen participación en eventos:

- **Ponente**: Persona que presenta en evento
- **Participante**: Persona que asiste a evento

**Contexto requerido**: Evento específico.

**Regla de elegibilidad**:
- Pueden ser otorgados a **personas externas** (no miembros de SEDIPRO)
- No requieren historial en `area_persona` para ser elegibles

### 3.5 Certificados Especiales

- **Valores Destacados**: Reconocimiento especial por valores institucionales

**Contexto**: Puede ser general o asociado a área/proyecto/evento.

---

## Características de Cada Tipo de Certificado

Cada tipo de certificado define:

### Reglas de Elegibilidad

- Quién puede recibirlo
- Qué validaciones se requieren
- Qué contexto es necesario

---

## Reglas de Elegibilidad por Tipo de Certificado

### Certificados EXCLUSIVOS para Miembros de SEDIPRO UNT

Los siguientes tipos de certificados **SOLO pueden ser otorgados a personas que tienen historial en `area_persona`** (son miembros de SEDIPRO):

1. **Certificado de Egresado** (requiere mínimo 1 año de membresía)
2. **Certificado de Retiro Voluntario** (requiere mínimo 1 año de membresía)
3. **Certificado de Directiva**
4. **Certificado de Director de Proyecto**
5. **Certificado de Co-Director de Proyecto**
6. **Certificado de Coordinador de Proyecto**
7. **Certificado de Miembros Internos del Proyecto**
8. **Certificado de Staff Interno de Apoyo de Proyecto**
9. **Certificado de Valores Destacados**

**Regla general**: Para estos certificados, la persona **DEBE tener historial en `area_persona`** y **NO debe estar retirada por bajo rendimiento**.

### Certificados que PUEDEN ser otorgados a Personas Externas

Los siguientes tipos de certificados **PUEDEN ser otorgados a personas que NO son miembros de SEDIPRO UNT** (no requieren historial en `area_persona`):

1. **Certificado de Miembros Externos del Proyecto**
2. **Certificado de Staff Externo de Apoyo de Proyecto**
3. **Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT**
4. **Certificado de Participación como Ponente para Proyecto**
5. **Certificado de Participación en Evento General de SEDIPRO UNT**
6. **Certificado de Participación en Evento de Proyecto**
7. **Certificado de Participación en Ejecución de Proyecto**

**Regla general**: Para estos certificados, la persona **NO requiere historial en `area_persona`**, pero **SÍ requiere asociación con el proyecto o evento correspondiente**.

**Nota importante**: Aunque estos certificados pueden ser otorgados a externos, si la persona **SÍ es miembro de SEDIPRO** y está **retirada por bajo rendimiento**, **NO puede recibir ningún tipo de certificado** (regla de exclusión absoluta).

### Firmas Obligatorias

- Quién debe firmar
- Orden de firmas
- Tipos de firma (digital, física, etc.)

### Texto Base (Speech)

- Contenido estático
- Partes dinámicas (nombre, cargo, fecha, etc.)
- Formato específico

### Contexto

- **Área**: Certificados relacionados con área específica
- **Proyecto**: Certificados relacionados con proyecto específico
- **Evento**: Certificados relacionados con evento específico
- **Ninguno**: Certificados generales

---

## Entidades del Dominio

### Personas

- **Descripción**: Miembros de SEDIPRO (activos, egresados, retirados)
- **Atributos clave**: Nombre, DNI, estado, fecha de ingreso
- **Relaciones**: Áreas, cargos, proyectos, eventos, certificados

### Áreas

- **Descripción**: 5 áreas oficiales de SEDIPRO
- **Atributos clave**: Nombre, código
- **Relaciones**: Personas, cargos

### Cargos

- **Descripción**: Posiciones dentro de áreas o directiva
- **Atributos clave**: Nombre, tipo (directiva/área)
- **Relaciones**: Personas, áreas

### Proyectos

- **Descripción**: Proyectos institucionales
- **Atributos clave**: Nombre, descripción, fechas
- **Relaciones**: Personas (miembros, staff), certificados

### Eventos

- **Descripción**: Eventos organizados por SEDIPRO
- **Atributos clave**: Nombre, fecha, tipo
- **Relaciones**: Personas (ponentes, participantes), certificados

### Certificados

- **Descripción**: Certificados generados y emitidos
- **Atributos clave**: Código único, tipo, fecha, QR
- **Relaciones**: Persona, tipo de certificación, grupo de certificación

### Grupos de Certificación

- **Descripción**: Lotes de certificados generados juntos
- **Atributos clave**: Nombre, tipo, fecha de generación
- **Relaciones**: Certificados, usuario generador

---

## Reglas de Negocio Críticas

### 1. Historial Completo

**Regla**: El sistema nunca elimina historial.

**Aplicación**:
- Cambios de área → Nueva entrada en `area_persona`
- Cambios de cargo → Nueva entrada en `area_persona_cargo`
- Cambios de rol → Nueva entrada en tabla de roles

### 2. Validación de Elegibilidad

**Regla**: Antes de generar certificados, validar reglas del estatuto y elegibilidad por tipo.

**Aplicación**:

1. **Verificar si es miembro o externo**:
   - Si el tipo de certificado requiere membresía → Verificar historial en `area_persona`
   - Si el tipo de certificado permite externos → Verificar asociación con proyecto/evento

2. **Verificar tiempo mínimo** (solo para Egresado/Retiro Voluntario):
   - Calcular tiempo total de membresía desde historial `area_persona`
   - Considerar cambios de área como continuidad
   - Validar que sea mínimo 1 año

3. **Verificar estado de retiro**:
   - Consultar estado en historial `area_persona`
   - Si está retirado por bajo rendimiento → **EXCLUIR** (no puede recibir ningún certificado)

4. **Verificar contexto requerido**:
   - Área (si aplica)
   - Proyecto (si aplica)
   - Evento (si aplica)

### 3. Código Único por Certificado

**Regla**: Cada certificado tiene un código único e irrepetible.

**Aplicación**:
- Generación automática al crear certificado
- Validación de unicidad
- Uso en validación pública

### 4. Firmas Correctas por Tipo

**Regla**: Cada tipo de certificado requiere firmas específicas.

**Aplicación**:
- Configuración por tipo de certificación
- Validación antes de emitir
- Generación de PDF con firmas correctas

---

## Flujos de Negocio

### Ciclo de Vida de un Miembro

```
Ingreso → Asignación a Área → Cargos → Participación en Proyectos/Eventos → Egreso/Retiro
```

**Puntos importantes**:
- Un miembro puede cambiar de área múltiples veces
- Un miembro puede tener múltiples cargos (en secuencia o paralelo)
- Un miembro puede participar en múltiples proyectos/eventos
- Todo queda registrado históricamente

### Generación de Certificados

```
Selección de Tipo → Validación de Contexto → Selección de Personas → Validación de Elegibilidad → Generación Masiva → Asignación de Códigos → Generación de QR → Almacenamiento
```

**Puntos importantes**:
- Validación en cada paso
- Generación masiva eficiente
- Códigos únicos garantizados
- QR con URL de validación

### Validación Pública

```
Ingreso de Código/QR → Búsqueda de Certificado → Verificación de Validez → Mostrar Datos Públicos
```

**Puntos importantes**:
- No requiere autenticación
- Solo muestra datos públicos
- No permite descarga a visitantes
- Trazabilidad de consultas (opcional)

---

## Glosario de Términos

- **Miembro Activo**: Persona que forma parte de SEDIPRO y está en estado activo
- **Egresado**: Persona que completa su ciclo en SEDIPRO cumpliendo requisitos
- **Retiro Voluntario**: Persona que decide retirarse voluntariamente
- **Retiro por Bajo Rendimiento**: Persona retirada por incumplimiento (no certificable)
- **Directiva**: Grupo de 7 cargos de liderazgo institucional
- **Grupo de Certificación**: Lote de certificados generados juntos
- **Código Único**: Identificador único e irrepetible de un certificado
- **Contexto**: Área, Proyecto o Evento asociado a un certificado

---

## Notas de Implementación

### Estado Actual

- Modelos de datos definidos
- Relaciones establecidas
- Seeders con datos iniciales

### Consideraciones Futuras

- Validaciones de reglas de negocio en código
- Tests de reglas del estatuto
- Documentación de casos edge

---

## Referencias

- Estatuto de SEDIPRO UNT (documento interno)
- Reglamento de Certificados (si existe)
- Políticas institucionales

