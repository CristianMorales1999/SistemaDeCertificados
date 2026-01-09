# Dominio Técnico - SEDICERT

**Versión**: 1.0  
**Fecha**: 2025  
**Estado**: Definición Pre-Implementación

---

## Propósito de este Documento

Este documento define **cómo debe representarse el dominio en el código** de SEDICERT, siguiendo principios de diseño orientado al dominio (DDD ligero) y separación de responsabilidades.

**OBJETIVO**: Servir como **guía obligatoria** para cualquier implementación o refactorización posterior, evitando lógica dispersa o acoplada.

⚠️ **IMPORTANTE**: Este documento define **estructura y responsabilidades**, NO código específico. Es la base para implementación controlada en Laravel 12.

---

## 1. Entidades del Dominio

### 1.1 Persona

**Responsabilidad Principal**: Representar a un miembro o persona externa de SEDIPRO UNT.

**Atributos Relevantes**:
- `id`: Identificador único
- `nombres`, `apellidos`: Nombre completo
- `codigo`: Código derivado del nombre completo (NO es único)
- `correo_personal`, `correo_institucional`: Contacto
- `sexo`: Género
- `imagen_firma`: Ruta de firma digitalizada

**Nota sobre el código**:
- El `codigo` de Persona **NO ES ÚNICO** y puede repetirse entre personas distintas.
- Es un código derivado del nombre completo que se genera así:
  - Se toma la primera letra de cada palabra del nombre completo (nombres y apellidos).
  - Las posiciones impares mantienen la letra.
  - Las posiciones pares se transforman en números según la posición de la letra en el alfabeto (A=1, B=2, …, Z=27).
  - El resultado se concatena en el orden original.
  - El código es determinístico pero **NO único**.
- **Ejemplo**: Para "Christian Anthony Morales Esquivel" → `C1M5` (C=letra, 1=posición de C, M=letra, 5=posición de M en alfabeto)

**Relaciones Clave**:
- `hasMany` → `AreaPersona` (historial de áreas)
- `hasMany` → `Certificado` (certificados recibidos)
- `hasOne` → `User` (opcional, acceso al sistema)
- `belongsToMany` → `Evento` (participación en eventos)

**Reglas que NO debe contener**:
- ❌ Validación de elegibilidad para certificados
- ❌ Cálculo de tiempo de membresía
- ❌ Verificación de estado de retiro

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos básicos de la persona
- ✅ Acceder a su historial a través de relaciones
- ✅ Validaciones básicas de formato (email, etc.)

---

### 1.2 User

**Responsabilidad Principal**: Representar un usuario autenticado del sistema.

**Atributos Relevantes**:
- `id`: Identificador único
- `persona_id`: Relación con Persona
- `name`, `email`: Datos de autenticación
- `password`: Credenciales
- `status`: Estado del usuario

**Relaciones Clave**:
- `belongsTo` → `Persona` (siempre existe)
- `belongsToMany` → `Rol` (multi-rol)
- `hasMany` → `GrupoDeCertificacion` (grupos creados/generados)

**Reglas que NO debe contener**:
- ❌ Lógica de autorización compleja (va en Policies)
- ❌ Validación de permisos por acción (va en Gates)

**Lo que SÍ debe hacer**:
- ✅ Proporcionar método `hasRole()` para verificación básica de roles
- ✅ Gestionar autenticación y sesión
- ✅ Relacionar usuario con persona

---

### 1.3 Area

**Responsabilidad Principal**: Representar una de las 5 áreas oficiales de SEDIPRO UNT.

**Atributos Relevantes**:
- `id`: Identificador único
- `nombre`: Nombre del área (GTH, TI, LTK & FNZ, PMO, MKT)
- `codigo`: Código del área

**Relaciones Clave**:
- `hasMany` → `AreaPersona` (historial de miembros)

**Nota sobre cargos**: Los cargos NO se relacionan directamente con `Area`. La relación se establece a través del historial `AreaPersona` y `AreaPersonaCargo`, no de forma directa con `Area`.

**Reglas que NO debe contener**:
- ❌ Validaciones de elegibilidad
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos del área
- ✅ Validar que sea una de las 5 áreas oficiales

---

### 1.4 AreaPersona (Historial)

**Responsabilidad Principal**: Registrar el historial de pertenencia de una persona a un área.

**Atributos Relevantes**:
- `id`: Identificador único
- `area_id`: Área a la que pertenece
- `persona_id`: Persona
- `fecha_inicio`: Inicio de pertenencia
- `fecha_fin`: Fin de pertenencia (nullable)
- `estado`: Estado de la pertenencia (activo, retirado, retirado por bajo rendimiento, etc.)

