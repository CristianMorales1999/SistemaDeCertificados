# Sistema de Diseño

## Visión General

El sistema de diseño de SEDICERT está definido de manera centralizada en el archivo `resources/css/app.css`, que actúa como **fuente de verdad única** para todos los estilos, colores, tipografías y espaciados del proyecto.

---

## Fuente de Verdad

### Archivo Principal

**Ubicación**: `resources/css/app.css`

Este archivo contiene:
- Tokens de color (variables CSS)
- Tokens tipográficos (fuentes, tamaños, pesos)
- Clases utilitarias predefinidas
- Configuración de TailwindCSS

⚠️ **Regla crítica**: Este archivo es la **única fuente de verdad** para el diseño. No se deben usar valores hardcodeados en otros lugares.

---

## Reglas Estrictas de Uso

### ❌ NO Hacer

1. **NO usar colores hex directamente en Blade**
   ```blade
   <!-- ❌ INCORRECTO -->
   <div style="color: #3154a2;">Texto</div>
   <div class="text-[#3154a2]">Texto</div>
   ```

2. **NO usar tamaños arbitrarios**
   ```blade
   <!-- ❌ INCORRECTO -->
   <div class="text-[18px]">Texto</div>
   ```

3. **NO improvisar estilos**
   ```blade
   <!-- ❌ INCORRECTO -->
   <div style="font-size: 16px; color: blue;">Texto</div>
   ```

### ✅ Hacer

1. **Usar tokens CSS definidos**
   ```blade
   <!-- ✅ CORRECTO -->
   <div class="text-primary-300">Texto</div>
   ```

2. **Usar clases tipográficas definidas**
   ```blade
   <!-- ✅ CORRECTO -->
   <h1 class="h1-Heading-32px-Bold">Título</h1>
   <p class="Normaltext-16px-Regular">Texto</p>
   ```

3. **Usar variables CSS cuando sea necesario**
   ```blade
   <!-- ✅ CORRECTO -->
   <div style="color: var(--color-primary-300);">Texto</div>
   ```

---

## Tipografía

### Fuente Principal

**Inter** es la tipografía oficial del sistema.

**Configuración**:
- Fuente: `"Inter", sans-serif`
- Fallbacks: `ui-sans-serif, system-ui, sans-serif`

### Escalas Tipográficas

#### Headings (Títulos)

| Clase | Tamaño | Line Height | Peso | Uso |
|-------|--------|-------------|------|-----|
| `.h1-Heading-32px-Bold` | 32px | 40px | 700 | Títulos de página |
| `.h2-Title-28px-Bold` | 28px | 36px | 700 | Títulos de sección |
| `.h3-Subtitle-24px-Semibold` | 24px | 32px | 600 | Subtítulos principales |
| `.h4-Subtitle-20px-Medium` | 20px | 28px | 500 | Subtítulos secundarios |
| `.h5-Subtitle-18px-Regular` | 18px | 26px | 400 | Subtítulos terciarios |
| `.h6-Subtitle-16px-Regular` | 16px | 24px | 400 | Subtítulos menores |

#### Texto Normal

| Clase | Tamaño | Line Height | Peso | Uso |
|-------|--------|-------------|------|-----|
| `.Normaltext-18px-Semibold` | 18px | 28px | 600 | Texto destacado |
| `.Normaltext-18px-Medium` | 18px | 26px | 500 | Texto medio destacado |
| `.Normaltext-16px-Semibold` | 16px | 24px | 600 | Texto semibold |
| `.Normaltext-16px-Regular` | 16px | 24px | 400 | Texto base |
| `.Normaltext-14px-Semibold` | 14px | 22px | 600 | Texto pequeño semibold |
| `.Normaltext-14px-Medium` | 14px | 22px | 500 | Texto pequeño medio |
| `.Normaltext-14px-Regular` | 14px | 22px | 400 | Texto secundario |
| `.Littletext-12px-Light` | 12px | 20px | 300 | Ayudas y notas |

### Variables CSS

Todas las escalas tipográficas están definidas como variables CSS:

