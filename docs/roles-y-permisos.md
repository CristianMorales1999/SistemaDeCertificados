# Roles y Permisos

## Visión General

SEDICERT implementa un sistema de roles y permisos multi-rol, donde un usuario puede tener múltiples roles activos simultáneamente. Cada rol define un conjunto específico de capacidades dentro del sistema.

**Nota Importante**: Las capacidades funcionales listadas para cada rol representan **permisos del sistema**, no solo elementos del menú. Cada rol tiene acceso a un **sidebar diferenciado** que refleja sus capacidades funcionales. Además, cada rol tiene un **dashboard específico** según sus responsabilidades:

- **Administrador**: Dashboard institucional con métricas y gráficos del sistema completo
- **Supervisor**: Dashboard institucional en modo solo lectura
- **Marketing**: Dashboard enfocado en grupos de certificación y plantillas
- **Usuario Normal**: Dashboard personal con estadísticas individuales

---

## Roles del Sistema

### 1. Administrador

**Descripción**: Control total del sistema.

**Capacidades Funcionales** (secciones del sistema):
- ✅ **Dashboard institucional**: Métricas y gráficos del sistema completo
- ✅ **Marca Institucional**: Configuración de logo, sello, tipografía y colores por defecto
- ✅ **Logos y Sellos**: CRUD completo de recursos gráficos institucionales
- ✅ **Usuarios**: Gestión completa de usuarios y roles (implícitos)
- ✅ **Entidades Aliadas**: Gestión completa de entidades externas
- ✅ **Personas**: Gestión completa de personas del sistema
- ✅ **Áreas**: Gestión completa de áreas organizacionales
- ✅ **Cargos**: Gestión completa de cargos institucionales
- ✅ **Proyectos**: Gestión completa de proyectos
- ✅ **Eventos**: Gestión de eventos generales y de proyectos
- ✅ **Valores destacados**: Gestión de reconocimientos especiales
- ✅ **Grupos de Certificación**: Gestión completa incluyendo configuraciones de diseño y certificados
- ✅ **Notificaciones**: Gestión y visualización de notificaciones del sistema
- ✅ **Plantillas**: Gestión completa de plantillas de certificados
- ✅ **Mi perfil**: Gestión de credenciales y datos personales

**Capacidades Técnicas**:
- ✅ Generación de certificados (todos los tipos)
- ✅ Modificación y eliminación de certificados
- ✅ Acceso a todas las configuraciones del sistema
- ✅ Visualización de reportes y estadísticas completas
- ✅ Gestión de firmas y tipos de certificación
- ✅ Acceso a logs y auditoría

**Uso típico**: Personal técnico del área de TI o supervisores institucionales con responsabilidades de administración.

---

### 2. Marketing

**Descripción**: Gestión y generación de certificados.

**Capacidades Funcionales** (secciones del sistema):
- ✅ **Grupos de Certificación**: Creación y gestión de grupos de certificación
- ✅ **Plantillas**: Gestión de plantillas de certificados
- ✅ **Configuración de Diseños**: Configuración de plantilla, fuentes, colores, tamaños y estilos por grupo
- ✅ **Notificaciones**: Recepción de notificaciones de aprobación o rechazo de configuraciones
- ✅ **Mi perfil**: Gestión de credenciales y datos personales

**Capacidades Técnicas**:
- ✅ Generar certificados (todos los tipos)
- ✅ Visualizar certificados generados
- ✅ Descargar certificados generados
- ✅ Consultar personas y sus historiales (solo lectura)
- ✅ Consultar proyectos y eventos (solo lectura)
- ✅ Visualizar reportes de certificados generados
- ❌ NO puede modificar configuraciones del sistema (marca institucional, logos, sellos)
- ❌ NO puede gestionar usuarios y roles
- ❌ NO puede eliminar certificados (solo marcar como inválidos si está permitido)
- ❌ NO puede gestionar personas, áreas, cargos, proyectos o eventos directamente

**Uso típico**: Personal del área de Marketing responsable de la generación y emisión de certificados.

---

### 3. Supervisor

**Descripción**: Solo lectura para supervisión institucional. Mismo alcance que Administrador pero en **modo solo lectura**.

**Capacidades Funcionales** (secciones del sistema - todas en modo solo lectura):
- ✅ **Dashboard institucional**: Visualización de métricas y gráficos (solo lectura)
- ✅ **Marca Institucional**: Visualización de configuración (solo lectura)
- ✅ **Logos y Sellos**: Visualización de recursos gráficos (solo lectura)
- ✅ **Usuarios**: Visualización de usuarios y roles (solo lectura)
- ✅ **Entidades Aliadas**: Visualización de entidades externas (solo lectura)
- ✅ **Personas**: Visualización de personas del sistema (solo lectura)
- ✅ **Áreas**: Visualización de áreas organizacionales (solo lectura)
- ✅ **Cargos**: Visualización de cargos institucionales (solo lectura)
- ✅ **Proyectos**: Visualización de proyectos (solo lectura)
- ✅ **Eventos**: Visualización de eventos generales y de proyectos (solo lectura)
- ✅ **Valores destacados**: Visualización de reconocimientos especiales (solo lectura)
- ✅ **Grupos de Certificación**: Visualización de grupos, configuraciones y certificados (solo lectura)
- ✅ **Notificaciones**: Visualización de notificaciones del sistema (solo lectura)
- ✅ **Plantillas**: Visualización de plantillas de certificados (solo lectura)
- ✅ **Mi perfil**: Gestión de credenciales y datos personales (lectura/escritura propia)

