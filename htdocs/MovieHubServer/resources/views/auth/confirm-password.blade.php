<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar contraseña - MovieHub</title>
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
            font-family: 'Orbitron', sans-serif;
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

    <!-- Canvas para animación -->
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <!-- Contenedor -->
    <div class="relative z-10 w-full max-w-md bg-gray-900 rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-green-300 text-center mb-6">Confirmar contraseña</h2>

        <p class="text-sm text-gray-300 mb-6 text-center">
            Esta es una zona segura de MovieHub. Por favor, confirma tu contraseña antes de continuar.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium mb-1">Contraseña</label>
                <input type="password" name="password" id="password" required autocomplete="current-password"
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="py-2 px-6 bg-green-400 hover:bg-green-500 text-black font-bold rounded-lg transition duration-300 transform hover:scale-105">
                    Confirmar
                </button>
            </div>
        </form>
    </div>

    <!-- Script de burbujas -->
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