```css
--h1-Heading-32px-Bold: 32px/40px "Inter", sans-serif;
--h2-Title-28px-Bold: 28px/36px "Inter", sans-serif;
--Normaltext-16px-Regular: 16px/24px "Inter", sans-serif;
/* ... etc */
```

---

## Paleta de Colores

### Colores Institucionales SEDIPRO

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-azul-oscuro` | `#292d66` | Color institucional oscuro |
| `--color-azul` | `#3154a2` | Color institucional principal |
| `--color-morado` | `#672577` | Color institucional secundario |

### Colores Primary (Azul)

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-primary-25` | `#f7faff` | Fondo muy claro |
| `--color-primary-50` | `#ebf1fd` | Fondo claro |
| `--color-primary-100` | `#b4c3e7` | Borde claro |
| `--color-primary-200` | `#6987cf` | Hover claro |
| `--color-primary-300` | `#3454a1` | Color principal |
| `--color-primary-400` | `#29427e` | Hover oscuro |
| `--color-primary-500` | `#1d2f5a` | Color oscuro |

**Alpha**:
- `--color-primary-alpha-10`: `rgba(52, 84, 161, 0.1)`

### Colores Secondary (Morado)

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-secondary-100` | `#979ad4` | Tono claro |
| `--color-secondary-200` | `#6368bf` | Tono medio claro |
| `--color-secondary-300` | `#3f449a` | Tono medio |
| `--color-secondary-400` | `#2a2d66` | Tono oscuro |
| `--color-secondary-500` | `#191a3c` | Tono muy oscuro |

**Alpha**:
- `--color-secondary-alpha-10`: `rgba(58, 40, 149, 0.1)`
- `--color-secondary-alpha-5`: `rgba(58, 40, 149, 0.05)`

### Colores Neutral (Grises)

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-neutral-0` | `#ffffff` | Blanco |
| `--color-neutral-100` | `#ebebed` | Gris muy claro |
| `--color-neutral-200` | `#d8d8d8` | Gris claro |
| `--color-neutral-300` | `#c4c4c4` | Gris medio claro |
| `--color-neutral-400` | `#afabaf` | Gris medio |
| `--color-neutral-500` | `#9a9a9a` | Gris |
| `--color-neutral-600` | `#808686` | Gris oscuro |
| `--color-neutral-700` | `#717171` | Gris más oscuro |
| `--color-neutral-800` | `#5c5c5c` | Gris muy oscuro |
| `--color-neutral-850` | `#484848` | Gris casi negro |
| `--color-neutral-900` | `#333333` | Casi negro |

### Colores Accent (Morado/Acento)

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-accent-50` | `#e7c9ee` | Acento muy claro |
| `--color-accent-100` | `#cf93dd` | Acento claro |
| `--color-accent-200` | `#b75dcd` | Acento medio claro |
| `--color-accent-300` | `#9636ad` | Acento medio |
| `--color-accent-400` | `#6c2d91` | Acento oscuro |
| `--color-accent-500` | `#672577` | Acento principal |
| `--color-accent-600` | `#3c1645` | Acento muy oscuro |

### Colores Funcionales

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-red-100` | `#dc3545` | Error, peligro |
| `--color-red-200` | `#a21c29` | Error oscuro |
| `--color-yellow-100` | `#ffc107` | Advertencia |
| `--color-yellow-200` | `#b78900` | Advertencia oscura |
| `--color-green-100` | `#85e29a` | Éxito claro |
| `--color-green-200` | `#28A745` | Éxito |
| `--color-green-300` | `#28A745` | Éxito alternativo |
| `--color-success` | `#43b75d` | Éxito principal |

### Colores Light Blue

| Variable | Hex | Uso |
|----------|-----|-----|
| `--color-light-blue-50` | `#e6f4ff` | Azul claro muy claro |
| `--color-light-blue-100` | `#b0deff` | Azul claro claro |
| `--color-light-blue-200` | `#8aceff` | Azul claro medio claro |
| `--color-light-blue-300` | `#54b8ff` | Azul claro medio |
| `--color-light-blue-400` | `#33aaff` | Azul claro oscuro |
| `--color-light-blue-500` | `#0095ff` | Azul claro principal |

---

## Espaciado y Márgenes

