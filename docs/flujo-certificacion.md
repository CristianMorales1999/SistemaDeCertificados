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

**Validaciones iniciales**:
- Usuario tiene permisos para generar certificados
- Tipo de certificado seleccionado es válido
- Contexto es válido para el tipo de certificado seleccionado

---

### 2. Selección de Personas Elegibles

**Proceso**:

1. El sistema muestra una lista de personas elegibles según:
   - Tipo de certificado seleccionado
   - Contexto seleccionado
   - Reglas del estatuto

2. El usuario selecciona las personas que recibirán certificados

**Filtrado automático**:

El sistema **NO muestra**:
- Personas retiradas por bajo rendimiento (para cualquier tipo de certificado)
- Personas que no cumplen requisitos específicos del tipo de certificado

**Ejemplos de filtrado**:
- Para certificados de **Egresado** o **Retiro Voluntario**: Solo personas con mínimo 1 año de membresía y no retiradas por bajo rendimiento
- Para certificados de **Proyecto**: Solo personas asociadas al proyecto seleccionado
- Para certificados de **Evento**: Solo personas asociadas al evento seleccionado

---

### 3. Validación de Reglas

**Proceso automático**:

El sistema valida para cada persona seleccionada:

1. **Reglas del Estatuto**:
   - Tiempo mínimo de membresía (si aplica)
   - Estado (no retirado por bajo rendimiento)
   - Elegibilidad según tipo de certificado

2. **Reglas de Contexto**:
   - Asociación con área (si aplica)
   - Asociación con proyecto (si aplica)
   - Asociación con evento (si aplica)

3. **Reglas de Firmas**:
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
- Mínimo 1 año de membresía activa
- No retirado por bajo rendimiento
- Historial completo verificado

**Proceso especial**:
- Cálculo de tiempo de membresía considerando cambios de área
- Verificación de estado histórico
- Validación estricta antes de permitir generación

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

