
# 📚 Librería de Componentes - MovieHub

---

## Navbar

**Descripción**: Barra de navegación superior con logo a la izquierda y enlaces a la derecha.

```html
<nav class="flex justify-between items-center px-6 py-4 bg-gray-900 text-white">
  <div>
    <a href="#bienvenida">
      <img src="/images/logo.png" alt="MovieHub Logo" class="h-20 transform scale-150 origin-left">
    </a>
  </div>
  <ul class="flex space-x-6 text-base">
    <li><a href="#bienvenida" class="hover:text-green-300 transition duration-300">Inicio</a></li>
    <li><a href="#acerca" class="hover:text-green-300 transition duration-300">Explorar</a></li>
    <li><a href="#acciones" class="hover:text-green-300 transition duration-300">Top Películas / Series</a></li>
    <li><a href="#valorada" class="hover:text-green-300 transition duration-300">Reseñas</a></li>
    <li><a href="{{ route('login') }}" class="hover:text-green-300 transition duration-300">Login</a></li>
    <li><a href="{{ route('register') }}" class="hover:text-green-300 transition duration-300">Registrarse</a></li>
  </ul>
</nav>
```

---

## Botón

**Descripción**: Botón principal usado en formularios y llamadas a la acción.

```html
<button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300">
  Click aquí
</button>
```

---

## Tarjeta de Película

**Descripción**: Tarjeta para mostrar una película o serie.

```html
<div class="w-60 bg-gray-700 rounded-lg shadow-lg p-4 transform hover:scale-105 transition duration-500">
  <img src="/images/ejemplo.jpg" alt="Película" class="rounded">
  <h3 class="mt-2 text-lg font-semibold">Título de Película</h3>
  <p class="text-gray-300 text-sm">Descripción breve de la película o serie.</p>
</div>
```

---

## Sección Principal

**Descripción**: Sección de página completa, centrada verticalmente.

```html
<section class="min-h-screen flex flex-col justify-center items-center text-center py-10">
  <h1 class="text-4xl font-bold mb-8">Título Principal</h1>
  <p class="text-lg text-gray-300">Texto o descripción de la sección.</p>
</section>
```

---

## Footer

**Descripción**: Pie de página simple.

```html
<footer class="text-center py-4 bg-gray-900 text-gray-400">
  © 2025 MovieHub
</footer>
```