**Relaciones Clave**:
- `belongsTo` → `Area`
- `belongsTo` → `Persona`
- `hasMany` → `AreaPersonaCargo` (cargos en ese periodo)
- `belongsToMany` → `Proyecto` (proyectos en ese periodo)

**Reglas que NO debe contener**:
- ❌ Cálculo de tiempo de membresía
- ❌ Validación de elegibilidad

**Lo que SÍ debe hacer**:
- ✅ Registrar cambios históricos (nunca actualizar, siempre crear nuevo)
- ✅ Proporcionar datos históricos para consultas
- ✅ Validar que fechas sean coherentes

**Nota Crítica**: El campo `estado` puede contener "retirado por bajo rendimiento", que es usado por servicios de dominio para validaciones.

---

### 1.5 AreaPersonaCargo

**Responsabilidad Principal**: Registrar el historial de cargos de una persona dentro de un periodo de área.

**Atributos Relevantes**:
- `id`: Identificador único
- `area_persona_id`: Periodo de área
- `cargo_id`: Cargo ocupado
- `proyecto_id`: Proyecto asociado (nullable)
- `fecha_inicio`, `fecha_fin`: Periodo del cargo
- `estado`: Estado del cargo

**Relaciones Clave**:
- `belongsTo` → `AreaPersona`
- `belongsTo` → `Cargo`
- `belongsTo` → `Proyecto` (si aplica)

**Reglas que NO debe contener**:
- ❌ Validaciones de elegibilidad
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Registrar cambios históricos de cargos
- ✅ Proporcionar datos históricos

---

### 1.6 Certificado

**Responsabilidad Principal**: Representar un certificado generado y emitido.

**Atributos Relevantes**:
- `id`: Identificador único (garante de unicidad real)
- `persona_id`: Persona certificada
- `grupo_de_certificacion_id`: Grupo al que pertenece
- `codigo`: Parte semántica del código de validación (NO es único por sí solo)
- `estado`: Estado del certificado (generado, válido, revocado)

**Nota sobre el código de validación**:
- El campo `codigo` **NO ES ÚNICO** por sí solo.
- El código completo de validación se construye combinando:
  - La parte semántica (`codigo`): `SEDIPRO-UNT-[ABREVIATURA DE TIPO]-[AÑO]-[CÓDIGO ALFANUMERICO DEL NOMBRE]`
  - El `id` del certificado como identificador único final
- **Formato completo**: `SEDIPRO-UNT-[ABREVIATURA]-[AÑO]-[CÓDIGO NOMBRE]-[ID]`
- **Ejemplo**: `SEDIPRO-UNT-EGR-2022-C1M5-149`
  - `SEDIPRO-UNT-EGR-2022-C1M5` es la parte semántica (almacenada en `codigo`)
  - `149` es el `id` del certificado (garante de unicidad)
- El código completo es el que se usa para validación pública.
- El `id` es el garante de unicidad real.

**Nota sobre QR**:
- El QR **NO se almacena** en el sistema.
- El QR se genera **dinámicamente** al momento de visualización o descarga.
- El QR contiene la URL de validación junto con el código completo del certificado.
- La imagen QR **NO se persiste** en el sistema.

**Relaciones Clave**:
- `belongsTo` → `Persona` (debe llamarse `persona()`, no `person()`)
- `belongsTo` → `GrupoDeCertificacion`
- Acceso indirecto a `TipoDeCertificacion` a través de `GrupoDeCertificacion`

**Reglas que NO debe contener**:
- ❌ Generación de código único (va en servicio)
- ❌ Generación de QR (va en servicio)
- ❌ Validación de elegibilidad (va en servicio)

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos del certificado
- ✅ Validaciones básicas de formato
- ✅ Relaciones con otras entidades

---

### 1.7 TipoDeCertificacion

**Responsabilidad Principal**: Representar un tipo de certificado disponible en el sistema.

**Atributos Relevantes**:
- `id`: Identificador único
- `nombre`: Nombre del tipo (ej: "Certificado de Egresado")
- `descripcion`: Descripción del tipo
- `codigo`: Código único (ej: "EGR", "RV", "DIR")

**Relaciones Clave**:
- `hasMany` → `GrupoDeCertificacion`

**Reglas que NO debe contener**:
- ❌ Validación de elegibilidad (va en servicio)
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos del tipo
- ✅ Métodos helper para identificar si requiere membresía o permite externos
- ✅ Validar que sea uno de los 16 tipos válidos

