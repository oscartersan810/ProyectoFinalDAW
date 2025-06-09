<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: repeat;
            background-position: center;
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
<body class="text-white flex items-center justify-center min-h-screen overflow-hidden relative">

    <!-- Fondo animado de burbujas -->
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <!-- Contenido del formulario -->
    <div class="relative z-10 w-full max-w-md bg-gray-900 rounded-xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-green-300 text-center mb-6">¿Olvidaste tu contraseña?</h2>

        <p class="mb-4 text-sm text-gray-400 text-center">
            No hay problema. Ingresa tu correo y te enviaremos un enlace para restablecerla.
        </p>

        <!-- Mensaje de estado de la sesión -->
        @if (session('status'))
            <div class="mb-4 text-green-500 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Correo electrónico</label>
                <input id="email" name="email" type="email" required autofocus
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón -->
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-green-400 hover:bg-green-500 text-black font-bold rounded-lg transition duration-300 transform hover:scale-105">
                    Enviar enlace de recuperación
                </button>
            </div>
        </form>
    </div>

    <!-- Script para burbujas -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
