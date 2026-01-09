# Flujo de Certificación

## Visión General

Este documento describe los flujos principales del sistema SEDICERT: la generación de certificados y su validación pública.

---

## Flujo de Generación de Certificados

### 1. Creación de Grupo de Certificación

**Actor**: Usuario autorizado (Marketing o Administrador)

**Proceso**:

1. El usuario accede a la funcionalidad de generación de certificados
2. Crea un nuevo **Grupo de Certificación**
3. Define los siguientes parámetros:
   - **Nombre del grupo**: Identificador descriptivo
   - **Tipo de certificado**: Selección de uno de los 16 tipos disponibles
   - **Contexto** (si aplica):
     - Área específica
     - Proyecto específico
     - Evento específico
     - Ninguno (para certificados generales)

**Regla de Dominio Crítica**: 
- Un grupo de certificación **siempre está ligado a un tipo de certificado**.
- El tipo de certificado **define el comportamiento del formulario** y las reglas de elegibilidad.

**Comportamiento Dinámico del Formulario**:

El formulario de creación de grupos se comporta de manera **dinámica según el tipo de certificado seleccionado**:

1. **Campos de contexto condicionales**:
   - Si el tipo requiere **proyecto** → El campo "Proyecto" aparece y es obligatorio
   - Si el tipo requiere **evento** → El campo "Evento" aparece y es obligatorio
   - Si el tipo requiere **área** → El campo "Área" aparece y es obligatorio
   - Si el tipo no requiere contexto → Estos campos no aparecen

2. **Validación en tiempo real**:
   - Al seleccionar el tipo de certificado, el sistema valida qué contexto es necesario
   - Los campos no requeridos se ocultan automáticamente
   - Los campos requeridos se marcan como obligatorios

3. **Filtrado de opciones**:
   - Las listas desplegables (proyectos, eventos, áreas) se filtran según disponibilidad
   - Solo se muestran opciones válidas para el tipo de certificado seleccionado

**Esta regla forma parte del dominio del sistema**, no solo de la interfaz. El backend valida que el contexto proporcionado sea el correcto para el tipo de certificado.

**Validaciones iniciales**:
- Usuario tiene permisos para generar certificados
- Tipo de certificado seleccionado es válido
- Contexto es válido para el tipo de certificado seleccionado (validado por reglas del dominio)

---

### 2. Selección de Personas Elegibles

**Proceso**:

1. El sistema muestra una lista de personas elegibles según:
   - Tipo de certificado seleccionado
   - Contexto seleccionado
   - Reglas del estatuto

2. El usuario selecciona las personas que recibirán certificados

**Filtrado Dinámico de Personas**:

El sistema aplica **filtrado automático basado en reglas del dominio**:

- **El tipo de certificado define qué personas son elegibles**
- **El contexto (proyecto/evento/área) filtra adicionalmente las opciones**
- **Las reglas del estatuto se aplican universalmente**

**Regla de Dominio**: La tabla de personas disponibles se **filtra dinámicamente** según las reglas del tipo de certificado. **No deben mostrarse personas no elegibles** en la interfaz.

El sistema **NO muestra**:
- Personas retiradas por bajo rendimiento (para **cualquier tipo de certificado**, sin excepción)
- Personas que no cumplen requisitos específicos del tipo de certificado
- Personas que no están asociadas al contexto requerido (proyecto/evento/área)

**Reglas de filtrado por tipo de certificado**:

#### Certificados que requieren membresía (historial en `area_persona`):
- **Egresado** o **Retiro Voluntario**: 
  - ✅ Debe tener historial en `area_persona`
  - ✅ Mínimo 1 año de membresía (calculado desde historial)
  - ✅ NO retirado por bajo rendimiento
- **Directiva, Director/Co-Director/Coordinador de Proyecto, Miembro Interno, Staff Interno, Valores Destacados**:
  - ✅ Debe tener historial en `area_persona`
  - ✅ NO retirado por bajo rendimiento
  - ✅ Asociado al contexto requerido (área/proyecto según corresponda)

#### Certificados que permiten externos (NO requieren historial en `area_persona`):
- **Miembro Externo, Staff Externo, Ponente, Participante**:
  - ✅ Asociado al proyecto/evento correspondiente
  - ⚠️ **EXCEPCIÓN**: Si la persona SÍ es miembro de SEDIPRO y está retirada por bajo rendimiento, **NO puede recibir ningún certificado** (ni siquiera estos)