**Nota**: Debe tener métodos o constantes que indiquen:
- Si requiere membresía (historial en `area_persona`)
- Si permite externos
- Si requiere tiempo mínimo de membresía

---

### 1.8 GrupoDeCertificacion

**Responsabilidad Principal**: Representar un lote de certificados generados juntos.

**Atributos Relevantes**:
- `id`: Identificador único
- `tipo_de_certificacion_id`: Tipo de certificado
- `nombre`: Nombre del grupo
- `descripcion`: Descripción
- `proyecto_id`: Proyecto asociado (nullable)
- `evento_id`: Evento asociado (nullable)
- `usuario_creador_id`: Usuario que creó el grupo
- `usuario_generador_id`: Usuario que generó los certificados
- `fecha_emision`, `fecha_generacion`: Fechas relevantes
- `estado`: Estado del grupo

**Relaciones Clave**:
- `belongsTo` → `TipoDeCertificacion`
- `belongsTo` → `Proyecto` (nullable)
- `belongsTo` → `Evento` (nullable)
- `belongsTo` → `User` (creador y generador)
- `hasMany` → `Certificado`

**Reglas que NO debe contener**:
- ❌ Validación de elegibilidad de personas (va en servicio)
- ❌ Generación de certificados (va en servicio)
- ❌ Validación de contexto (va en servicio)

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos del grupo
- ✅ Validar que contexto sea coherente con tipo de certificado
- ✅ Relaciones con otras entidades

---

### 1.9 Proyecto

**Responsabilidad Principal**: Representar un proyecto institucional de SEDIPRO UNT.

**Atributos Relevantes**:
- `id`: Identificador único
- `nombre`: Nombre del proyecto
- `area_id`: Área responsable(nullable)
- `fecha_inicio`, `fecha_fin`: Fechas del proyecto
- `imagen_logo`: Logo del proyecto

**Relaciones Clave**:
- `belongsTo` → `Area`(nullable)
- `hasMany` → `Evento`
- `hasMany` → `GrupoDeCertificacion`
- `belongsToMany` → `AreaPersona` (miembros del proyecto)

**Reglas que NO debe contener**:
- ❌ Validación de elegibilidad (va en servicio)
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos del proyecto
- ✅ Validaciones básicas de formato y fechas

---

### 1.10 Evento

**Responsabilidad Principal**: Representar un evento organizado por SEDIPRO UNT.

**Atributos Relevantes**:
- `id`: Identificador único
- `nombre`: Nombre del evento
- `proyecto_id`: Proyecto asociado (nullable)
- `fecha`: Fecha del evento
- `tipo`: Tipo de evento

**Relaciones Clave**:
- `belongsTo` → `Proyecto` (nullable)
- `hasMany` → `GrupoDeCertificacion`
- `belongsToMany` → `Persona` (ponentes y participantes)

**Reglas que NO debe contener**:
- ❌ Validación de elegibilidad (va en servicio)
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos del evento
- ✅ Validaciones básicas

---

### 1.11 Firma

**Responsabilidad Principal**: Representar una firma requerida para un tipo de certificado.

**Atributos Relevantes**:
- `id`: Identificador único
- `tipo_de_certificacion_id`: Tipo de certificado
- `persona_id`: Persona que debe firmar
- `orden`: Orden de la firma
- `tipo_firma`: Tipo (digital, física, etc.)

**Nota**: Esta entidad puede estar implementada como tabla o como configuración. Debe definir qué firmas son requeridas para cada tipo de certificado.

**Reglas que NO debe contener**:
- ❌ Validación de disponibilidad de firmantes (va en servicio)
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Proporcionar configuración de firmas por tipo
- ✅ Definir orden de firmas

---

### 1.12 Imagen / Plantilla

**Responsabilidad Principal**: Representar imágenes y plantillas usadas en certificados.

**Atributos Relevantes**:
- `id`: Identificador único
- `ruta`: Ruta del archivo
- `tipo`: Tipo de imagen (plantilla, logo, sello, etc.)
- `descripcion`: Descripción

**Relaciones Clave**:
- Usada por `GrupoDeCertificacion` (plantilla, logo, sello)

**Reglas que NO debe contener**:
- ❌ Validación de uso (va en servicio)
- ❌ Lógica de negocio

**Lo que SÍ debe hacer**:
- ✅ Proporcionar datos de la imagen
- ✅ Validaciones básicas de formato

---

## 2. Servicios de Dominio Requeridos

