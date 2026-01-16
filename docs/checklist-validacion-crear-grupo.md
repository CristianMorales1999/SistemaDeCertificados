# Checklist de Validación: Crear Grupo de Certificación

**Componente**: `GruposCertificacion/CrearGrupoCertificacion`  
**Fecha de Validación**: _______________  
**Validador**: _______________

---

## 1. Configuración Inicial

### 1.1 Instalación y Rutas

- [ ] Componente Livewire creado en `app/Livewire/GruposCertificacion/CrearGrupoCertificacion.php`
- [ ] Vista Blade creada en `resources/views/livewire/grupos-certificacion/crear-grupo-certificacion.blade.php`
- [ ] Ruta temporal agregada en `routes/web.php`
- [ ] Ruta accesible sin errores 404
- [ ] Middleware de autenticación funcionando

### 1.2 Base de Datos

- [ ] Tabla `tipos_de_certificacion` tiene datos
- [ ] Tabla `proyectos` tiene datos
- [ ] Tabla `eventos` tiene datos
- [ ] Tabla `personas` tiene datos
- [ ] Relaciones `area_persona` tienen datos
- [ ] Relaciones `evento_persona` tienen datos (si aplica)
- [ ] Relaciones `area_persona_proyecto` tienen datos (si aplica)

---

## 2. Paso 1: Selección de Tipo de Certificado

### 2.1 Carga de Tipos

- [ ] Lista de tipos de certificado se carga correctamente
- [ ] Tipos se muestran ordenados alfabéticamente
- [ ] No hay tipos duplicados

### 2.2 Selección de Tipo

- [ ] Al seleccionar un tipo, se muestra información del tipo seleccionado
- [ ] Al seleccionar un tipo, se avanza automáticamente al paso 2
- [ ] Query param `tipo` se actualiza en la URL
- [ ] Al recargar la página, el tipo seleccionado se mantiene

### 2.3 Validaciones

- [ ] No se puede avanzar sin seleccionar un tipo
- [ ] Mensaje de error aparece si se intenta avanzar sin tipo
- [ ] Mensaje de error es claro y descriptivo

---

## 3. Paso 2: Contexto (Condicional)

### 3.1 Campos Dinámicos - Proyecto

- [ ] Campo "Proyecto" aparece solo si el tipo lo requiere
- [ ] Campo "Proyecto" es obligatorio si aparece
- [ ] Lista de proyectos se carga correctamente
- [ ] Proyectos se muestran ordenados alfabéticamente

**Tipos que requieren proyecto** (verificar al menos 2):
- [ ] Certificado de Director de Proyecto
- [ ] Certificado de Miembros Internos del Proyecto
- [ ] Otro tipo que requiera proyecto

### 3.2 Campos Dinámicos - Evento

- [ ] Campo "Evento" aparece solo si el tipo lo requiere
- [ ] Campo "Evento" es obligatorio si aparece
- [ ] Si hay proyecto seleccionado, eventos se filtran por proyecto
- [ ] Lista de eventos se carga correctamente

**Tipos que requieren evento** (verificar al menos 1):
- [ ] Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT
- [ ] Certificado de Participación en Evento General de SEDIPRO UNT

### 3.3 Campos Dinámicos - Área

- [ ] Campo "Área" aparece solo si el tipo es "Certificado de Directiva"
- [ ] Campo "Área" es obligatorio si aparece
- [ ] Lista de áreas se carga correctamente

### 3.4 Tipos Sin Contexto

- [ ] Para tipos sin contexto (Egresado, Retiro Voluntario), no aparecen campos de contexto
- [ ] Se muestra mensaje indicando que no se requiere contexto
- [ ] Se puede avanzar directamente al paso 3

### 3.5 Validaciones

- [ ] No se puede avanzar sin seleccionar proyecto (si es requerido)
- [ ] No se puede avanzar sin seleccionar evento (si es requerido)
- [ ] No se puede avanzar sin seleccionar área (si es requerido)
- [ ] Mensajes de error son claros y descriptivos

