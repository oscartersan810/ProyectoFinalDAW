<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MovieHub</title>
    <link rel="icon" href="{{ asset('images/moviehub-icon.ico') }}" type="image/png">

    <!-- Tailwind y AOS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- MODAL -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: repeat;
            background-position: center;
            font-size: 16px; /* Tamaño base para desktop */
        }

        /* Tamaños de fuente para móviles */
        @media (max-width: 768px) {
            html, body {
                font-size: 14px;
            }
            
            h1 {
                font-size: 1.8rem !important;
            }
            
            h2 {
                font-size: 1.5rem !important;
            }
            
            h3 {
                font-size: 1.3rem !important;
            }
            
            p, a, li, span, button {
                font-size: 0.9rem !important;
            }
            
            /* Ajustes específicos para elementos comunes */
            .text-xl {
                font-size: 1.1rem !important;
            }
            
            .text-2xl {
                font-size: 1.3rem !important;
            }
            
            .text-3xl {
                font-size: 1.5rem !important;
            }
            
            .text-4xl {
                font-size: 1.7rem !important;
            }
            
            .text-5xl {
                font-size: 2rem !important;
            }
        }

        /* Fondo para escritorio */
        body {
            background-image: url('/images/backgrounds/FondoEscritorio.png');
        }

        /* Fondo para tablets */
        @media (max-width: 1024px) {
            body {
                background-image: url('/images/backgrounds/FondoTablet.png');
            }
        }

        /* Fondo para móviles */
        @media (max-width: 768px) {
            body {
                background-image: url('/images/backgrounds/FondoMovil.png');
            }
        }

        section {
            background-color: rgba(255, 255, 255, 0.85);
            margin: 2rem;
            padding: 2rem;
            border-radius: 1rem;
        }

        /* Ajustes de márgenes para móviles */
        @media (max-width: 768px) {
            section {
                margin: 1rem;
                padding: 1.5rem;
            }
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

    <!-- Scripts de tu app -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-white font-sans antialiased min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    @include('layouts.navigation')

    {{-- Contenido dinámico --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- Scripts externos --}}
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