### 2.1 ServicioElegibilidadCertificacion

**Problema que Resuelve**: Determinar si una persona es elegible para recibir un tipo específico de certificado, considerando todas las reglas del dominio.

**Datos que Consume**:
- `Persona` (con su historial)
- `TipoDeCertificacion`
- `Proyecto` o `Evento` (si aplica como contexto)

**Resultado que Produce**:
- `bool`: Es elegible o no
- `array`: Razones de rechazo (si no es elegible)
- `array`: Información de validación (tiempo de membresía, estado, etc.)

**Reglas que Encapsula**:
- Verificar si el tipo requiere membresía o permite externos
- Verificar si la persona tiene historial en `area_persona` (si es requerido)
- Verificar si está retirada por bajo rendimiento (regla de exclusión absoluta)
- Verificar tiempo mínimo de membresía (para Egresado/Retiro Voluntario)
- Verificar asociación con contexto (proyecto/evento/área) si es requerido

**Dónde se Usa**:
- Filtrado de personas elegibles en interfaces
- Validación antes de generar certificados
- Validación en generación masiva

**Dependencias**:
- `ServicioTiempoMembresia`
- `ServicioEstadoPersona`

---

### 2.2 ServicioTiempoMembresia

**Problema que Resuelve**: Calcular el tiempo total de membresía de una persona en SEDIPRO UNT, considerando cambios de área como continuidad.

**Datos que Consume**:
- `Persona` (con su historial completo en `AreaPersona`)

**Resultado que Produce**:
- `int`: Tiempo total en días
- `int`: Tiempo total en años (redondeado)
- `array`: Detalle por periodos (para debugging/auditoría)

**Reglas que Encapsula**:
- Sumar todos los periodos de pertenencia en `area_persona`
- Considerar cambios de área como continuidad (no reinicia el tiempo)
- Manejar solapamientos de fechas (si existen)
- Manejar periodos sin fecha_fin (activo actualmente)
- Validar que el tiempo mínimo sea 1 año (365 días) para Egresado/Retiro Voluntario

**Dónde se Usa**:
- `ServicioElegibilidadCertificacion` (para validar tiempo mínimo)
- Validación de certificados de Egresado/Retiro Voluntario

**Dependencias**:
- Ninguna (servicio base)

---

### 2.3 ServicioEstadoPersona

**Problema que Resuelve**: Determinar el estado actual y histórico de una persona respecto a SEDIPRO UNT, especialmente si está retirada por bajo rendimiento.

**Datos que Consume**:
- `Persona` (con su historial completo en `AreaPersona`)

**Resultado que Produce**:
- `string`: Estado actual (activo, egresado, retirado, retirado por bajo rendimiento)
- `bool`: Está retirada por bajo rendimiento
- `array`: Historial de estados (para auditoría)

**Reglas que Encapsula**:
- Consultar historial completo en `area_persona`
- Identificar si algún registro tiene estado "retirado por bajo rendimiento"
- Determinar estado actual basado en el registro más reciente
- Aplicar regla de exclusión absoluta: si está retirada por bajo rendimiento, NO puede recibir ningún certificado

**Dónde se Usa**:
- `ServicioElegibilidadCertificacion` (para validar exclusión)
- Filtrado de personas en interfaces
- Validación antes de generar certificados

**Dependencias**:
- Ninguna (servicio base)

---

### 2.4 ServicioGeneracionCertificados

**Problema que Resuelve**: Orquestar la generación de certificados individuales o masivos, coordinando validaciones, generación de códigos, QR y PDFs.

**Datos que Consume**:
- `GrupoDeCertificacion`
- `Collection<Persona>`: Lista de personas a certificar
- Configuración de plantilla, firmas, etc.

**Resultado que Produce**:
- `Collection<Certificado>`: Certificados generados
- `array`: Errores por persona (si los hay)
- `array`: Estadísticas de generación

**Reglas que Encapsula**:
- Validar elegibilidad de cada persona (usa `ServicioElegibilidadCertificacion`)
- Generar parte semántica del código por certificado (usa `ServicioCodigoUnico`)
- Crear registro de certificado (el `id` garantiza unicidad del código completo)
- Generar QR dinámicamente por certificado (usa `ServicioGeneracionQR`, no se almacena)
- Generar PDF por certificado (usa `ServicioGeneracionPDF`)
- Manejar errores individuales sin detener el proceso masivo
- Registrar auditoría de generación

**Dónde se Usa**:
- Controladores de generación de certificados
- Comandos de generación masiva
- Jobs de cola (futuro)

