<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bubblesAD.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

        body {
            background: #1e1e1e;
            font-family: 'Orbitron', sans-serif;
        }

        #acerca bubles {
            position: absolute;
            border-radius: 100%;
            pointer-events: none;
            border: 1px solid #00ffff;
            box-shadow: 0px 0px 15px 0px #00ffff inset;
            transform: translate(-50%, -50%);
            animation: colorgen 5s linear forwards, float 2s ease-in-out infinite;
            z-index: 5;
        }

        @keyframes colorgen {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-1000px);
            }
        }
    </style>
</head>

<body class="text-white">

    <!-- NAVBAR -->
    <nav class="px-6 py-4 bg-gray-900 text-white">
        <div class="flex justify-between items-center">
            <a href="#bienvenida">
                <img src="/images/logo.png" alt="MovieHub Logo" class="h-16 md:h-20">
            </a>
            <div class="md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <ul id="nav-links" class="hidden md:flex space-x-6 text-base">
                <li><a href="#bienvenida" class="hover:text-green-300 transition duration-300">Inicio</a></li>
                <li><a href="#acerca" class="hover:text-green-300 transition duration-300">Explorar</a></li>
                <li><a href="#acciones" class="hover:text-green-300 transition duration-300">Top Películas / Series</a></li>
                <li><a href="#valorada" class="hover:text-green-300 transition duration-300">Reseñas</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-green-300 transition duration-300">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-green-300 transition duration-300">Registrarse</a></li>
            </ul>
        </div>
        <ul id="mobile-menu" class="md:hidden hidden flex-col mt-4 space-y-2 text-base">
            <li><a href="#bienvenida" class="block hover:text-green-300">Inicio</a></li>
            <li><a href="#acerca" class="block hover:text-green-300">Explorar</a></li>
            <li><a href="#acciones" class="block hover:text-green-300">Top Películas / Series</a></li>
            <li><a href="#valorada" class="block hover:text-green-300">Reseñas</a></li>
            <li><a href="{{ route('login') }}" class="block hover:text-green-300">Login</a></li>
            <li><a href="{{ route('register') }}" class="block hover:text-green-300">Registrarse</a></li>
        </ul>
    </nav>

    <!-- BIENVENIDA -->
    <section id="bienvenida" class="text-center py-12 min-h-screen flex flex-col justify-center items-center bg-gray-700" data-aos="fade-up">
        <h1 class="text-2xl md:text-5xl font-bold text-white mb-10 tracking-wide">BIENVENIDO A MOVIEHUB</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 w-full max-w-6xl">
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800">
                <img src="/images/moviesimages/movie1.png" alt="Película 1" class="w-full h-48 md:h-[28rem] object-cover object-top">
            </div>
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800">
                <img src="/images/moviesimages/movie2.jpg" alt="Película 2" class="w-full h-48 md:h-[28rem] object-cover object-top">
            </div>
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800">
                <img src="/images/moviesimages/movie3.jpg" alt="Película 3" class="w-full h-48 md:h-[28rem] object-cover object-top">
            </div>
        </div>
    </section>




    <!-- ACERCA DE MOVIEHUB -->
    <section id="acerca" class="relative bg-gray-800 py-10 px-4 min-h-screen flex items-center overflow-hidden" data-aos="fade-up">
        <!-- Burbujas animadas -->
        <div id="bubbles"></div>
        <div id="bubbles2"></div>
        <div id="bubbles3"></div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
            <h2 class="text-2xl md:text-5xl font-bold text-center md:text-left text-white">
                ACERCA DE MOVIEHUB
            </h2>
            <p class="text-base md:text-xl text-gray-300 text-center md:text-left">
                MovieHub es tu plataforma para descubrir, valorar y compartir películas y series. Únete a nuestra comunidad y empieza a explorar.
            </p>
        </div>
    </section>

    <!-- ¿QUÉ PUEDES HACER? -->
    <section id="acciones" class="py-16 px-6 min-h-screen flex flex-col justify-center bg-gray-700" data-aos="fade-up">
        <!-- Canvas para burbujas -->
        <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>
        <div class="relative z-10 max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-bold mb-12 text-center text-white tracking-wide">¿QUÉ PUEDES HACER EN MOVIEHUB?</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 justify-items-center">

                <!-- Caja 1 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-purple-700 to-indigo-700 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Puntuar tus películas y series favoritas
                </div>
                <!-- Caja 2 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-pink-600 to-red-600 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                    </svg>
                    Escribir y leer reseñas de otros usuarios
                </div>
                <!-- Caja 3 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-green-600 to-emerald-600 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 9l6 6" />
                    </svg>
                    Consultar rankings y valoraciones
                </div>
                <!-- Caja 4 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-yellow-500 to-orange-500 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Crear y gestionar listas personalizadas
                </div>
                <!-- Caja 5 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-sky-500 to-blue-600 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h2a2 2 0 0 1 2 2v6m-6-6h6" />
                    </svg>
                    Seguir a otros usuarios con gustos similares
                </div>
            </div>
        </div>
    </section>



    <!-- LA MÁS VALORADA DE LA SEMANA -->
    <section id="valorada" class="bg-gray-800 py-10 px-4 min-h-screen flex items-center" data-aos="fade-up">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">LA MÁS VALORADA DE ESTA SEMANA</h2>
            <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-6">
                <div class="w-full md:w-60 h-auto bg-gray-700 rounded-lg"></div>
                <div class="text-gray-300 text-center md:text-left">
                    <h3 class="text-xl font-semibold">Título y descripción de la película</h3>
                    <p class="text-lg">Una breve sinopsis o información destacada que motive al usuario a verla.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-4 bg-gray-900 text-gray-400">
        © 2025 MovieHub
    </footer>

    <!-- AOS Script y toggle menú -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        document.getElementById('menu-toggle').addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        document.addEventListener("mousemove", (e) => {
            const acercaSection = document.getElementById("acerca");
            if (!acercaSection) return;

            const rect = acercaSection.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            if (x < 0 || y < 0 || x > rect.width || y > rect.height) return;

            let bubles = document.createElement("bubles");
            let size = Math.random() * 60;

            bubles.style.width = 1 + size + "px";
            bubles.style.height = 1 + size + "px";
            bubles.style.left = x + "px";
            bubles.style.top = y + "px";

            acercaSection.appendChild(bubles);

            setTimeout(() => bubles.remove(), 5000);
        });

        document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.querySelector('#acciones canvas');
    const ctx = canvas.getContext('2d');
    let bubbles = [];

    function resizeCanvas() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    for (let i = 0; i < 30; i++) {
        bubbles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            radius: Math.random() * 10 + 5,
            speed: Math.random() * 1 + 0.5,
            opacity: Math.random() * 0.4 + 0.2
        });
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let b of bubbles) {
            ctx.beginPath();
            ctx.arc(b.x, b.y, b.radius, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(255,255,255,${b.opacity})`;
            ctx.fill();
            b.y -= b.speed;
            if (b.y + b.radius < 0) {
                b.y = canvas.height + b.radius;
                b.x = Math.random() * canvas.width;
            }
        }
        requestAnimationFrame(animate);
    }

    animate();
});
    </script>
</body>

</html>