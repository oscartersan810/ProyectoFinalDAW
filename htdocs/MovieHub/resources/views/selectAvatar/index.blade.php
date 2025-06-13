<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MovieHub') }} - Selección de Avatar</title>

    <!-- Tailwind y AOS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

        body {
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            touch-action: manipulation;
        }

        .avatar-container {
            background: rgba(17, 24, 39, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            border: 1px solid rgba(234, 179, 8, 0.3);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 95%;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            margin: 1rem auto;
        }

        .avatar-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(234, 179, 8, 0.1) 0%, transparent 70%);
            z-index: -1;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .avatar-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .avatar-item {
            transition: all 0.3s ease;
            position: relative;
            padding: 0.25rem;
        }

        .avatar-item:hover {
            transform: translateY(-3px);
        }

        .avatar-img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            aspect-ratio: 1/1;
        }

        .avatar-item input:checked + .avatar-img {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.4);
            transform: scale(1.05);
        }

        .btn {
            transition: all 0.3s ease;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f59e0b 75%, #4ade80 25%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #f59e0b 60%, #4ade80 40%);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.4);
        }

        .btn-secondary {
            background: rgba(55, 65, 81, 0.7);
            color: white;
            border: 1px solid rgba(234, 179, 8, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(55, 65, 81, 1);
            transform: translateY(-2px);
        }

        .btn-random {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            color: white;
        }

        .btn-random:hover {
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(249, 115, 22, 0.4);
        }

        .pagination-controls {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            margin: 1rem 0;
        }

        .title {
            font-family: 'Concert One', cursive;
            background: linear-gradient(135deg, #f59e0b 75%, #4ade80 25%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 1.75rem;
            line-height: 1.2;
        }

        /* Efectos de partículas */
        .particle {
            position: absolute;
            background: rgba(234, 179, 8, 0.6);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Mejoras para móvil */
        .mobile-optimized {
            -webkit-tap-highlight-color: transparent;
        }

        input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .avatar-item:active {
            transform: scale(0.95);
        }

        @media (min-width: 640px) {
            .avatar-container {
                padding: 2rem;
                max-width: 600px;
                border-radius: 1.25rem;
            }

            .avatar-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 1.25rem;
            }

            .avatar-img {
                height: 100px;
            }

            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
                width: auto;
                margin-bottom: 0;
            }

            .title {
                font-size: 2.25rem;
            }

            .button-group {
                display: flex;
                gap: 1rem;
                justify-content: center;
            }
        }

        @media (min-width: 768px) {
            .avatar-container {
                max-width: 700px;
                padding: 2.5rem;
            }

            .avatar-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-20px) translateX(10px);
            }
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-2 mobile-optimized">
    <!-- Efecto de partículas -->
    <div id="particles-js"></div>

    <div class="avatar-container" data-aos="zoom-in">
        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-center title">
            Selecciona tu Avatar
        </h1>
        
        <p class="text-center text-gray-300 mb-6 text-sm md:text-base">
            Elige una imagen que te represente en MovieHub. Puedes cambiarla después en tu perfil.
        </p>

        <form method="POST" action="{{ route('select.avatar.store') }}" enctype="multipart/form-data">
            @csrf
            <div id="avatarContainer" class="avatar-grid">
                @foreach($avatars as $index => $avatar)
                    <label class="avatar-item {{ $index >= 9 ? 'hidden' : '' }}">
                        <input type="radio" name="avatar" value="{{ $avatar }}" class="sr-only peer">
                        <img src="{{ asset($avatar) }}" class="avatar-img" alt="Avatar {{ $index + 1 }}" loading="lazy">
                    </label>
                @endforeach
            </div>

            <div class="pagination-controls">
                <button type="button" id="prevPage" class="btn btn-secondary" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Anterior
                </button>
                <button type="button" id="nextPage" class="btn btn-secondary">
                    Siguiente
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-col mt-4">
                <button type="button" id="randomAvatarBtn" class="btn btn-random mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    Aleatorio
                </button>
                <button type="submit" id="acceptBtn" disabled class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Confirmar
                </button>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inicializar animaciones
            AOS.init({
                duration: 600,
                easing: 'ease-out-quad',
                once: true
            });

            // Configuración de avatares
            const avatars = Array.from(document.querySelectorAll('.avatar-item'));
            const perPage = 9; // Mostrar 9 avatares por página en móvil
            let currentPage = 0;
            const totalPages = Math.ceil(avatars.length / perPage);

            const renderPage = () => {
                avatars.forEach((el, idx) => {
                    el.classList.toggle('hidden', idx < currentPage * perPage || idx >= (currentPage + 1) * perPage);
                });

                document.getElementById('prevPage').disabled = currentPage === 0;
                document.getElementById('nextPage').disabled = (currentPage + 1) * perPage >= avatars.length;
                
                // Deshabilitar botón de aceptar si no hay selección
                const selected = document.querySelector('input[name="avatar"]:checked');
                document.getElementById('acceptBtn').disabled = !selected;
            };

            // Event listeners mejorados para móvil
            document.getElementById('prevPage').addEventListener('click', () => {
                if (currentPage > 0) {
                    currentPage--;
                    renderPage();
                }
            });

            document.getElementById('nextPage').addEventListener('click', () => {
                if ((currentPage + 1) * perPage < avatars.length) {
                    currentPage++;
                    renderPage();
                }
            });

            // Selección de avatar táctil
            document.querySelectorAll('.avatar-item').forEach(item => {
                item.addEventListener('touchstart', function(e) {
                    this.classList.add('active');
                }, {passive: true});
                
                item.addEventListener('touchend', function(e) {
                    this.classList.remove('active');
                    const radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;
                    document.getElementById('acceptBtn').disabled = false;
                    
                    // Feedback visual
                    this.classList.add('animate-pulse');
                    setTimeout(() => {
                        this.classList.remove('animate-pulse');
                    }, 300);
                }, {passive: true});
            });

            // Habilitar botón aceptar al seleccionar cualquier avatar (click o touch)
            document.querySelectorAll('input[name="avatar"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.getElementById('acceptBtn').disabled = false;
                });
            });

            document.getElementById('randomAvatarBtn').addEventListener('click', () => {
                const visibleRadios = avatars
                    .filter(el => !el.classList.contains('hidden'))
                    .map(el => el.querySelector('input[type="radio"]'));
                
                if (visibleRadios.length > 0) {
                    const randomIndex = Math.floor(Math.random() * visibleRadios.length);
                    const randomRadio = visibleRadios[randomIndex];
                    randomRadio.checked = true;
                    
                    // Efecto visual mejorado
                    const randomAvatar = randomRadio.closest('.avatar-item');
                    randomAvatar.classList.add('animate-pulse');
                    setTimeout(() => {
                        randomAvatar.classList.remove('animate-pulse');
                    }, 500);
                    
                    document.getElementById('acceptBtn').disabled = false;
                }
            });

            // Crear partículas optimizadas
            function createParticles() {
                const container = document.getElementById('particles-js');
                const particleCount = window.innerWidth < 768 ? 15 : 25;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');
                    
                    // Posición aleatoria
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    
                    // Tamaño aleatorio (más pequeño en móvil)
                    const size = window.innerWidth < 768 ? 
                        Math.random() * 3 + 1 : 
                        Math.random() * 5 + 2;
                    
                    // Opacidad aleatoria
                    const opacity = Math.random() * 0.5 + 0.1;
                    
                    // Tiempo de animación aleatorio
                    const duration = Math.random() * 15 + 10;
                    const delay = Math.random() * -20;
                    
                    // Aplicar estilos
                    particle.style.left = `${posX}%`;
                    particle.style.top = `${posY}%`;
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.opacity = opacity;
                    particle.style.animation = `float ${duration}s linear ${delay}s infinite`;
                    
                    container.appendChild(particle);
                }
            }

            // Inicializar
            renderPage();
            createParticles();

            // Mejorar rendimiento en móvil
            if ('ontouchstart' in window) {
                document.documentElement.style.touchAction = 'manipulation';
            }
        });
    </script>
</body>

</html>