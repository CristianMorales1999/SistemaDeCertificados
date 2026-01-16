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

Cada tipo de certificado define **completamente** el comportamiento del sistema para ese tipo:

### 1. Reglas de Elegibilidad

- Quién puede recibirlo (miembros, externos, o ambos)
- Qué validaciones se requieren (tiempo mínimo, estado, etc.)
- Qué contexto es necesario (proyecto, evento, área, o ninguno)

### 2. Contexto Obligatorio

Cada tipo de certificado define qué contexto es **obligatorio**:

- **Proyecto**: El grupo debe estar asociado a un proyecto específico
- **Evento**: El grupo debe estar asociado a un evento específico
- **Área**: El grupo debe estar asociado a un área específica (ej: Directiva)
- **Ninguno**: El grupo no requiere contexto adicional (ej: Egresado, Retiro Voluntario)

**Implicación en la Interfaz**: Los formularios se comportan dinámicamente según el tipo:
- Si el tipo requiere proyecto → El campo "Proyecto" aparece y es obligatorio
- Si el tipo no requiere contexto → Los campos de contexto no aparecen

### 3. Firmas Requeridas

Cada tipo de certificado define:
- **Quién debe firmar**: Roles o cargos específicos (Presidente, Vicepresidente, Director de Área, etc.)
- **Orden de firmas**: Secuencia en que aparecen las firmas en el PDF
- **Tipos de firma**: Digital, física, o ambas

### 4. Texto Base (Speech)

Cada tipo de certificado tiene un **texto base** que incluye:
- **Contenido estático**: Texto fijo que no cambia
- **Partes dinámicas**: Variables que se reemplazan con datos de la persona:
  - `{nombre}`: Nombre completo de la persona
  - `{cargo}`: Cargo actual (si aplica)
  - `{area}`: Área actual (si aplica)
  - `{proyecto}`: Nombre del proyecto (si aplica)
  - `{evento}`: Nombre del evento (si aplica)
  - `{fecha}`: Fecha de emisión
- **Formato específico**: Estructura y estilo del texto

**Ejemplo de texto base**:
```
Certificamos que {nombre}, quien desempeñó el cargo de {cargo} 
en el área de {area}, ha cumplido satisfactoriamente sus funciones 
durante el periodo {fecha_inicio} a {fecha_fin}.
```

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

### Relación Tipo de Certificado → Grupo de Certificación

**Regla de Dominio Fundamental**:

El tipo de certificado **define completamente** cómo se comporta un grupo de certificación:

1. **Al crear un grupo**, el usuario selecciona un tipo de certificado
2. **El tipo determina**:
   - Qué campos de contexto aparecen en el formulario (comportamiento dinámico)
   - Qué personas son elegibles para selección (filtrado automático)
   - Qué firmas son requeridas
   - Qué texto base se utilizará para generar los certificados

3. **El formulario se adapta**:
   - Si el tipo requiere proyecto → Campo "Proyecto" aparece y es obligatorio
   - Si el tipo requiere evento → Campo "Evento" aparece y es obligatorio
   - Si el tipo requiere área → Campo "Área" aparece y es obligatorio
   - Si el tipo no requiere contexto → Estos campos no aparecen

4. **La lista de personas se filtra**:
   - Solo se muestran personas que cumplen las reglas de elegibilidad del tipo
   - El contexto adicional (proyecto/evento) filtra aún más las opciones
   - Personas no elegibles **nunca aparecen** en la lista

**Esta es una regla de negocio del dominio**, no solo una característica de la interfaz. El backend valida y aplica estas reglas independientemente de la UI.

---

## Reglas Detalladas de Elegibilidad por Tipo de Certificado

Las siguientes son las **16 reglas específicas de elegibilidad** implementadas en el sistema. Estas reglas son la **fuente única de verdad** para determinar qué personas pueden recibir cada tipo de certificado.

### Regla 1: Certificado de Egresado

**Personas elegibles**: Todos los miembros de SEDIPRO UNT (tabla: `area_persona`) con estado **'Miembro activo'**.

**Contexto requerido**: Ninguno.

**Nota**: Esta regla muestra todos los miembros activos. La validación de tiempo mínimo de membresía (1 año) se realiza en el servicio de elegibilidad antes de permitir la creación del certificado.

---

### Regla 2: Certificado de Retiro Voluntario

**Personas elegibles**: Todos los miembros de SEDIPRO UNT (tabla: `area_persona`) con estado **'Miembro activo'**.

**Contexto requerido**: Ninguno.

**Nota**: Similar a Egresado, pero con validación de tiempo mínimo de membresía (1 año) antes de permitir la creación.

---

### Regla 3: Certificado de Directiva

**Personas elegibles**: Todos los miembros de SEDIPRO (tabla: `area_persona`) que actualmente ocupan los cargos de:
- **'Presidente SEDIPRO UNT'**
- **'Vicepresidente SEDIPRO UNT'**
- Cualquier otro cargo que **inicie con 'Director de '** y **termine con 'SEDIPRO UNT'**