**Dependencias**:
- `ServicioElegibilidadCertificacion`
- `ServicioCodigoUnico`
- `ServicioGeneracionQR`
- `ServicioGeneracionPDF`

---

### 2.5 ServicioValidacionCertificados

**Problema que Resuelve**: Validar un certificado mediante código único o QR, y proporcionar datos públicos para visualización.

**Datos que Consume**:
- `string`: Código único del certificado

**Resultado que Produce**:
- `Certificado`: Certificado encontrado (si existe)
- `array`: Datos públicos del certificado
- `bool`: Es válido
- `string`: Razón de invalidez (si no es válido)

**Reglas que Encapsula**:
- Buscar certificado por código único
- Verificar que el certificado existe
- Verificar que el certificado está activo (no revocado)
- Preparar datos públicos (ocultar información sensible)
- Determinar si el visitante puede descargar (solo si es la persona certificada y está autenticada)

**Dónde se Usa**:
- Controlador de validación pública
- Componente Livewire de validación
- API de validación (si se implementa)

**Dependencias**:
- Ninguna (servicio independiente)

---

### 2.6 ServicioCodigoUnico

**Problema que Resuelve**: Generar la parte semántica del código de validación para certificados.

**Datos que Consume**:
- `TipoDeCertificacion` (para abreviatura)
- `Persona` (para código alfanumérico del nombre)
- Año de emisión del certificado

**Resultado que Produce**:
- `string`: Parte semántica del código (ej: `SEDIPRO-UNT-EGR-2022-C1M5`)
- El código completo se construye agregando el `id` del certificado al final

**Reglas que Encapsula**:
- Generar código según formato: `SEDIPRO-UNT-[ABREVIATURA]-[AÑO]-[CÓDIGO NOMBRE]`
- Usar abreviatura del tipo de certificación (ej: EGR, RV, DIR)
- Usar año de emisión del certificado
- Usar código alfanumérico derivado del nombre de la persona
- El código completo (con `id`) garantiza unicidad

**Dónde se Usa**:
- `ServicioGeneracionCertificados`

**Dependencias**:
- Ninguna (servicio base)

---

### 2.7 ServicioGeneracionQR

**Problema que Resuelve**: Generar códigos QR para certificados con URL de validación de forma dinámica.

**Datos que Consume**:
- `Certificado` (con su código completo de validación)
- Configuración de URL base

**Resultado que Produce**:
- `string`: Contenido del QR (imagen) generado dinámicamente
- `string`: URL de validación completa

**Reglas que Encapsula**:
- Construir código completo de validación: `{codigo_semantico}-{id_certificado}`
- Construir URL de validación: `{url_base}/validar/{codigo_completo}`
- Generar QR con la URL de forma dinámica
- **NO guardar** archivo QR en sistema de archivos
- **NO persistir** la imagen QR

**Dónde se Usa**:
- `ServicioGeneracionCertificados`

**Dependencias**:
- Ninguna (servicio base, usa librería QR)

---

### 2.8 ServicioGeneracionPDF

**Problema que Resuelve**: Generar PDFs de certificados con plantilla, datos dinámicos y firmas.

**Datos que Consume**:
- `Certificado`
- `Persona`
- `GrupoDeCertificacion` (con plantilla, logos, sellos)
- Configuración de firmas
- Datos dinámicos (texto base, reemplazos)

**Resultado que Produce**:
- `string`: Contenido del PDF (binario)
- `string`: Ruta del archivo PDF guardado (opcional)

**Reglas que Encapsula**:
- Cargar plantilla desde `GrupoDeCertificacion`
- Reemplazar datos dinámicos (nombre, cargo, área, fecha, etc.)
- Incluir firmas en orden correcto
- Incluir código completo de validación y QR (generado dinámicamente)
- Aplicar estilos definidos
- Generar PDF usando dompdf
- Guardar PDF en sistema de archivos (opcional)

**Dónde se Usa**:
- `ServicioGeneracionCertificados`
- Descarga individual de certificados

**Dependencias**:
- Ninguna (servicio base, usa dompdf)

---

### 2.9 ServicioFiltradoPersonas

**Problema que Resuelve**: Filtrar personas elegibles según tipo de certificado y contexto, aplicando todas las reglas de elegibilidad.

**Datos que Consume**:
- `TipoDeCertificacion`
- `Proyecto` o `Evento` (si aplica como contexto)
- Parámetros de búsqueda (opcional)