### Márgenes para Headings

| Variable | Valor | Uso |
|----------|-------|-----|
| `--margin-top-h1` | `70px` | Margen superior H1 |
| `--margin-bottom-h1` | `50px` | Margen inferior H1 |
| `--margin-top-h2` | `50px` | Margen superior H2 |
| `--margin-bottom-h2` | `40px` | Margen inferior H2 |
| `--margin-top-default` | `20px` | Margen superior por defecto |
| `--margin-bottom-default` | `20px` | Margen inferior por defecto |

### Tamaños de Fuente

| Variable | Valor |
|----------|-------|
| `--font-size-h1` | `32px` |
| `--font-size-h2` | `28px` |
| `--font-size-h3` | `24px` |
| `--font-size-h4` | `20px` |
| `--font-size-h5` | `18px` |
| `--font-size-h6` | `16px` |
| `--font-size-large` | `18px` |
| `--font-size-medium` | `16px` |
| `--font-size-small` | `14px` |
| `--font-size-extra-small` | `12px` |

---

## Uso en TailwindCSS

### Configuración

El archivo `app.css` importa TailwindCSS y configura el tema con las variables definidas:

```css
@import "tailwindcss";

@theme {
    --color-primary-300: #3454a1;
    --color-primary-400: #29427e;
    /* ... etc */
}
```

### Clases Tailwind Disponibles

Gracias a la configuración, puedes usar:

```blade
<!-- Colores -->
<div class="bg-primary-300 text-neutral-0">Contenido</div>
<div class="text-secondary-300">Texto</div>

<!-- Tailwind utilities estándar -->
<div class="p-4 m-2 rounded-lg">Contenido</div>
```

---

## Estilo Visual

### Características

- **Institucional**: Refleja la identidad de SEDIPRO UNT
- **Profesional**: Diseño serio y confiable
- **Limpio**: Sin elementos innecesarios
- **Accesible**: Cumple estándares de accesibilidad
- **Consistente**: Mismo estilo en toda la aplicación

### Principios de Diseño

1. **Consistencia**: Mismos elementos, mismos estilos
2. **Jerarquía**: Tipografía y colores establecen jerarquía visual
3. **Contraste**: Suficiente contraste para legibilidad
4. **Espaciado**: Espacios adecuados para respiración visual
5. **Simplicidad**: Diseño limpio sin sobrecarga

---

## Ejemplos de Uso

### Título de Página

```blade
<h1 class="h1-Heading-32px-Bold text-primary-300">
    Generación de Certificados
</h1>
```

### Texto Normal

```blade
<p class="Normaltext-16px-Regular text-neutral-900">
    Este es un párrafo de texto normal con el estilo definido.
</p>
```

### Botón Primario

```blade
<button class="bg-primary-300 text-neutral-0 px-4 py-2 rounded-lg 
                Normaltext-16px-Semibold hover:bg-primary-400">
    Generar Certificado
</button>
```

### Card

```blade
<div class="bg-neutral-0 border border-neutral-200 rounded-lg p-6 
            shadow-sm">
    <h3 class="h3-Subtitle-24px-Semibold text-neutral-900 mb-4">
        Título del Card
    </h3>
    <p class="Normaltext-14px-Regular text-neutral-700">
        Contenido del card.
    </p>
</div>
```

---

## Mantenimiento

### Agregar Nuevos Tokens

1. Agregar variable en `@theme` de `app.css`
2. Documentar en este archivo
3. Usar en componentes según necesidad

### Modificar Tokens Existentes

1. Modificar en `app.css`
2. Verificar impacto en toda la aplicación
3. Actualizar documentación si es necesario

### Buenas Prácticas

- ✅ Siempre usar tokens definidos
- ✅ No crear estilos inline innecesarios
- ✅ Reutilizar clases existentes
- ✅ Documentar nuevos patrones de diseño
- ✅ Mantener consistencia visual

---

## Referencias

- [Archivo fuente](./../resources/css/app.css) - Implementación completa
- [TailwindCSS Documentation](https://tailwindcss.com/docs) - Documentación de TailwindCSS
- [Arquitectura](./arquitectura.md) - Contexto técnico del sistema

