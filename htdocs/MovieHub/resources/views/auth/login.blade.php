<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fuentes
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet"> -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Montserrat', cursive, sans-serif;
        }

        body {
            background-image: url('/images/backgrounds/FondoEscritorio.png');
        }

        @media (max-width: 1024px) {
            body {
                background-image: url('/images/backgrounds/FondoTablet.png');
            }
        }

        @media (max-width: 768px) {
            body {
                background-image: url('/images/backgrounds/FondoMovil.png');
            }
        }
    </style>
</head>

<body class="text-white flex items-center justify-center min-h-screen overflow-auto relative">

    <!-- Fondo animado de burbujas -->
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <!-- Contenido del login -->
    <div class="relative z-10 w-full max-w-md bg-gray-900/90 backdrop-blur-sm rounded-xl shadow-2xl p-4 md:p-8 border border-yellow-600/50 overflow-auto">
        <!-- Logo y título -->
        <div class="flex flex-col items-center mb-6 md:mb-8">
            <div class="flex items-center mb-3 md:mb-4">
                <div class="p-2 bg-yellow-600 rounded-lg mr-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                </div>
                <span class="text-xl md:text-2xl font-bold text-white">
                    Movie<span class="text-yellow-400">Hub</span>
                </span>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-yellow-400 text-center">Inicia Sesión</h2>
        </div>

        @if (session('status'))
        <div class="mb-3 md:mb-4 text-yellow-400 text-xs md:text-sm text-center p-2 md:p-3 bg-yellow-900/50 rounded-lg">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5 md:space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-xs md:text-sm font-medium text-yellow-300 mb-2">Correo electrónico</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email" required autofocus
                        class="w-full pl-10 pr-4 py-2 md:py-3 bg-gray-800/70 text-white border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder-gray-500 text-xs md:text-sm"
                        placeholder="tucorreo@ejemplo.com">
                </div>
                @error('email')
                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password con ojito -->
            <div>
                <label for="password" class="block text-xs md:text-sm font-medium text-yellow-300 mb-2">Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password" required
                        class="w-full pl-10 pr-10 py-2 md:py-3 bg-gray-800/70 text-white border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder-gray-500 text-xs md:text-sm"
                        placeholder="••••••••">
                    <button type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                @enderror

                @if (Route::has('password.request'))
                <div class="text-right mt-2">
                    <a class="text-xs md:text-sm text-yellow-400 hover:text-yellow-300 hover:underline" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-yellow-600 focus:ring-yellow-400 border-gray-700 rounded bg-gray-800">
                <label for="remember" class="ml-2 block text-xs md:text-sm text-gray-300">Recuérdame</label>
            </div>

            <!-- Botón -->
            <div>
                <button type="submit"
                    class="w-full py-2 md:py-3 px-4 bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-bold rounded-lg transition duration-300 transform hover:scale-105 flex items-center justify-center space-x-2 text-sm md:text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Iniciar Sesión</span>
                </button>
            </div>

            <div class="text-center text-xs md:text-sm text-gray-400">
                ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-yellow-400 hover:text-yellow-300 hover:underline font-medium">Regístrate aquí</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Burbujas
            const canvas = document.querySelector('canvas');
            const ctx = canvas.getContext('2d');
            let bubbles = [];

            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();
            for (let i = 0; i < 30; i++) {
                bubbles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    radius: Math.random() * 10 + 5,
                    speed: Math.random() * 1 + 0.5,
                    opacity: Math.random() * 0.3 + 0.1
                });
            }

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (let b of bubbles) {
                    ctx.beginPath();
                    ctx.arc(b.x, b.y, b.radius, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(255,215,0,${b.opacity})`;
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

        // Toggle password visibility
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.055 10.055 0 012.155-3.411m3.168-2.494A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.06 10.06 0 01-4.522 5.927M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                `;
            } else {
                input.type = 'password';
                btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                `;
            }
        }
    </script>

</body>

</html>