**Resultado que Produce**:
- `Collection<Persona>`: Personas elegibles
- `array`: Estadísticas de filtrado (cuántas fueron excluidas y por qué)

**Reglas que Encapsula**:
- Determinar si el tipo requiere membresía o permite externos
- Filtrar por contexto (proyecto/evento/área) si es requerido
- Excluir personas retiradas por bajo rendimiento (usa `ServicioEstadoPersona`)
- Filtrar por tiempo mínimo de membresía si aplica (usa `ServicioTiempoMembresia`)
- Aplicar todas las reglas de elegibilidad (usa `ServicioElegibilidadCertificacion`)

**Dónde se Usa**:
- Interfaces de selección de personas
- Componentes Livewire de generación
- APIs de búsqueda

**Dependencias**:
- `ServicioElegibilidadCertificacion`
- `ServicioEstadoPersona`
- `ServicioTiempoMembresia`

---

## 3. Reglas que NO deben ir en Modelos ni Controladores

### 3.1 Reglas de Negocio Críticas

#### ❌ NO en Modelos:
- Validación de elegibilidad para certificados
- Cálculo de tiempo de membresía
- Verificación de estado de retiro por bajo rendimiento
- Validación de contexto (proyecto/evento/área) según tipo de certificado
- Generación de códigos únicos
- Generación de QR
- Generación de PDFs

#### ❌ NO en Controladores:
- Lógica de validación de elegibilidad
- Cálculo de tiempo de membresía
- Filtrado de personas elegibles
- Generación de certificados (orquestación)
- Validación de reglas del estatuto

#### ✅ Dónde SÍ deben ir:
- **Servicios de Dominio**: Toda la lógica de negocio compleja
- **Policies**: Autorización por modelo
- **Gates**: Autorización por acción
- **Form Requests**: Validación de entrada de datos
- **Validators**: Validaciones reutilizables

---

### 3.2 Validaciones Complejas

#### Validación de Elegibilidad
- **Dónde**: `ServicioElegibilidadCertificacion`
- **Por qué**: Lógica compleja que involucra múltiples entidades y reglas

#### Validación de Tiempo Mínimo
- **Dónde**: `ServicioTiempoMembresia` + `ServicioElegibilidadCertificacion`
- **Por qué**: Cálculo complejo que requiere análisis de historial

#### Validación de Estado de Retiro
- **Dónde**: `ServicioEstadoPersona` + `ServicioElegibilidadCertificacion`
- **Por qué**: Consulta de historial y aplicación de regla de exclusión

#### Validación de Contexto
- **Dónde**: `ServicioElegibilidadCertificacion`
- **Por qué**: Depende del tipo de certificado y requiere validación de relaciones

---

### 3.3 Decisiones de Elegibilidad

#### ¿Requiere membresía o permite externos?
- **Dónde**: `TipoDeCertificacion` (método/constante) + `ServicioElegibilidadCertificacion`
- **Por qué**: Es una propiedad del tipo, pero la decisión se toma en el servicio

#### ¿Está retirada por bajo rendimiento?
- **Dónde**: `ServicioEstadoPersona`
- **Por qué**: Requiere análisis de historial completo

#### ¿Cumple tiempo mínimo?
- **Dónde**: `ServicioTiempoMembresia` + `ServicioElegibilidadCertificacion`
- **Por qué**: Cálculo complejo que debe estar centralizado

#### ¿Está asociada al contexto requerido?
- **Dónde**: `ServicioElegibilidadCertificacion`
- **Por qué**: Validación que depende de múltiples factores

---

## 4. Flujos Técnicos Recomendados

### 4.1 Generación Individual de Certificado

```
Usuario (Frontend)
    ↓
Controlador (HTTP Request)
    ↓ [1. Validar autorización]
Policy::authorize('generate', GrupoDeCertificacion)
    ↓ [2. Validar entrada]
FormRequest::validated()
    ↓ [3. Delegar a servicio]
ServicioGeneracionCertificados::generarIndividual(
    grupo: GrupoDeCertificacion,
    persona: Persona
)
    ↓ [4. Validar elegibilidad]
ServicioElegibilidadCertificacion::esElegible(
    persona: Persona,
    tipo: TipoDeCertificacion,
    contexto: Proyecto|Evento|null
)
    ├─ NO → Lanzar ExcepcionElegibilidad
    └─ SÍ → Continuar
     ↓ [5. Generar parte semántica del código]
ServicioCodigoUnico::generar(tipo, persona, año)
     ↓ [6. Crear registro]
Certificado::create([codigo: parte_semantica, ...])
     ↓ [7. Construir código completo]
codigo_completo = "{codigo}-{certificado->id}"
     ↓ [8. Generar QR dinámicamente]
ServicioGeneracionQR::generar(certificado: Certificado)
     ↓ [9. Generar PDF]
ServicioGeneracionPDF::generar(certificado: Certificado)
    ↓ [9. Persistir]
Certificado::save()
    ↓ [10. Retornar]
Response::json(certificado)
```

