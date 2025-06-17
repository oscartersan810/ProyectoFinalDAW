<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Montserrat', Arial, sans-serif;
        }

        body { background-image: url('/images/backgrounds/FondoEscritorio.png'); }

        @media (max-width: 1024px) {
            body { background-image: url('/images/backgrounds/FondoTablet.png'); }
        }

        @media (max-width: 768px) {
            body { background-image: url('/images/backgrounds/FondoMovil.png'); }
        }
    </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen overflow-auto relative">

    <!-- Canvas para animación de burbujas -->
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <!-- Formulario de registro -->
    <div class="relative z-10 w-full max-w-md bg-gray-900/90 backdrop-blur-sm rounded-xl shadow-2xl p-4 md:p-8 border border-yellow-600/50 overflow-auto">
        
        <!-- Logo y título -->
        <div class="flex flex-col items-center mb-6 md:mb-8">
            <div class="flex items-center mb-4">
                <div class="p-2 bg-yellow-600 rounded-lg mr-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="text-xl md:text-2xl font-bold text-white">
                    Movie<span class="text-yellow-400">Hub</span>
                </span>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-yellow-400 text-center">Crea tu cuenta</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5 md:space-y-6">
            @csrf

            <!-- Nombre -->
            <div>
                <label class="block text-sm text-yellow-300 mb-2">Nombre de usuario</label>
                <input type="text" name="name" required
                    class="w-full px-3 py-2 bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500 text-sm"
                    placeholder="Nombre de usuario" value="{{ old('name') }}">
                @error('name')
                <p class="text-red-400 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm text-yellow-300 mb-2">Correo electrónico</label>
                <input type="email" name="email" required
                    class="w-full px-3 py-2 bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500 text-sm"
                    placeholder="correo@ejemplo.com" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-400 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div>
                <label class="block text-sm text-yellow-300 mb-2">Contraseña</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 pr-10 bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500 text-sm"
                        placeholder="••••••••"
                        pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z]).{8,}$"
                        title="Mínimo 8 caracteres, una mayúscula, una letra y un número">
                    <button type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-1">
                    Mínimo 8 caracteres, una mayúscula, una letra y un número.
                </p>
                <p id="passwordError" class="text-red-400 text-xs mt-1 hidden"></p>
            </div>

            <!-- Confirmar Contraseña -->
            <div>
                <label class="block text-sm text-yellow-300 mb-2">Confirmar contraseña</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-3 py-2 pr-10 bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500 text-sm"
                        placeholder="••••••••">
                    <button type="button"
                        onclick="togglePassword('password_confirmation', this)"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Botón -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-bold py-2 rounded-lg transition transform hover:scale-105 flex justify-center items-center">
                Registrarse
            </button>

            <div class="text-center text-sm text-gray-400">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-yellow-400 hover:underline">Inicia sesión</a>
            </div>
        </form>
    </div>

    <!-- Animación burbujas -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const canvas = document.querySelector('canvas');
            const ctx = canvas.getContext('2d');
            const bubbles = [];
            
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
                bubbles.forEach(b => {
                    ctx.beginPath();
                    ctx.arc(b.x, b.y, b.radius, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(255,215,0,${b.opacity})`;
                    ctx.fill();
                    b.y -= b.speed;
                    if (b.y < -b.radius) {
                        b.y = canvas.height + b.radius;
                        b.x = Math.random() * canvas.width;
                    }
                });
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

        // Validación extra de contraseña en el cliente
        document.querySelector('form').addEventListener('submit', function(e) {
            const pass = document.getElementById('password').value;
            const error = document.getElementById('passwordError');
            const regex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z]).{8,}$/;
            if (!regex.test(pass)) {
                error.textContent = 'La contraseña debe tener mínimo 8 caracteres, una mayúscula, una letra y un número.';
                error.classList.remove('hidden');
                e.preventDefault();
            } else {
                error.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
