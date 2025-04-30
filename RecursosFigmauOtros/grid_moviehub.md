# Grid de MovieHub

## Layout Principal

La página se divide en varias secciones principales organizadas en un sistema de **grid** flexible:

| Sección | Columnas | Descripción |
|:-------|:--------|:------------|
| Navbar  | 1 columna | Logo y navegación |
| Bienvenida | 1 columna centralizada | Título de bienvenida + 3 imágenes destacadas |
| Acerca de | 2 columnas (en md y superior) | Texto explicativo sobre MovieHub |
| Acciones | 3 columnas en móviles, 5 en escritorio | Cuadros de acciones posibles |
| Más Valorada | 2 columnas (imagen + texto) | Información destacada de una película/serie |

## Breakpoints usados

- **Mobile first** (`<640px`): 1 columna
- **Tablet** (`≥640px`): 2 columnas
- **Desktop** (`≥1024px`): 3-5 columnas

## Herramientas

- **TailwindCSS Grid**: `grid grid-cols-X`, `gap-X`, `justify-items-center`
- **Flexbox**: Para centrar elementos vertical y horizontalmente.

## Ejemplos de clases usadas

```html
<div class="grid grid-cols-3 md:grid-cols-5 gap-4 justify-items-center">
    <!-- Cada ítem -->
</div>
```

```html
<section class="min-h-screen flex flex-col justify-center items-center">
    <!-- Contenido -->
</section>
```

---
© 2025 MovieHub