**Principios aplicados**:
- Controlador solo orquesta, no contiene lógica
- Servicios encapsulan reglas de negocio
- Modelos solo persisten y relacionan
- Validaciones en capas apropiadas

---

### 4.2 Generación Masiva de Certificados

```
Usuario (Frontend)
    ↓
Controlador (HTTP Request)
    ↓ [1. Validar autorización]
Policy::authorize('generate', GrupoDeCertificacion)
    ↓ [2. Validar entrada]
FormRequest::validated()
    ↓ [3. Delegar a servicio]
ServicioGeneracionCertificados::generarMasivo(
    grupo: GrupoDeCertificacion,
    personas: Collection<Persona>
)
    ↓ [4. Para cada persona]
    ├─ Validar elegibilidad
    │   ServicioElegibilidadCertificacion::esElegible(...)
    │   ├─ NO → Registrar error, continuar siguiente
    │   └─ SÍ → Continuar
     ├─ Generar certificado
     │   ServicioCodigoUnico::generar(...)
     │   Certificado::create([codigo: parte_semantica, ...])
     │   codigo_completo = "{codigo}-{certificado->id}"
     │   ServicioGeneracionQR::generar(...) (dinámico, no se almacena)
     │   ServicioGeneracionPDF::generar(...)
    └─ Registrar éxito
    ↓ [5. Retornar resultado]
Response::json([
    certificados_generados: int,
    errores: array,
    estadisticas: array
])
```

**Principios aplicados**:
- Procesamiento en lote con manejo de errores individuales
- Servicio orquesta todo el proceso
- Controlador solo recibe y retorna

---

### 4.3 Validación Pública por Código

```
Visitante (Frontend)
    ↓
Controlador (HTTP Request - Público)
    ↓ [1. Validar entrada]
FormRequest::validated(['codigo' => 'required|string'])
    ↓ [2. Delegar a servicio]
ServicioValidacionCertificados::validar(codigo: string)
    ↓ [3. Buscar certificado]
Certificado::where('codigo', codigo)->first()
    ├─ NO EXISTE → Retornar error
    └─ EXISTE → Continuar
    ↓ [4. Verificar validez]
    ├─ ¿Está activo? → Continuar
    └─ ¿Está revocado? → Retornar error
    ↓ [5. Preparar datos públicos]
    array: [
        nombre_completo,
        tipo_certificado,
        fecha_emision,
        contexto,
        codigo,
        es_valido: true
    ]
    ↓ [6. Verificar si puede descargar]
    ¿Usuario autenticado Y es la persona certificada?
    ├─ SÍ → Incluir ruta_descarga
    └─ NO → No incluir ruta_descarga
    ↓ [7. Retornar]
Response::json(datos_publicos)
```

**Principios aplicados**:
- No requiere autenticación (público)
- Servicio encapsula lógica de validación
- Controlador solo expone endpoint

---

### 4.4 Filtrado de Personas Elegibles

```
Usuario (Frontend - Selección)
    ↓
Componente Livewire
    ↓ [1. Obtener parámetros]
    tipo: TipoDeCertificacion,
    contexto: Proyecto|Evento|null
    ↓ [2. Delegar a servicio]
ServicioFiltradoPersonas::filtrar(
    tipo: TipoDeCertificacion,
    contexto: Proyecto|Evento|null
)
    ↓ [3. Determinar criterios]
    ¿Requiere membresía?
    ├─ SÍ → Filtrar por historial en area_persona
    └─ NO → Filtrar por asociación con contexto
    ↓ [4. Aplicar filtros base]
    Collection<Persona> = Persona::query()
        ->whereHas('areaPersonas', ...) // si requiere membresía
        ->orWhereHas('proyectos', ...)  // si permite externos
        ->get()
    ↓ [5. Filtrar por elegibilidad]
    Para cada persona:
        ServicioElegibilidadCertificacion::esElegible(...)
        ├─ NO → Excluir
        └─ SÍ → Incluir
    ↓ [6. Retornar]
    Collection<Persona> (solo elegibles)
    ↓ [7. Mostrar en UI]
    Lista de personas seleccionables
```

