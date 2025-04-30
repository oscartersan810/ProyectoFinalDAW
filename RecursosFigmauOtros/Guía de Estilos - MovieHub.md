
# Guía de Estilos de MovieHub

## Tipografía
- Fuente principal: `Orbitron` (importada desde Google Fonts).
- Fuente secundaria (para algunos títulos destacados): `Concert One`.

## Colores
- Fondo principal: `#1e1e1e` (gris oscuro).
- Fondo secciones alternas: `#2d2d2d` o `#374151` (gris más claro / Tailwind `gray-800`).
- Texto principal: Blanco (`#ffffff`).
- Texto secundario: Gris claro (`#d1d5db` - Tailwind `gray-300`).
- Colores de acento:
  - Verde para `hover` y botones destacados: `#86efac` (Tailwind `green-300`).
  - Opcional: Tonos de morado o azul oscuro para énfasis secundarios.

## Espaciado
- Padding general en secciones: `px-4 py-10`.
- Separación interna entre elementos principales: `space-x-4` o `space-y-6`.
- Margen inferior de títulos: `mb-6` o `mb-8`.

## Tamaños de letra
- Navbar: `text-base` (16px aproximadamente).
- Títulos principales (`h1`, `h2`): 
  - `h1`: `text-4xl` (36px).
  - `h2`: `text-2xl` (24px).
- Texto de párrafo: `text-lg` (18px).

## Imágenes
- Logo: 
  - Altura fija `h-20`.
  - Escala ajustada usando `transform scale-125 origin-left` para ser grande sin afectar la altura de la cabecera.
- Imágenes de bienvenida:
  - Ancho fijo: `w-60`, altura automática.
  - Estilo adicional: `shadow-xl`, `rounded-lg`, `hover:scale-105`.

## Botones y enlaces
- Transición suave en los botones/enlaces: `transition duration-300` o `duration-500`.
- Efecto `hover` cambiando el color del texto.

## Animaciones
- Imágenes y tarjetas con efecto de `hover:scale-105`.
- Secciones de entrada usando:
  - `transition-transform` y `duration-700`.
  - Animaciones opcionales usando librerías como `AOS` (Animate On Scroll) o Tailwind `animate-fadeIn`.

## Responsive
- Diseño adaptativo desde móviles hasta pantallas grandes.
- Uso de `flex`, `grid` y clases responsive como `md:flex-row`, `md:grid-cols-2`, etc.

---

# Ejemplo de Configuración TailwindCSS Personalizado

```html
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          orbitron: ['Orbitron', 'sans-serif'],
          concert: ['Concert One', 'cursive'],
        },
        colors: {
          fondo: '#1e1e1e',
          fondoSecundario: '#2d2d2d',
          acento: '#86efac',
        },
        animation: {
          fadeIn: 'fadeIn 1s ease-out',
        },
        keyframes: {
          fadeIn: {
            '0%': { opacity: 0 },
            '100%': { opacity: 1 },
          },
        },
      }
    }
  }
</script>
```