**Ejemplos de filtrado**:
- Para certificados de **Egresado** o **Retiro Voluntario**: Solo personas con historial en `area_persona`, mínimo 1 año de membresía y no retiradas por bajo rendimiento
- Para certificados de **Proyecto (Internos)**: Solo personas con historial en `area_persona`, asociadas al proyecto y no retiradas por bajo rendimiento
- Para certificados de **Proyecto (Externos)**: Personas asociadas al proyecto (pueden no tener historial en `area_persona`, pero si lo tienen y están retiradas por bajo rendimiento, se excluyen)
- Para certificados de **Evento**: Personas asociadas al evento (misma regla de exclusión por retiro)

---

### 3. Validación de Reglas

**Proceso automático**:

El sistema valida para cada persona seleccionada:

1. **Reglas de Elegibilidad por Tipo de Certificado**:
   - **Si el tipo requiere membresía**: Verificar que tenga historial en `area_persona`
   - **Si el tipo permite externos**: Verificar asociación con proyecto/evento (pero aún así excluir si está retirado por bajo rendimiento)

2. **Reglas del Estatuto**:
   - **Tiempo mínimo de membresía**: Solo para Egresado/Retiro Voluntario
     - Calcular tiempo total desde historial `area_persona`
     - Considerar cambios de área como continuidad
     - Validar mínimo 1 año
   - **Estado de retiro**: Para **TODOS los tipos de certificado**
     - Consultar estado en historial `area_persona`
     - Si está retirado por bajo rendimiento → **RECHAZAR** (sin excepción)

3. **Reglas de Contexto**:
   - Asociación con área (si aplica)
   - Asociación con proyecto (si aplica)
   - Asociación con evento (si aplica)

4. **Reglas de Firmas**:
   - Verificación de firmantes requeridos disponibles
   - Validación de configuración de firmas

**Resultado**:
- Si todas las validaciones pasan → Continúa al siguiente paso
- Si alguna validación falla → Muestra error específico y permite corrección

---

### 4. Generación de Certificados Individuales

**Proceso automático**:

Para cada persona validada, el sistema:

1. **Crea registro de Certificado**:
   - Asocia a la persona
   - Asocia al tipo de certificación
   - Asocia al grupo de certificación
   - Asocia al contexto (si aplica)
   - Establece fecha de generación

2. **Genera código único**:
   - Código irrepetible e irreversible
   - Formato definido (ej: `SEDICERT-YYYY-XXXXXX`)
   - Validación de unicidad en base de datos

3. **Genera QR**:
   - Contiene URL de validación pública
   - Formato: `https://dominio.com/validar/{codigo}`
   - Almacenado junto al certificado

4. **Prepara datos dinámicos**:
   - Nombre completo de la persona
   - Cargo actual (si aplica)
   - Área actual (si aplica)
   - Proyecto/Evento (si aplica)
   - Fecha de emisión
   - Firmantes requeridos

---

### 5. Generación de PDF

**Proceso**:

1. El sistema utiliza el **texto base (speech)** del tipo de certificado
2. Reemplaza las partes dinámicas con datos de la persona
3. Incluye las firmas requeridas según el tipo de certificado
4. Incluye el código único y el QR
5. Genera el PDF usando dompdf

**Estructura del PDF**:
- Encabezado institucional
- Texto del certificado (con datos dinámicos)
- Firmas (en orden requerido)
- Código único y QR (pie de página)

---

### 6. Almacenamiento y Finalización

**Proceso**:

1. **Almacenamiento**:
   - Certificado guardado en base de datos
   - PDF guardado en sistema de archivos
   - QR generado y asociado

2. **Estado**:
   - Certificado marcado como "Generado" o "Válido"
   - Disponible para consulta y validación

3. **Notificación** (opcional):
   - Usuario generador recibe confirmación
   - Personas certificadas pueden ser notificadas (si está implementado)

---

## Flujo de Validación Pública

### 1. Acceso a Validación

**Actor**: Visitante (no requiere autenticación)

**Puntos de entrada**:
- Página web de validación pública
- Escaneo de QR desde certificado físico/digital
- Ingreso manual de código único

---

### 2. Ingreso de Código

**Proceso**:

1. El visitante ingresa el código único del certificado:
   - Manualmente en campo de texto
   - Automáticamente desde QR escaneado

2. El sistema valida formato del código:
   - Estructura correcta
   - Longitud adecuada
   - Caracteres válidos

---

### 3. Búsqueda de Certificado

**Proceso**:

1. El sistema busca el certificado en base de datos usando el código único

2. Validaciones:
   - Certificado existe
   - Certificado está activo/válido
   - Certificado no ha sido revocado (si aplica)

