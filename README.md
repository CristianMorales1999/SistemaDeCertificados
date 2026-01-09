# SEDICERT – Sistema de Generación y Validación de Certificados

> **Sistema institucional de SEDIPRO UNT**  
> Automatización, control, generación masiva y validación pública de certificados

---

## 📋 Visión General

**SEDICERT** es una aplicación web institucional desarrollada en **Laravel 12** que automatiza la generación, control y validación de certificados emitidos por SEDIPRO UNT.

> **Estado**: Proyecto en desarrollo activo con funcionalidades implementadas, actualmente en proceso de ordenamiento y documentación.

### Problema que Resuelve

**Antes del sistema:**
- Certificados generados manualmente
- Errores frecuentes en nombres, cargos y firmas
- Falta de trazabilidad institucional
- Validación poco confiable
- Alto esfuerzo operativo para el área de Marketing

**Con el sistema:**
- Generación masiva automatizada
- Control normativo según estatuto institucional
- Firmas correctas por tipo de certificado
- Validación pública con código único y QR
- Historial institucional auditable

---

## 🏗️ Stack Tecnológico

- **Backend**: Laravel 12
- **Frontend**: Blade + TailwindCSS
- **Interactividad**: Livewire / Alpine.js
- **Base de datos**: SQL (modelo normalizado)
- **PDFs**: Generación dinámica con dompdf
- **QR**: Generación por certificado

---

## 🚀 Configuración del Entorno de Desarrollo

> **Nota**: Este es un proyecto Laravel 12 ya existente con avances funcionales previos.

### Requisitos Previos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- Base de datos SQL (MySQL/PostgreSQL)

### Pasos para Configurar el Entorno Local

1. **Habilitar extensión ZIP en PHP** (si usas XAMPP):
   - Abra `php.ini` en `XAMPP/PHP/php.ini`
   - Busque la línea `extension=zip`
   - Elimine el punto y coma (`;`) al principio

2. **Instalar dependencias de Composer**:
   ```bash
   composer install
   ```

3. **Configurar archivo de entorno**:
   - Copie `.env.example` a `.env` si no existe
   - Configure las credenciales de base de datos en `.env`
   - Genere la clave de aplicación:
   ```bash
   php artisan key:generate
   ```

4. **Configurar base de datos**:
   ```bash
   php artisan migrate:refresh --seed
   ```
   > **Importante**: Este comando recreará la base de datos con datos de prueba.

5. **Instalar dependencias de Node**:
   ```bash
   npm install
   ```

6. **Iniciar servidor de desarrollo**:
   ```bash
   php artisan serve
   npm run dev
   ```

---

## 📚 Documentación

La documentación completa del proyecto se encuentra en la carpeta `/docs`:

- **[Arquitectura](./docs/arquitectura.md)** - Estructura técnica y principios de diseño
- **[Dominio](./docs/dominio.md)** - Modelo de negocio y reglas institucionales
- **[Flujo de Certificación](./docs/flujo-certificacion.md)** - Procesos de generación y validación
- **[Roles y Permisos](./docs/roles-y-permisos.md)** - Sistema de autorización
- **[Sistema de Diseño](./docs/design-system.md)** - Guía de estilos y tokens CSS

---

## 🎯 Características Principales

- ✅ Generación masiva de certificados
- ✅ Validación pública con código único y QR
- ✅ Control normativo según estatuto institucional
- ✅ Historial completo y auditable
- ✅ 16 tipos de certificados diferentes
- ✅ Gestión de roles y permisos
- ✅ Interfaz institucional profesional

---

## 📖 Tipos de Certificados

El sistema maneja **16 tipos de certificados**:

### Certificados de ciclo de vida
- Egresado
- Retiro voluntario

### Certificados por cargos
- Cargo en directiva
- Director de Proyecto
- Co-Director de Proyecto
- Coordinador de Proyecto

### Certificados por proyectos
- Miembro interno
- Miembro externo
- Staff interno
- Staff externo

### Certificados por eventos
- Ponente
- Participante

### Certificados especiales
- Valores Destacados

---

## 👥 Roles del Sistema

- **Administrador**: Control total del sistema
- **Marketing**: Gestión y generación de certificados
- **Supervisor**: Solo lectura (Presidente/Vicepresidente)
- **Usuario**: Consulta de certificados propios
- **Visitante**: Validación pública (sin login)

---

## 📊 Estado Actual del Proyecto

Este proyecto **ya existe en Laravel 12** y cuenta con **avances funcionales previos**. El sistema actualmente se encuentra en un proceso de **ordenamiento y documentación** para mejorar su mantenibilidad y coherencia con el dominio institucional.

### Avances Existentes

- ✅ Proyecto Laravel 12 configurado y funcionando
- ✅ Modelos de datos implementados (Persona, Certificado, GrupoDeCertificacion, etc.)
- ✅ Migraciones de base de datos creadas
- ✅ Seeders con datos iniciales
- ✅ Componentes Livewire para generación de certificados
- ✅ Sistema de roles y permisos implementado
- ✅ Generación de PDFs y códigos QR funcional
- ✅ Interfaz de usuario parcialmente desarrollada

### Objetivos Actuales

El objetivo inicial del proyecto es:

1. **Documentar correctamente** el sistema existente
2. **Alinear el código** al dominio y reglas institucionales definidas
3. **Reordenar progresivamente** la estructura del código para mejorar mantenibilidad
4. **Consolidar el sistema de diseño** y asegurar su uso consistente

### Notas para Desarrolladores

- El código existente puede tener inconsistencias que se están identificando y corrigiendo
- La documentación en `/docs` refleja el estado objetivo del sistema
- Se recomienda revisar la documentación antes de realizar cambios significativos

---

## 📝 Notas Importantes

- El sistema **NO elimina historial**: todo es histórico y auditable
- Las reglas del estatuto institucional se aplican automáticamente
- El diseño visual está definido en `resources/css/app.css` (fuente de verdad)
- No se deben usar colores hex directamente en Blade; usar tokens CSS

---

## 🔒 Reglas del Estatuto

El sistema respeta automáticamente las siguientes reglas:

- Para certificados de **Egresado** o **Retiro Voluntario**:
  - Mínimo **1 año como miembro activo**
  - No haber sido retirado por bajo rendimiento
- Personas retiradas por bajo rendimiento:
  - NO pueden ser certificadas
  - NO aparecen como seleccionables

---

## 📄 Licencia

Proyecto institucional de SEDIPRO UNT.

---

## 🤝 Contribución

Este es un proyecto institucional. Para contribuciones, contactar al área de TI de SEDIPRO UNT.