### 3.6 Preservación de Estado

- [ ] Query params `proyecto` y `evento` se actualizan en la URL
- [ ] Al recargar, el contexto seleccionado se mantiene

---

## 4. Paso 3: Selección de Personas

### 4.1 Carga de Personas Elegibles

- [ ] Personas elegibles se cargan correctamente
- [ ] Indicador de carga aparece mientras se cargan
- [ ] Si no hay personas elegibles, se muestra mensaje apropiado

### 4.2 Filtrado por Tipo de Certificado

**Certificados exclusivos para miembros** (verificar):
- [ ] Solo aparecen personas con historial en `area_persona`
- [ ] Personas retiradas por bajo rendimiento NO aparecen
- [ ] Para Egresado/Retiro Voluntario, solo aparecen con mínimo 1 año

**Certificados que permiten externos** (verificar):
- [ ] Aparecen personas sin historial en `area_persona` (si están asociadas al contexto)
- [ ] Personas retiradas por bajo rendimiento NO aparecen (aunque sean externas)

### 4.3 Filtrado por Contexto

- [ ] Si hay proyecto seleccionado, solo aparecen personas asociadas al proyecto
- [ ] Si hay evento seleccionado, solo aparecen personas asociadas al evento
- [ ] Si hay proyecto y evento, se aplican ambos filtros

### 4.4 Búsqueda de Personas

- [ ] Campo de búsqueda funciona correctamente
- [ ] Búsqueda filtra por nombre completo
- [ ] Búsqueda filtra por código (si existe)
- [ ] Búsqueda tiene debounce (no busca en cada tecla)

### 4.5 Selección de Personas

- [ ] Checkbox individual funciona correctamente
- [ ] Checkbox "Seleccionar Todas" funciona
- [ ] Botón "Deseleccionar Todas" funciona
- [ ] Contador de personas seleccionadas se actualiza
- [ ] Personas seleccionadas se mantienen al cambiar de paso

### 4.6 Validaciones

- [ ] No se puede avanzar sin seleccionar al menos una persona
- [ ] Mensaje de error aparece si se intenta avanzar sin personas
- [ ] Mensaje de error es claro y descriptivo

---

## 5. Paso 4: Configuración Adicional

### 5.1 Campos Opcionales

- [ ] Campo "Nombre del Grupo" es opcional
- [ ] Campo "Fecha de Emisión" es opcional
- [ ] Si se dejan vacíos, se usan valores por defecto

### 5.2 Resumen

- [ ] Resumen muestra tipo de certificado correcto
- [ ] Resumen muestra proyecto (si aplica)
- [ ] Resumen muestra evento (si aplica)
- [ ] Resumen muestra cantidad de personas seleccionadas

---

## 6. Creación del Grupo

### 6.1 Proceso de Creación

- [ ] Botón "Crear Grupo" está habilitado
- [ ] Al hacer clic, se muestra indicador de carga
- [ ] Botón se deshabilita durante la creación
- [ ] No se puede hacer doble clic

### 6.2 Resultado Exitoso

- [ ] Si hay personas elegibles, el grupo se crea correctamente
- [ ] Mensaje de éxito se muestra
- [ ] Redirección a vista de detalle del grupo funciona
- [ ] Grupo aparece en base de datos con datos correctos
- [ ] Metadata de evaluación se guarda en `descripcion` (JSON)

### 6.3 Resultado Sin Elegibles

- [ ] Si no hay personas elegibles, el grupo NO se crea
- [ ] Mensaje de error se muestra
- [ ] Detalles de por qué cada persona no es elegible se muestran
- [ ] Usuario puede corregir y reintentar

### 6.4 Manejo de Errores

- [ ] Errores de validación se muestran correctamente
- [ ] Errores de base de datos se capturan y muestran
- [ ] Errores de servicios se muestran con mensaje claro