**Resultados posibles**:
- ✅ Certificado encontrado y válido → Continúa
- ❌ Certificado no encontrado → Muestra error
- ❌ Certificado inválido → Muestra error específico

---

### 4. Visualización de Datos Públicos

**Proceso**:

1. El sistema muestra información pública del certificado:
   - Nombre completo de la persona certificada
   - Tipo de certificado
   - Fecha de emisión
   - Contexto (área/proyecto/evento) si aplica
   - Código único
   - Estado de validez

2. **Restricciones para visitantes**:
   - ❌ NO puede descargar el PDF
   - ❌ NO puede ver información sensible
   - ✅ Solo puede ver datos públicos y validar autenticidad

---

### 5. Opciones Adicionales

**Para usuarios autenticados**:

Si el visitante está autenticado y es:
- **La persona certificada**: Puede descargar su propio certificado
- **Usuario con permisos**: Puede ver información adicional según su rol

---

## Diagrama de Flujo Simplificado

### Generación

```
Usuario Autorizado
    ↓
Crear Grupo de Certificación
    ↓
Seleccionar Tipo y Contexto
    ↓
Seleccionar Personas
    ↓
Validar Reglas (Estatuto + Contexto)
    ↓
¿Válido?
    ├─ NO → Mostrar Error → Corregir
    └─ SÍ → Generar Certificados
            ↓
        Para cada persona:
            - Crear registro
            - Generar código único
            - Generar QR
            - Preparar datos
            - Generar PDF
            - Almacenar
    ↓
Finalizar y Confirmar
```

### Validación

```
Visitante
    ↓
Ingresar Código/QR
    ↓
Buscar Certificado
    ↓
¿Encontrado y Válido?
    ├─ NO → Mostrar Error
    └─ SÍ → Mostrar Datos Públicos
            ↓
        ¿Usuario Autenticado?
            ├─ SÍ → Opciones Adicionales
            └─ NO → Solo Visualización
```

---

## Casos Especiales

### Certificados de Egresado/Retiro Voluntario

**Validaciones adicionales**:
- **Mínimo 1 año de membresía activa**:
  - Calcular desde historial completo en `area_persona`
  - Sumar todos los periodos de pertenencia
  - Considerar cambios de área como continuidad (no reinicia el tiempo)
- **No retirado por bajo rendimiento**:
  - Consultar estado en historial `area_persona`
  - Si existe estado de retiro por bajo rendimiento → **RECHAZAR**
- **Historial completo verificado**:
  - Verificar que tenga al menos un registro en `area_persona`
  - Validar fechas de inicio y fin

**Proceso especial**:
- Cálculo de tiempo de membresía considerando cambios de área
- Verificación de estado histórico en `area_persona`
- Validación estricta antes de permitir generación
- **Implementación requerida**: Función o servicio de dominio para calcular tiempo de membresía

---

### Generación Masiva

**Optimización**:
- Procesamiento en lotes
- Queue para grandes volúmenes (futuro)
- Progreso visible para el usuario

**Manejo de errores**:
- Si una persona falla validación, las demás continúan
- Reporte de errores al finalizar
- Opción de reintentar solo los fallidos

---

### Revocación de Certificados

**Proceso** (si está implementado):
- Certificado marcado como "Revocado"
- Razón de revocación registrada
- Validación pública muestra estado "Revocado"
- Historial preservado

---

## Notas Técnicas

### Códigos Únicos

- **Formato**: Definido por configuración
- **Generación**: Algoritmo que garantiza unicidad
- **Validación**: Verificación en base de datos antes de asignar

### QR Codes

- **Contenido**: URL completa de validación
- **Formato**: Estándar QR
- **Tamaño**: Ajustable según diseño del PDF

### PDFs

- **Motor**: dompdf
- **Plantilla**: Blade template con datos dinámicos
- **Almacenamiento**: Sistema de archivos Laravel
- **Ruta**: Definida en configuración

---

## Métricas y Auditoría

### Registro de Acciones

El sistema debe registrar:
- Quién generó cada grupo de certificados
- Cuándo se generó cada certificado
- Quién validó cada certificado (si aplica)
- Errores durante generación

### Reportes

- Certificados generados por período
- Certificados validados por período
- Tipos de certificados más utilizados
- Usuarios más activos en generación

---

## Referencias

- [Dominio del Negocio](./dominio.md) - Reglas de negocio aplicadas
- [Roles y Permisos](./roles-y-permisos.md) - Autorización en flujos
- [Arquitectura](./arquitectura.md) - Implementación técnica