**Principios aplicados**:
- Servicio encapsula toda la lógica de filtrado
- Livewire solo consume el servicio
- No hay lógica de negocio en el componente

---

## 5. Estructura de Directorios Recomendada

```
app/
├── Domain/
│   ├── Services/
│   │   ├── ElegibilidadCertificacionService.php
│   │   ├── TiempoMembresiaService.php
│   │   ├── EstadoPersonaService.php
│   │   ├── GeneracionCertificadosService.php
│   │   ├── ValidacionCertificadosService.php
│   │   ├── CodigoUnicoService.php
│   │   ├── GeneracionQRService.php
│   │   ├── GeneracionPDFService.php
│   │   └── FiltradoPersonasService.php
│   ├── Exceptions/
│   │   ├── ElegibilidadException.php
│   │   ├── TiempoMembresiaInsuficienteException.php
│   │   └── PersonaRetiradaException.php
│   └── ValueObjects/
│       ├── CodigoCertificado.php
│       └── TiempoMembresia.php
├── Http/
│   ├── Controllers/
│   │   └── CertificadoController.php (solo orquesta)
│   ├── Requests/
│   │   ├── GenerarCertificadoRequest.php
│   │   └── ValidarCertificadoRequest.php
│   └── Policies/
│       ├── CertificadoPolicy.php
│       └── GrupoDeCertificacionPolicy.php
├── Livewire/
│   └── ... (solo UI, delega a servicios)
└── Models/
    └── ... (solo relaciones y acceso a datos)
```

---

## 6. Principios de Diseño Aplicados

### 6.1 Separación de Responsabilidades

- **Modelos**: Solo datos y relaciones
- **Servicios**: Lógica de negocio
- **Controladores**: Solo orquestación HTTP
- **Policies**: Autorización
- **Form Requests**: Validación de entrada

### 6.2 Single Responsibility Principle

Cada servicio tiene una responsabilidad única y bien definida:
- `ServicioElegibilidadCertificacion`: Solo determina elegibilidad
- `ServicioTiempoMembresia`: Solo calcula tiempo
- `ServicioGeneracionCertificados`: Solo orquesta generación

### 6.3 Dependency Injection

Los servicios se inyectan en controladores y componentes, no se instancian directamente.

### 6.4 Testabilidad

Cada servicio puede ser testeado de forma independiente, sin depender de HTTP o UI.

---

## 7. Notas de Implementación

### 7.1 Orden de Implementación Recomendado

1. **Servicios Base** (sin dependencias):
   - `ServicioTiempoMembresia`
   - `ServicioEstadoPersona`
   - `ServicioCodigoUnico`

2. **Servicios Compuestos**:
   - `ServicioElegibilidadCertificacion` (usa los anteriores)
   - `ServicioFiltradoPersonas` (usa elegibilidad)

3. **Servicios de Generación**:
   - `ServicioGeneracionQR`
   - `ServicioGeneracionPDF`
   - `ServicioGeneracionCertificados` (orquesta todo)

4. **Servicios de Validación**:
   - `ServicioValidacionCertificados`

5. **Policies y Autorización**:
   - `CertificadoPolicy`
   - `GrupoDeCertificacionPolicy`

6. **Refactorización de Controladores**:
   - Mover lógica a servicios
   - Mantener solo orquestación

### 7.2 Consideraciones de Rendimiento

- **Cálculo de tiempo de membresía**: Cachear resultados si es necesario
- **Filtrado de personas**: Usar consultas optimizadas con eager loading
- **Generación masiva**: Considerar Queue para grandes volúmenes

### 7.3 Manejo de Errores

- Usar excepciones de dominio específicas
- No lanzar excepciones genéricas
- Proporcionar mensajes claros para debugging

---

## 8. Validación de Cumplimiento

Para verificar que una implementación sigue este dominio técnico:

✅ **Checklist**:
- [ ] ¿Los modelos solo tienen relaciones y acceso a datos?
- [ ] ¿Los controladores solo orquestan y no contienen lógica de negocio?
- [ ] ¿Las reglas de elegibilidad están en servicios?
- [ ] ¿El cálculo de tiempo de membresía está en servicio?
- [ ] ¿La generación de certificados está en servicio?
- [ ] ¿Las validaciones complejas están en servicios?
- [ ] ¿Las Policies manejan autorización?
- [ ] ¿Los Form Requests validan entrada?

---

## Confirmación

> **El dominio técnico ha sido definido y está listo para implementación controlada en Laravel 12.**

---

**Fin del Documento**

