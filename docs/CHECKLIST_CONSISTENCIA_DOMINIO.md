# Checklist de Consistencia del Dominio - SEDICERT

**Fecha de Validación**: 2025-01-XX  
**Documentos Revisados**: `dominio.md`, `flujo-certificacion.md`, `roles-y-permisos.md`

---

## 1. Reglas de Elegibilidad

### 1.1 Ubicación Conceptual Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Reglas de Elegibilidad por Tipo de Certificado" (líneas 220-252)

**Estado**: ✅ **ÚNICA FUENTE DE VERDAD CONCEPTUAL**

### 1.2 Referencias en Otros Documentos
✅ **REFERENCIADO EN**: `flujo-certificacion.md` - Secciones "Filtrado Dinámico de Personas" (líneas 88-107) y "Validación de Reglas" (líneas 117-128)

**Estado**: ✅ **CONSISTENTE** - Las referencias en `flujo-certificacion.md` son **aplicaciones prácticas** de las reglas definidas en `dominio.md`, no duplicaciones contradictorias.

---

## 2. Regla: Retiro por Bajo Rendimiento

### 2.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Estatuto Institucional" > "Reglas para Personas Retiradas por Bajo Rendimiento" (líneas 89-104)

**Regla**: ❌ **NO pueden ser certificadas** (ningún tipo de certificado, sin excepción)

### 2.2 Referencias
✅ **MENCIONADO EN**: 
- `dominio.md` - Líneas 236, 252
- `flujo-certificacion.md` - Líneas 82, 101, 119, 128, 351

**Estado**: ✅ **CONSISTENTE** - Todas las referencias confirman que es una **exclusión absoluta** sin excepciones.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 3. Regla: Tiempo Mínimo de Membresía

### 3.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Estatuto Institucional" > "Reglas para Certificados de Egresado o Retiro Voluntario" (líneas 72-84)

**Regla**: **Mínimo 1 año** (365 días) de membresía activa, calculado desde historial completo en `area_persona`, considerando cambios de área como continuidad.

**Aplicación**: Solo para certificados de **Egresado** y **Retiro Voluntario**.

### 3.2 Referencias
✅ **MENCIONADO EN**:
- `dominio.md` - Líneas 119, 226-227, 354-357
- `flujo-certificacion.md` - Líneas 91, 104, 122-125, 345-348

**Estado**: ✅ **CONSISTENTE** - Todas las referencias confirman:
- Mínimo 1 año (365 días)
- Solo para Egresado/Retiro Voluntario
- Calculado desde historial completo

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 4. Regla: Certificados Exclusivos para Miembros

### 4.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Reglas de Elegibilidad por Tipo de Certificado" > "Certificados EXCLUSIVOS para Miembros" (líneas 222-236)

**Lista de 9 tipos**:
1. Egresado (requiere mínimo 1 año)
2. Retiro Voluntario (requiere mínimo 1 año)
3. Directiva
4. Director de Proyecto
5. Co-Director de Proyecto
6. Coordinador de Proyecto
7. Miembros Internos del Proyecto
8. Staff Interno de Apoyo de Proyecto
9. Valores Destacados

**Regla general**: Deben tener historial en `area_persona` y NO estar retiradas por bajo rendimiento.

### 4.2 Referencias
✅ **MENCIONADO EN**: `flujo-certificacion.md` - Líneas 88-96

**Estado**: ✅ **CONSISTENTE** - La lista en `flujo-certificacion.md` coincide con la definición en `dominio.md`.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 5. Regla: Certificados que Permiten Externos

### 5.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Reglas de Elegibilidad por Tipo de Certificado" > "Certificados que PUEDEN ser otorgados a Personas Externas" (líneas 238-252)

**Lista de 7 tipos**:
1. Miembros Externos del Proyecto
2. Staff Externo de Apoyo de Proyecto
3. Participación como Ponente de Eventos Generales
4. Participación como Ponente para Proyecto
5. Participación en Evento General
6. Participación en Evento de Proyecto
7. Participación en Ejecución de Proyecto

**Regla general**: NO requieren historial en `area_persona`, pero SÍ requieren asociación con proyecto/evento.

**Excepción crítica**: Si la persona SÍ es miembro y está retirada por bajo rendimiento, NO puede recibir ningún certificado (ni siquiera estos).

### 5.2 Referencias
✅ **MENCIONADO EN**: `flujo-certificacion.md` - Líneas 98-101

**Estado**: ✅ **CONSISTENTE** - La excepción por retiro por bajo rendimiento está claramente documentada en ambos lugares.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 6. Regla: Contexto Obligatorio