Y que tienen el estado **'Cargo activo'** en la tabla `area_persona_cargo` (sin `proyecto_id`, ya que son cargos de directiva).

**Contexto requerido**: Ninguno.

---

### Regla 4: Certificado de Director de Proyecto

**Personas elegibles**: Los Directores de Proyecto (DPs) de todos los proyectos existentes que **NO están vinculados** a algún grupo de certificación validado que esté asociado a este tipo de certificación.

**Contexto requerido**: Ninguno (se muestran todos los proyectos disponibles).

**Proceso**:
1. Obtener todos los proyectos que NO están vinculados a grupos validados de este tipo
2. Mostrar como elegibles a los DPs de esos proyectos (cargo 'Director de Proyecto' con estado 'Cargo activo')

---

### Regla 5: Certificado de Co-Director de Proyecto

**Personas elegibles**: Los Co-Directores de Proyecto (CODPs) de todos los proyectos existentes que **NO están vinculados** a algún grupo de certificación validado que esté asociado a este tipo de certificación.

**Contexto requerido**: Ninguno (se muestran todos los proyectos disponibles).

**Proceso**:
1. Obtener todos los proyectos que NO están vinculados a grupos validados de este tipo
2. Mostrar como elegibles a los CODPs de esos proyectos (cargo 'Codirector de Proyecto' con estado 'Cargo activo')

---

### Regla 6: Certificado de Coordinadores de Proyecto

**Personas elegibles**: Todos los miembros de SEDIPRO que ocupan el cargo de **'Coordinador de Proyecto'** y que están asociados al proyecto seleccionado, con estado **'Cargo activo'** en la tabla `area_persona_cargo`.

**Contexto requerido**: **Proyecto** (obligatorio).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, se muestran los coordinadores de ese proyecto

---

### Regla 7: Certificado de Miembros Internos del Proyecto

**Personas elegibles**: Todos los miembros de SEDIPRO que están vinculados al proyecto seleccionado y ocupan el rol de **'Miembro'** en la tabla `area_persona_proyecto`.

**Contexto requerido**: **Proyecto** (obligatorio).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, se muestran los miembros internos de ese proyecto

---

### Regla 8: Certificado de Staff Interno de Apoyo de Proyecto

**Personas elegibles**: Todos los miembros de SEDIPRO que están vinculados al proyecto seleccionado y ocupan el rol de **'Staff de apoyo'** en la tabla `area_persona_proyecto`.

**Contexto requerido**: **Proyecto** (obligatorio).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, se muestran los staff internos de ese proyecto

---

### Regla 9: Certificado de Miembros Externos del Proyecto

**Personas elegibles**: Todos los miembros de cualquier entidad aliada que están vinculados al proyecto seleccionado y ocupan el rol de **'Miembro externo'** en la tabla `entidad_aliada_persona_proyecto`.

**Contexto requerido**: **Proyecto** (obligatorio).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, se muestran los miembros externos de ese proyecto

---

### Regla 10: Certificado de Staff Externo de Apoyo de Proyecto

**Personas elegibles**: Todos los miembros de cualquier entidad aliada que están vinculados al proyecto seleccionado y ocupan el rol de **'Staff de apoyo'** en la tabla `entidad_aliada_persona_proyecto`.

**Contexto requerido**: **Proyecto** (obligatorio).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, se muestran los staff externos de ese proyecto

---

### Regla 11: Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT

**Personas elegibles**: Todas las personas asociadas a eventos generales (con `proyecto_id = NULL`) que **NO están vinculados** a algún grupo de certificación validado que esté asociado a este tipo de certificación, y que tienen únicamente el rol de **'Ponente'** en la tabla `evento_persona`.

**Contexto requerido**: Ninguno (se muestran todos los eventos generales disponibles).

**Proceso**:
1. Obtener todos los eventos generales (sin proyecto) que NO están vinculados a grupos validados de este tipo
2. Mostrar como elegibles a todas las personas con rol 'Ponente' en esos eventos

---

### Regla 12: Certificado de Participación en Evento General de SEDIPRO UNT

**Personas elegibles**: Todas las personas que están vinculadas al evento seleccionado y ocupan el rol de **'Participante'** en la tabla `evento_persona`.

**Contexto requerido**: **Evento** (obligatorio, solo eventos generales con `proyecto_id = NULL`).

**Proceso**:
1. El campo de selección de evento aparece dinámicamente
2. Solo muestra eventos generales (sin proyecto) que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un evento, se muestran los participantes de ese evento

---

### Regla 13: Certificado de Participación como Ponente para Proyecto

**Personas elegibles**: Todas las personas asociadas a proyectos (mediante los eventos de esos proyectos, pero solo eventos con `tipo` diferente de 'Ejecución de proyecto') que **NO están vinculados** a algún grupo de certificación validado que esté asociado a este tipo de certificación, y que tienen únicamente el rol de **'Ponente'** en la tabla `evento_persona`.

