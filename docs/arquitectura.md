# Arquitectura del Sistema

## Visión General

SEDICERT está construido sobre **Laravel 12**, siguiendo principios de arquitectura limpia, separación de responsabilidades y mantenibilidad a largo plazo.

---

## Stack Tecnológico

### Backend
- **Framework**: Laravel 12
- **PHP**: 8.2+
- **ORM**: Eloquent
- **Autenticación**: Laravel Auth (multi-rol)

### Frontend
- **Templates**: Blade
- **Estilos**: TailwindCSS
- **Interactividad**: Livewire / Alpine.js
- **Componentes UI**: Livewire Flux

### Base de Datos
- **Motor**: SQL (MySQL/PostgreSQL)
- **Modelo**: Normalizado, histórico completo
- **Migraciones**: Versionadas

### Generación de Documentos
- **PDFs**: dompdf (barryvdh/laravel-dompdf)
- **QR**: simplesoftwareio/simple-qrcode

---

## Principios Arquitectónicos

### 1. Separación Persona / Usuario

**Regla crítica**: Una `Persona` puede existir sin `User`, pero un `User` siempre está asociado a una `Persona`.

- `Persona`: Entidad del dominio (miembro de SEDIPRO)
- `User`: Entidad de autenticación (acceso al sistema)

Esta separación permite:
- Personas sin acceso al sistema
- Historial completo independiente de usuarios
- Gestión de certificados sin requerir cuenta

### 2. Historial Completo (No Sobrescribir)

**Principio fundamental**: El sistema **NO elimina historial**.

- Cambios de área: Nueva entrada en `area_persona`
- Cambios de cargo: Nueva entrada en `area_persona_cargo`
- Cambios de rol: Nueva entrada en tabla de roles
- Soft Deletes cuando corresponda

**Implicaciones**:
- Las tablas históricas tienen timestamps
- Las consultas deben considerar rangos de fechas
- No se actualizan registros históricos, se crean nuevos

### 3. Uso de Enums o Constantes

Para valores fijos del dominio:
- Tipos de certificación
- Roles del sistema
- Estados de certificados
- Tipos de área

**Ventajas**:
- Validación a nivel de aplicación
- Documentación implícita
- Refactorización segura

### 4. Policies y Gates para Autorización

- **Policies**: Para modelos específicos (Certificado, GrupoDeCertificacion)
- **Gates**: Para acciones transversales
- **Middleware**: Para rutas protegidas

**Estructura**:
```
app/Policies/
  - CertificadoPolicy.php
  - GrupoDeCertificacionPolicy.php
  - ...
```

### 5. Código Limpio y Documentado

- Nombres descriptivos
- Funciones pequeñas y enfocadas
- Comentarios cuando el "por qué" no es obvio
- Documentación de reglas de negocio complejas

---

## Estructura de Directorios

```
app/
├── Http/
│   └── Controllers/        # Controladores tradicionales
├── Livewire/              # Componentes Livewire
│   ├── Actions/           # Acciones reutilizables
│   └── ...                # Componentes de UI
├── Models/                # Modelos Eloquent
├── Policies/              # Políticas de autorización
└── Providers/            # Service Providers

database/
├── migrations/           # Migraciones versionadas
└── seeders/             # Seeders para datos iniciales

resources/
├── css/
│   └── app.css          # Fuente de verdad del diseño
├── js/
│   └── app.js           # JavaScript principal
└── views/
    ├── layouts/         # Layouts base
    ├── components/      # Componentes Blade
    └── ...              # Vistas específicas

routes/
└── web.php              # Rutas web

docs/                    # Documentación del proyecto
```

---

## Patrones de Diseño Utilizados

### 1. Repository Pattern (Implícito)

Los modelos Eloquent actúan como repositorios, pero se mantiene la lógica de negocio en:
- Service classes (cuando crezca)
- Livewire components (lógica de presentación)
- Policies (lógica de autorización)

### 2. Observer Pattern

Para eventos del ciclo de vida:
- Creación de certificados
- Cambios de estado
- Generación de códigos únicos

### 3. Factory Pattern

- Model Factories para testing
- Seeders para datos iniciales

---

## Flujo de Datos

### Generación de Certificados

```
Usuario autorizado
  ↓
Crea GrupoDeCertificacion
  ↓
Selecciona tipo, contexto, personas
  ↓
Sistema valida reglas (Estatuto)
  ↓
Genera Certificado por persona
  ↓
Asigna código único
  ↓
Genera QR
  ↓
Almacena en BD
```

### Validación Pública

```
Visitante ingresa código/QR
  ↓
Sistema busca Certificado
  ↓
Retorna datos públicos
  ↓
NO permite descarga (solo visualización)
```

---

## Seguridad

### Autenticación
- Laravel Auth estándar
- Multi-rol por usuario
- Sesiones seguras

### Autorización
- Policies por modelo
- Gates para acciones transversales
- Middleware en rutas

### Validación
- Form Requests para entrada de datos
- Validación de reglas de negocio
- Sanitización de inputs

### Protección de Datos
- Certificados con códigos únicos
- Validación pública sin exponer datos sensibles
- Historial auditable

---

## Rendimiento

### Optimizaciones Actuales
- Eager Loading en consultas relacionadas
- Índices en campos de búsqueda frecuente
- Cache de configuraciones

### Optimizaciones Futuras
- Cache de consultas frecuentes
- Queue para generación masiva
- Optimización de generación de PDFs

---

## Testing

### Estructura
- **Unit Tests**: Lógica de negocio
- **Feature Tests**: Flujos completos
- **Browser Tests**: Interacciones de usuario

### Framework
- Pest PHP (configurado)

---

## Escalabilidad

### Consideraciones Actuales
- Modelo normalizado permite crecimiento
- Separación de responsabilidades facilita mantenimiento
- Historial completo permite auditorías

### Consideraciones Futuras
- Queue para procesos pesados
- Cache distribuido si es necesario
- Optimización de consultas históricas

---

## Mantenibilidad

### Código
- Principios SOLID
- DRY (Don't Repeat Yourself)
- Nombres descriptivos

### Documentación
- README.md actualizado
- Documentación en `/docs`
- Comentarios en código complejo

### Versionado
- Git para control de versiones
- Migraciones versionadas
- Seeders versionados

---

## Dependencias Principales

### Producción
- `laravel/framework: ^12.0`
- `livewire/flux: ^2.0`
- `livewire/volt: ^1.7.0`
- `barryvdh/laravel-dompdf: ^3.1`
- `simplesoftwareio/simple-qrcode: ^4.2`

### Desarrollo
- `pestphp/pest: ^3.7`
- `laravel/pint: ^1.18`
- `laravel/sail: ^1.41`

---

## Notas de Implementación

### Estado Actual
- Proyecto Laravel 12 creado
- Avance funcional existente
- Código parcialmente desordenado
- Documentación en proceso de consolidación

### Prioridades
1. ✅ Documentar correctamente
2. 🔄 Alinear código al dominio
3. ⏳ Reordenar progresivamente

---

## Referencias

- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Livewire Documentation](https://livewire.laravel.com)
- [TailwindCSS Documentation](https://tailwindcss.com/docs)

