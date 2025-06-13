<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - MovieHub</title>
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
            body { 
                background-image: url('/images/backgrounds/FondoMovil.png');
                padding: 20px 0;
            }
        }
    </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen relative py-4 md:py-8">

    <!-- Canvas para animación de burbujas -->
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <!-- Contenedor principal - Tamaño optimizado -->
    <div class="relative z-10 w-full max-w-xl bg-gray-900/90 backdrop-blur-sm rounded-xl shadow-2xl p-6 md:p-8 border border-yellow-600/50 mx-4 my-4 flex flex-col justify-between" style="max-height: 95vh; min-height: 80vh;">

        <!-- Logo y título - Ajustado para móvil -->
        <div class="flex flex-col items-center mb-4 md:mb-6">
            <div class="flex items-center mb-3 md:mb-4">
                <div class="p-2 bg-yellow-600 rounded-lg mr-2">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="text-lg md:text-xl font-bold text-white">
                    Movie<span class="text-yellow-400">Hub</span>
                </span>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-yellow-400 text-center">Editar Perfil</h2>
        </div>

        @if (session('status') === 'profile-updated')
        <div class="mb-3 md:mb-4 bg-yellow-600/80 text-white text-center p-2 rounded-md text-xs md:text-sm">
            Perfil actualizado con éxito.
        </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-3 md:space-y-4 flex-1 flex flex-col justify-between" id="profileForm">
            @csrf
            @method('PATCH')

            <!-- Nombre y Email en dos columnas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                <div>
                    <label class="block text-xs md:text-sm text-yellow-300 mb-1 md:mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
                        class="w-full px-3 py-2 text-xs md:text-sm bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500"
                        placeholder="Tu nombre">
                    @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs md:text-sm text-yellow-300 mb-1 md:mb-2">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                        class="w-full px-3 py-2 text-xs md:text-sm bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500"
                        placeholder="correo@ejemplo.com">
                    @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Avatar -->
            <div>
                <label class="block text-xs md:text-sm text-yellow-300 mb-1 md:mb-2">Foto de Perfil</label>
                <div class="flex items-center space-x-3 md:space-x-4">
                    @if (auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border border-yellow-500/50">
                    @else
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gray-700 flex items-center justify-center border border-yellow-500/50">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    @endif
                    <div class="flex-1">
                        <input type="file" name="avatar" id="avatar" accept="image/*"
                            class="w-full text-white text-xs md:text-sm bg-gray-800/70 border border-gray-700 rounded cursor-pointer file:mr-2 md:file:mr-4 file:py-1 file:px-2 md:file:px-4 file:rounded file:border-0 file:text-xs md:file:text-sm file:font-semibold file:bg-yellow-500/80 file:text-gray-900 hover:file:bg-yellow-500">
                    </div>
                </div>
                @error('avatar')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña actual -->
            <div class="pt-1 md:pt-2">
                <label class="block text-xs md:text-sm text-yellow-300 mb-1 md:mb-2">Contraseña actual</label>
                <div class="relative">
                    <input type="password" name="current_password" id="current_password"
                        class="w-full px-3 py-2 pr-8 text-xs md:text-sm bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500"
                        placeholder="••••••••" autocomplete="current-password">
                    <button type="button"
                        onclick="togglePassword('current_password', this)"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('current_password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
                @if(session('password_error'))
                <p class="text-red-400 text-xs mt-1">{{ session('password_error') }}</p>
                @endif
                <p class="text-gray-400 text-xxs md:text-xs mt-1">Solo necesaria si cambias el email o la contraseña</p>
            </div>

            <!-- Nueva contraseña y confirmación -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                <div>
                    <label class="block text-xs md:text-sm text-yellow-300 mb-1 md:mb-2">Nueva contraseña</label>
                    <div class="relative">
                        <input type="password" name="new_password" id="new_password"
                            class="w-full px-3 py-2 pr-8 text-xs md:text-sm bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500"
                            placeholder="••••••••" autocomplete="new-password">
                        <button type="button"
                            onclick="togglePassword('new_password', this)"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('new_password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs md:text-sm text-yellow-300 mb-1 md:mb-2">Confirmar nueva</label>
                    <div class="relative">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="w-full px-3 py-2 pr-8 text-xs md:text-sm bg-gray-800/70 rounded border border-gray-700 text-white placeholder-gray-500"
                            placeholder="••••••••" autocomplete="new-password">
                        <button type="button"
                            onclick="togglePassword('new_password_confirmation', this)"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <p id="passwordMatchError" class="text-red-400 text-xs mt-1 hidden">Las contraseñas no coinciden.</p>
                </div>
            </div>

            <!-- Botón de guardar -->
            <div class="pt-3 md:pt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-bold py-2 text-sm rounded-lg transition transform hover:scale-105 flex justify-center items-center">
                    Guardar Cambios
                </button>
            </div>
        </form>

        <!-- Acciones abajo SIEMPRE dentro de la caja -->
        <div class="flex flex-col md:flex-row items-center justify-between mt-4 md:mt-6 gap-2 w-full">
            <button type="button" onclick="showDeleteModal()" class="text-red-400 hover:text-red-300 text-xs md:text-sm font-semibold transition">
                Eliminar mi cuenta
            </button>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-xs md:text-sm text-yellow-400 hover:underline transition">
                <svg class="w-3 h-3 md:w-4 md:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver al Dashboard
            </a>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden px-4">
        <div class="bg-gray-900/95 backdrop-blur-sm rounded-xl p-4 md:p-6 max-w-sm w-full border border-red-600/50 shadow-2xl text-center">
            <h2 class="text-lg md:text-xl font-bold text-red-400 mb-2 md:mb-3">¿Eliminar cuenta?</h2>
            <p class="text-gray-300 mb-4 md:mb-5 text-xs md:text-sm">Esta acción eliminará permanentemente tu cuenta y todos tus datos. ¿Estás seguro?</p>
            <div class="flex justify-center space-x-3 md:space-x-4">
                <button onclick="hideDeleteModal()" class="px-3 py-1 md:px-4 md:py-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-white text-xs md:text-sm font-semibold transition">
                    Cancelar
                </button>
                <form id="delete-account-form" action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 md:px-4 md:py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs md:text-sm font-semibold transition">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Mostrar/ocultar modal
        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Toggle password visibility
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5 text-yellow-400">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.055 10.055 0 012.155-3.411m3.168-2.494A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.06 10.06 0 01-4.522 5.927M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                `;
            } else {
                input.type = 'password';
                btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                `;
            }
        }

        // Validación de contraseñas
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            const currentPass = document.getElementById('current_password').value;
            const newPass = document.getElementById('new_password').value;
            const confirmPass = document.getElementById('new_password_confirmation').value;
            const errorMsg = document.getElementById('passwordMatchError');

            // Validar si se cambia la contraseña
            if (newPass || confirmPass) {
                if (!currentPass) {
                    errorMsg.textContent = 'Debes ingresar tu contraseña actual para realizar cambios';
                    errorMsg.classList.remove('hidden');
                    e.preventDefault();
                    return;
                }
                
                if (newPass !== confirmPass) {
                    errorMsg.textContent = 'Las nuevas contraseñas no coinciden';
                    errorMsg.classList.remove('hidden');
                    e.preventDefault();
                    return;
                }
            }
            
            errorMsg.classList.add('hidden');
        });

        // Animación de burbujas
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

            for (let i = 0; i < 25; i++) {
                bubbles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    radius: Math.random() * 8 + 4,
                    speed: Math.random() * 0.8 + 0.3,
                    opacity: Math.random() * 0.2 + 0.1
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
    </script>
</body>
</html>