**Capacidades Técnicas**:
- ✅ Visualizar todos los certificados generados
- ✅ Visualizar reportes y estadísticas completas
- ✅ Validar certificados públicamente
- ❌ NO puede generar certificados
- ❌ NO puede modificar ningún dato del sistema
- ❌ NO puede acceder a configuraciones en modo edición

**Uso típico**: Presidente y Vicepresidente de SEDIPRO UNT que requieren supervisar la actividad sin capacidad de modificación.

---

### 4. Usuario Normal

**Descripción**: Consulta de certificados propios y gestión personal.

**Capacidades Funcionales** (secciones del sistema):
- ✅ **Dashboard personal**: Estadísticas individuales y resumen personal
- ✅ **Mis certificados**: Visualización y descarga de certificados propios
- ✅ **Mi perfil**: Cambio de credenciales y gestión de datos personales

**Capacidades Técnicas**:
- ✅ Visualizar sus propios certificados
- ✅ Descargar sus propios certificados
- ✅ Validar certificados públicamente
- ✅ Consultar su propio historial en SEDIPRO
- ❌ NO puede generar certificados
- ❌ NO puede ver certificados de otras personas
- ❌ NO puede acceder a funciones administrativas
- ❌ NO puede acceder a gestión de grupos, plantillas o configuraciones

**Uso típico**: Miembros de SEDIPRO que quieren acceder a sus certificados personales.

---

### 5. Visitante

**Descripción**: Validación pública sin autenticación.

**Capacidades**:
- ✅ Validar certificados mediante código único o QR
- ✅ Visualizar datos públicos de certificados válidos
- ❌ NO puede descargar certificados
- ❌ NO puede acceder a ninguna otra funcionalidad
- ❌ NO requiere cuenta ni autenticación

**Uso típico**: Cualquier persona que necesita validar la autenticidad de un certificado emitido por SEDIPRO UNT.

---

## Sistema Multi-Rol

### Características

**Un usuario puede tener múltiples roles activos simultáneamente**.

**Ejemplos**:
- Un usuario puede ser **Marketing** y **Usuario** al mismo tiempo
- Un usuario puede ser **Administrador** y **Supervisor**
- Un usuario puede tener cualquier combinación de roles

### Determinación de Permisos

Cuando un usuario tiene múltiples roles:

1. **Unión de permisos**: El usuario tiene todos los permisos de todos sus roles activos
2. **Máximo privilegio**: Si un rol permite algo, el usuario puede hacerlo
3. **Sin restricción**: Los roles no se restringen entre sí

**Ejemplo**:
- Usuario con roles: **Marketing** + **Usuario**
- Puede: Generar certificados (Marketing) + Ver sus propios certificados (Usuario)

---

## Matriz de Permisos

| Funcionalidad | Administrador | Marketing | Supervisor | Usuario | Visitante |
|---------------|---------------|-----------|------------|---------|-----------|
| Gestión de usuarios | ✅ | ❌ | ❌ | ❌ | ❌ |
| Gestión de personas | ✅ | ❌ | ❌ | ❌ | ❌ |
| Gestión de áreas/cargos | ✅ | ❌ | ❌ | ❌ | ❌ |
| Gestión de proyectos/eventos | ✅ | ✅ (consulta) | ✅ (consulta) | ❌ | ❌ |
| Generar certificados | ✅ | ✅ | ❌ | ❌ | ❌ |
| Modificar certificados | ✅ | ❌ | ❌ | ❌ | ❌ |
| Eliminar certificados | ✅ | ❌ | ❌ | ❌ | ❌ |
| Ver todos los certificados | ✅ | ✅ | ✅ | ❌ | ❌ |
| Ver certificados propios | ✅ | ✅ | ✅ | ✅ | ❌ |
| Descargar certificados propios | ✅ | ✅ | ✅ | ✅ | ❌ |
| Validar certificados (público) | ✅ | ✅ | ✅ | ✅ | ✅ |
| Ver reportes completos | ✅ | ✅ (parcial) | ✅ | ❌ | ❌ |
| Configuraciones del sistema | ✅ | ❌ | ❌ | ❌ | ❌ |
| Logs y auditoría | ✅ | ❌ | ❌ | ❌ | ❌ |

---

## Implementación Técnica