### 6.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Características de Cada Tipo de Certificado" > "Contexto Obligatorio" (líneas 178-189)

**Tipos de contexto**:
- **Proyecto**: El grupo debe estar asociado a un proyecto específico
- **Evento**: El grupo debe estar asociado a un evento específico
- **Área**: El grupo debe estar asociado a un área específica
- **Ninguno**: El grupo no requiere contexto adicional

**Implicación en la Interfaz**: Los formularios se comportan dinámicamente según el tipo.

### 6.2 Referencias
✅ **MENCIONADO EN**: 
- `dominio.md` - Líneas 130, 141, 154, 164, 268-271
- `flujo-certificacion.md` - Líneas 22-26, 37-40, 130-133

**Estado**: ✅ **CONSISTENTE** - Todas las referencias confirman que el contexto es determinado por el tipo de certificado.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 7. Regla: Formularios Dinámicos

### 7.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Reglas de Negocio Críticas" > "Formularios Dinámicos y Filtrado de Personas" (líneas 386-413)

**Regla**: El comportamiento de los formularios y la disponibilidad de personas se determina por el tipo de certificado seleccionado.

**Componentes**:
1. Formularios Dinámicos: Campos de contexto aparecen solo si el tipo los requiere
2. Filtrado Dinámico de Personas: Lista se filtra según reglas de elegibilidad
3. Validación en Múltiples Capas: Frontend, Backend, Dominio

### 7.2 Referencias
✅ **MENCIONADO EN**: 
- `dominio.md` - Líneas 187-189, 254-278
- `flujo-certificacion.md` - Líneas 32-51, 71-107

**Estado**: ✅ **CONSISTENTE** - Todas las referencias confirman que es una **regla de dominio**, no solo característica de UI.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 8. Regla: Grupos de Certificación

### 8.1 Definición Principal
✅ **DEFINIDO EN**: `dominio.md` - Sección "Entidades del Dominio" > "Grupos de Certificación" (líneas 320-329)

**Regla de Dominio Crítica**: 
- Un grupo de certificación **siempre está ligado a un tipo de certificado**
- El tipo de certificado **define todas las reglas de elegibilidad y comportamiento** del grupo
- El grupo hereda las características del tipo (contexto obligatorio, firmas requeridas, texto base)

### 8.2 Referencias
✅ **MENCIONADO EN**: 
- `dominio.md` - Líneas 254-278
- `flujo-certificacion.md` - Líneas 28-30

**Estado**: ✅ **CONSISTENTE** - Todas las referencias confirman la relación Grupo → Tipo de Certificado.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 9. Roles y Permisos

### 9.1 Definición Principal
✅ **DEFINIDO EN**: `roles-y-permisos.md` - Sección "Roles del Sistema" (líneas 16-131)

**4 Roles Funcionales**:
1. **Administrador**: Control total (15 secciones funcionales)
2. **Supervisor**: Mismo alcance que Administrador, pero solo lectura
3. **Marketing**: 5 secciones funcionales (Grupos, Plantillas, Diseños, Notificaciones, Perfil)
4. **Usuario Normal**: 3 secciones funcionales (Dashboard personal, Mis certificados, Perfil)

**Nota**: Las capacidades son **permisos del sistema**, no solo elementos del menú.

### 9.2 Referencias en Otros Documentos
✅ **MENCIONADO EN**: 
- `flujo-certificacion.md` - Línea 13 (Marketing o Administrador pueden generar certificados)

**Estado**: ✅ **CONSISTENTE** - No hay contradicciones entre documentos.

**Verificación de Contradicciones**: ❌ **NO HAY CONTRADICCIONES**

---

## 10. Verificación de Duplicaciones

### 10.1 Reglas Definidas en Múltiples Lugares

| Regla | Ubicación Principal | Referencias | Tipo de Duplicación |
|-------|---------------------|-------------|---------------------|
| Retiro por bajo rendimiento | `dominio.md` (89-104) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |
| Tiempo mínimo | `dominio.md` (72-84) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |
| Certificados exclusivos miembros | `dominio.md` (222-236) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |
| Certificados permiten externos | `dominio.md` (238-252) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |
| Contexto obligatorio | `dominio.md` (178-189) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |
| Formularios dinámicos | `dominio.md` (386-413) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |
| Grupos de certificación | `dominio.md` (320-329) | `flujo-certificacion.md` | ✅ **Aplicación práctica** (no contradicción) |

**Estado**: ✅ **NO HAY DUPLICACIONES CONTRADICTORIAS**

**Análisis**: Las "duplicaciones" son en realidad **referencias cruzadas** donde:
- `dominio.md` define las **reglas conceptuales** (qué es)
- `flujo-certificacion.md` describe la **aplicación práctica** (cómo se usa)