---

## 7. Preservación de Estado

### 7.1 Query Params

- [ ] Parámetro `tipo` se mantiene en URL
- [ ] Parámetro `proyecto` se mantiene en URL (si aplica)
- [ ] Parámetro `evento` se mantiene en URL (si aplica)
- [ ] Al recargar página, todos los pasos se restauran correctamente

### 7.2 Navegación Entre Pasos

- [ ] Botón "Anterior" funciona correctamente
- [ ] Botón "Siguiente" funciona correctamente
- [ ] Estado se mantiene al navegar entre pasos
- [ ] Validaciones se aplican al avanzar

---

## 8. Integración con Servicios

### 8.1 Servicio de Aplicación

- [ ] `GrupoCertificacionApplicationService::crearGrupo()` se llama correctamente
- [ ] Parámetros se pasan correctamente
- [ ] Resultado se maneja correctamente

### 8.2 Servicio de Dominio

- [ ] `GrupoCertificacionService::evaluarGrupo()` se llama para filtrar personas
- [ ] Reglas de elegibilidad se aplican correctamente
- [ ] Resultado de evaluación se usa correctamente

---

## 9. UI/UX

### 9.1 Diseño Visual

- [ ] Wizard se ve correctamente
- [ ] Indicadores de progreso funcionan
- [ ] Colores y estilos son consistentes con el sistema de diseño
- [ ] Responsive en móvil y tablet

### 9.2 Interacciones

- [ ] Hover states funcionan
- [ ] Focus states funcionan
- [ ] Transiciones son suaves
- [ ] Loading states son claros

### 9.3 Mensajes

- [ ] Mensajes de error son claros y útiles
- [ ] Mensajes de éxito son claros
- [ ] Mensajes informativos son útiles

---

## 10. Casos Especiales

### 10.1 Tipos Sin Contexto

- [ ] Egresado: funciona sin proyecto/evento
- [ ] Retiro Voluntario: funciona sin proyecto/evento
- [ ] Valores Destacados: funciona sin proyecto/evento (o con contexto opcional)

### 10.2 Tipos con Contexto Múltiple

- [ ] Tipo que requiere proyecto Y evento: ambos campos aparecen
- [ ] Validación funciona para ambos campos

### 10.3 Personas No Elegibles

- [ ] Personas retiradas por bajo rendimiento NO aparecen
- [ ] Personas sin membresía NO aparecen (para tipos que la requieren)
- [ ] Personas con tiempo insuficiente NO aparecen (para Egresado/Retiro)

---

## 11. Rendimiento

### 11.1 Carga de Datos

- [ ] Carga inicial es rápida (< 2 segundos)
- [ ] Carga de personas elegibles es razonable (< 5 segundos para 100 personas)
- [ ] Búsqueda no causa lag

### 11.2 Optimizaciones

- [ ] Cache de personas elegibles funciona
- [ ] Debounce en búsqueda funciona
- [ ] No hay N+1 queries

---

## 12. Seguridad

### 12.1 Autenticación

- [ ] Usuario no autenticado no puede acceder
- [ ] Redirección a login funciona

### 12.2 Autorización

- [ ] Solo usuarios con rol apropiado pueden crear grupos
- [ ] Validación de permisos funciona

### 12.3 Validación de Inputs

- [ ] Inputs se validan en frontend
- [ ] Inputs se validan en backend
- [ ] No se pueden inyectar datos maliciosos

---

## 13. Observaciones y Notas

**Espacio para notas adicionales:**




---

## 14. Resultado Final

- [ ] ✅ **APROBADO**: Componente funciona correctamente y está listo para producción
- [ ] ⚠️ **APROBADO CON OBSERVACIONES**: Funciona pero requiere mejoras menores
- [ ] ❌ **RECHAZADO**: Requiere correcciones antes de aprobar

**Firma del Validador**: _______________  
**Fecha**: _______________

---

**Fin del Checklist de Validación**

