<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - MovieHub</title>
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

    <!-- Contenedor del formulario -->
    <div class="relative z-10 w-full max-w-2xl bg-gray-900 rounded-xl shadow-lg p-10 space-y-6">
        <h1 class="text-3xl font-bold text-green-300 text-center">Editar Perfil</h1>

        @if (session('status') === 'profile-updated')
        <div class="bg-green-500 text-white text-center p-3 rounded-md">
            Perfil actualizado con éxito.
        </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-sm mb-1">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
            </div>

            <!-- Avatar -->
            <div>
                <label for="avatar" class="block text-sm mb-1">Foto de Perfil</label>
                <input type="file" name="avatar" id="avatar" accept="image/*"
                    class="w-full bg-gray-800 text-white border border-gray-700 p-2 rounded cursor-pointer">
                @if (auth()->user()->avatar)
                <div class="mt-4">
                    <p class="text-sm text-gray-400">Vista previa actual:</p>
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" class="w-24 h-24 rounded-full object-cover">

                </div>
                @endif
            </div>

            <!-- Botón -->
            <div class="text-center pt-4">
                <button type="submit"
                    class="w-full py-2 px-4 bg-green-400 hover:bg-green-500 text-black font-bold rounded-lg transition duration-300 transform hover:scale-105">
                    Guardar Cambios
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