Esto es **correcto y deseable** en documentación técnica.

---

## 11. Verificación de Contradicciones

### 11.1 Contradicciones Identificadas

| Área | Contradicción Potencial | Verificación | Estado |
|------|------------------------|--------------|--------|
| Retiro por bajo rendimiento | ¿Aplica a todos los tipos? | ✅ Sí, sin excepción | ✅ **CONSISTENTE** |
| Tiempo mínimo | ¿Aplica a todos los tipos? | ✅ Solo Egresado/Retiro Voluntario | ✅ **CONSISTENTE** |
| Certificados para miembros | ¿Lista completa? | ✅ 9 tipos en ambos documentos | ✅ **CONSISTENTE** |
| Certificados para externos | ¿Excepción por retiro? | ✅ Sí, documentada en ambos | ✅ **CONSISTENTE** |
| Contexto obligatorio | ¿Quién lo define? | ✅ Tipo de certificado | ✅ **CONSISTENTE** |
| Formularios dinámicos | ¿Es regla de dominio? | ✅ Sí, en ambos documentos | ✅ **CONSISTENTE** |
| Grupos de certificación | ¿Relación con tipo? | ✅ Siempre ligado a tipo | ✅ **CONSISTENTE** |

**Estado**: ❌ **NO SE ENCONTRARON CONTRADICCIONES**

---

## 12. Ubicación Conceptual de Reglas de Elegibilidad

### 12.1 Fuente Única de Verdad

✅ **UBICACIÓN PRINCIPAL**: `dominio.md` - Sección "Reglas de Elegibilidad por Tipo de Certificado" (líneas 220-252)

**Contenido**:
- Lista completa de certificados exclusivos para miembros (9 tipos)
- Lista completa de certificados que permiten externos (7 tipos)
- Reglas generales para cada categoría
- Excepciones documentadas (retiro por bajo rendimiento)

### 12.2 Referencias en Flujos

✅ **APLICACIÓN PRÁCTICA**: `flujo-certificacion.md` - Secciones "Filtrado Dinámico de Personas" y "Validación de Reglas"

**Propósito**: Explicar **cómo se aplican** las reglas definidas en `dominio.md` durante el flujo de certificación.

**Estado**: ✅ **ARQUITECTURA CORRECTA** - Definición conceptual en dominio, aplicación práctica en flujos.

---

## 13. Resumen Ejecutivo

### 13.1 Estado General

| Criterio | Estado | Observaciones |
|----------|--------|---------------|
| Reglas duplicadas | ✅ **NO HAY** | Solo referencias cruzadas apropiadas |
| Contradicciones | ✅ **NO HAY** | Todas las reglas son consistentes |
| Ubicación conceptual | ✅ **CLARA** | `dominio.md` es la fuente única de verdad |
| Referencias cruzadas | ✅ **APROPIADAS** | `flujo-certificacion.md` aplica reglas del dominio |
| Roles y permisos | ✅ **CONSISTENTES** | No hay conflictos con reglas de dominio |

### 13.2 Estabilidad del Dominio

✅ **EL DOMINIO PUEDE CONSIDERARSE ESTABLE**

**Razones**:
1. ✅ Todas las reglas de elegibilidad están definidas en un solo lugar conceptual (`dominio.md`)
2. ✅ No hay contradicciones entre documentos
3. ✅ Las referencias en otros documentos son aplicaciones prácticas, no redefiniciones
4. ✅ Las reglas críticas (retiro por bajo rendimiento, tiempo mínimo) son consistentes en todos los documentos
5. ✅ La arquitectura de documentación es correcta (dominio → aplicación → flujos)

### 13.3 Recomendaciones

✅ **NO SE REQUIEREN CORRECCIONES INMEDIATAS**

**Mejoras Opcionales** (no críticas):
- Considerar agregar un índice de reglas al inicio de `dominio.md` para facilitar navegación
- Considerar agregar referencias explícitas en `flujo-certificacion.md` a las secciones específicas de `dominio.md` donde se definen las reglas

---

## 14. Conclusión

✅ **VALIDACIÓN COMPLETA - DOMINIO ESTABLE**

El dominio del sistema SEDICERT está **correctamente documentado** y **libre de contradicciones**. Las reglas de elegibilidad están definidas conceptualmente en `dominio.md` y aplicadas prácticamente en `flujo-certificacion.md`, siguiendo una arquitectura de documentación apropiada.

**El sistema puede avanzar al siguiente nivel de implementación con confianza.**

---

**Firma de Validación**: ✅ **APROBADO PARA AVANZAR**