### Estructura de Base de Datos

**Tablas relacionadas**:
- `users`: Usuarios del sistema
- `roles`: Roles disponibles
- `user_rol`: Tabla pivot (usuario puede tener múltiples roles)

**Relaciones**:
```
User → belongsToMany → Role (through user_rol)
Role → belongsToMany → User (through user_rol)
```

### Autorización

**Métodos de autorización**:

1. **Policies** (para modelos específicos):
   - `CertificadoPolicy`
   - `GrupoDeCertificacionPolicy`
   - `PersonaPolicy`
   - etc.

2. **Gates** (para acciones transversales):
   - `generar-certificados`
   - `gestionar-usuarios`
   - etc.

3. **Middleware** (para rutas):
   - `auth`: Requiere autenticación
   - `role:admin`: Requiere rol específico
   - `can:action`: Requiere capacidad específica

### Ejemplo de Policy

```php
// CertificadoPolicy.php
public function viewAny(User $user)
{
    return $user->hasRole(['admin', 'marketing', 'supervisor']);
}

public function generate(User $user)
{
    return $user->hasRole(['admin', 'marketing']);
}

public function view(User $user, Certificado $certificado)
{
    // Admin, Marketing y Supervisor pueden ver todos
    if ($user->hasRole(['admin', 'marketing', 'supervisor'])) {
        return true;
    }
    
    // Usuario solo puede ver los suyos
    if ($user->hasRole('usuario')) {
        return $certificado->persona_id === $user->persona_id;
    }
    
    return false;
}
```

---

## Flujos de Autorización

### Generación de Certificados

1. Usuario intenta acceder a generación
2. Middleware verifica autenticación
3. Policy verifica rol (Admin o Marketing)
4. Si autorizado → Acceso permitido
5. Si no autorizado → Redirección con error

### Validación Pública

1. Visitante accede a página de validación
2. No se requiere autenticación
3. Sistema permite validación con código/QR
4. Solo muestra datos públicos
5. No permite descarga (solo visualización)

### Consulta de Certificados Propios

1. Usuario autenticado accede a "Mis Certificados"
2. Sistema filtra por `persona_id` del usuario
3. Muestra solo certificados asociados a su persona
4. Permite descarga de sus propios certificados

---

## Gestión de Roles

### Asignación de Roles

**Solo Administradores pueden**:
- Asignar roles a usuarios
- Remover roles de usuarios
- Crear nuevos roles (si está implementado)
- Modificar permisos de roles (si está implementado)

### Cambios de Rol

- Los cambios de rol se registran históricamente
- Un usuario puede tener roles activos e inactivos
- Solo los roles activos determinan permisos actuales

---

## Seguridad

### Principios

1. **Principio de Menor Privilegio**: Cada rol tiene solo los permisos necesarios
2. **Verificación en Múltiples Capas**: Middleware + Policies + Gates
3. **Validación en Backend**: Nunca confiar solo en validación frontend
4. **Auditoría**: Registrar acciones importantes por usuario y rol

### Mejores Prácticas

- ✅ Verificar permisos en cada acción crítica
- ✅ Usar Policies para lógica de autorización compleja
- ✅ No exponer funcionalidades no autorizadas en UI
- ✅ Validar en backend aunque UI oculte opciones
- ✅ Registrar cambios de roles y acciones importantes

---

## Casos de Uso Comunes

### Caso 1: Marketing genera certificados

1. Usuario con rol **Marketing** inicia sesión
2. Accede a "Generar Certificados"
3. Sistema verifica rol → ✅ Autorizado
4. Crea grupo de certificación
5. Genera certificados masivos
6. Descarga certificados generados

### Caso 2: Miembro consulta sus certificados

1. Usuario con rol **Usuario** inicia sesión
2. Accede a "Mis Certificados"
3. Sistema filtra por su `persona_id`
4. Muestra solo sus certificados
5. Permite descarga de los suyos

### Caso 3: Visitante valida certificado

1. Visitante (sin login) accede a validación
2. Ingresa código único
3. Sistema busca certificado
4. Muestra datos públicos
5. No permite descarga

### Caso 4: Supervisor revisa actividad

1. Usuario con rol **Supervisor** inicia sesión
2. Accede a "Reportes"
3. Visualiza estadísticas y certificados generados
4. No puede modificar nada
5. Solo lectura completa

---

## Notas de Implementación

### Estado Actual

- Sistema de roles implementado
- Tabla `user_rol` para multi-rol
- Policies básicas implementadas

### Mejoras Futuras

- Interfaz de gestión de roles para Administradores
- Permisos granulares por acción
- Historial de cambios de roles
- Notificaciones por cambios de permisos

---

## Referencias

- [Arquitectura](./arquitectura.md) - Implementación técnica de autorización
- [Flujo de Certificación](./flujo-certificacion.md) - Aplicación de permisos en flujos
- [Dominio del Negocio](./dominio.md) - Contexto organizacional