**Contexto requerido**: Ninguno (se muestran todos los proyectos disponibles con eventos no de ejecución).

**Proceso**:
1. Obtener todos los proyectos (con al menos 1 evento asociado con tipo diferente de 'Ejecución de proyecto') que NO están vinculados a grupos validados de este tipo
2. Obtener eventos de esos proyectos (excluyendo 'Ejecución de proyecto')
3. Mostrar como elegibles a todas las personas con rol 'Ponente' en esos eventos

---

### Regla 14: Certificado de Participación en Evento de Proyecto

**Personas elegibles**: Todas las personas que están vinculadas al evento del proyecto seleccionado y ocupan el rol de **'Participante'** en la tabla `evento_persona`.

**Contexto requerido**: **Proyecto** y **Evento** (ambos obligatorios, el evento depende del proyecto).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, aparece el campo de selección de evento
4. El evento solo muestra eventos del proyecto seleccionado
5. Al seleccionar un evento, se muestran los participantes de ese evento

---

### Regla 15: Certificado de Participación en Ejecución de Proyecto

**Personas elegibles**: Todas las personas que están vinculadas al evento de ejecución (evento único con campo `tipo` igual a **'Ejecución de proyecto'**) del proyecto seleccionado y que ocupan el rol de **'Participante'** en la tabla `evento_persona`.

**Contexto requerido**: **Proyecto** (obligatorio).

**Proceso**:
1. El campo de selección de proyecto aparece dinámicamente
2. Solo muestra proyectos que NO están vinculados a grupos validados de este tipo
3. Al seleccionar un proyecto, se muestran automáticamente los participantes del evento de ejecución de ese proyecto

---

### Regla 16: Certificado de Valores Destacados

**Personas elegibles**: Todos los miembros de SEDIPRO ganadores de los diferentes valores destacados en el año y periodo seleccionados.

**Contexto requerido**: **Año** y **Periodo** (ambos obligatorios).

**Proceso**:
1. Los campos de selección de año y periodo aparecen dinámicamente
2. Solo muestran años y periodos de los que se tenga registro de ganadores a algún valor destacado en la tabla `area_persona_valor_destacado`
3. Para la selección, se toman solo los años y periodos donde algún registro de `area_persona_valor_destacado` tenga el campo `estado_certificacion` igual a **'FALSE'**
4. Al seleccionar año y periodo, se muestran los miembros ganadores de valores destacados en ese periodo

---

### Nota Importante sobre Grupos Validados

**Cuando se menciona "grupo de certificación validado"**, se refiere a los registros en la tabla `grupos_de_certificacion` que tienen en su campo `estado` el valor de **'Validado'**.

Esto significa que:
- Un proyecto/evento que ya tiene un grupo validado de un tipo específico **NO puede volver a certificarse** con ese mismo tipo
- Esto previene duplicación de certificaciones para el mismo contexto
- Solo los grupos con estado 'Validado' se consideran para esta exclusión

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
- **Atributos clave**: Nombre, tipo, fecha de generación, contexto (proyecto/evento/área)
- **Relaciones**: Certificados, usuario generador, tipo de certificación, proyecto (opcional), evento (opcional)

**Regla de Dominio Crítica**: 
- Un grupo de certificación **siempre está ligado a un tipo de certificado**.
- El tipo de certificado **define todas las reglas de elegibilidad y comportamiento** del grupo.
- El grupo hereda las características del tipo de certificado (contexto obligatorio, firmas requeridas, texto base).

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

### 5. Formularios Dinámicos y Filtrado de Personas

**Regla**: El comportamiento de los formularios y la disponibilidad de personas se determina por el tipo de certificado seleccionado.

**Aplicación**:

1. **Formularios Dinámicos**:
   - Los campos de contexto (proyecto, evento, área) aparecen **solo si el tipo de certificado los requiere**
   - El sistema valida en backend que el contexto proporcionado sea válido para el tipo
   - Esta es una **regla de dominio**, no solo una característica de UI

2. **Filtrado Dinámico de Personas**:
   - La lista de personas disponibles se filtra automáticamente según:
     - Reglas de elegibilidad del tipo de certificado
     - Contexto seleccionado (proyecto/evento/área)
     - Reglas del estatuto (retiro por bajo rendimiento, tiempo mínimo, etc.)
   - Personas no elegibles **nunca aparecen** en la lista de selección
   - El filtrado se realiza en el backend usando servicios de dominio

3. **Validación en Múltiples Capas**:
   - Frontend: Oculta campos y filtra opciones según tipo seleccionado
   - Backend: Valida que el contexto sea correcto y que las personas sean elegibles
   - Dominio: Servicios de elegibilidad determinan quién puede recibir cada tipo

**Esta regla garantiza** que:
- Los usuarios no pueden crear grupos con configuración inválida
- Los usuarios solo ven personas que realmente pueden recibir el certificado
- El sistema mantiene integridad de datos independientemente de la interfaz

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

