<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda y Soporte - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: linear-gradient(135deg, #111827 0%, #1f2937 100%); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-6 px-2 bg-gray-900 text-white font-sans">
    <div class="w-full max-w-2xl bg-gray-800/90 rounded-xl shadow-lg p-6 md:p-10 border border-yellow-500/30 backdrop-blur">
        <div class="mb-6 flex flex-col items-center">
            <div class="flex items-center mb-2">
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
            <h1 class="text-2xl md:text-3xl font-bold text-yellow-400 text-center">Ayuda de la aplicación</h1>
        </div>
        <div class="space-y-6">
            <div>
                <h2 class="text-lg md:text-xl font-semibold text-yellow-300 mb-1">¿Cómo me registro en MovieHub?</h2>
                <p class="text-gray-200 text-sm md:text-base">
                    Haz clic en "Registrarse" en la página principal y completa el formulario con tus datos. Recibirás un correo de confirmación.
                </p>
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-semibold text-yellow-300 mb-1">¿Cómo inicio sesión?</h2>
                <p class="text-gray-200 text-sm md:text-base">
                    Pulsa en "Iniciar sesión" e introduce tu correo y contraseña. Si has olvidado tu contraseña, puedes restablecerla desde el enlace disponible.
                </p>
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-semibold text-yellow-300 mb-1">¿Cómo edito mi perfil?</h2>
                <p class="text-gray-200 text-sm md:text-base">
                    Accede a tu perfil desde el menú de usuario y pulsa en "Editar Perfil". Podrás cambiar tu nombre, correo, contraseña y foto de perfil.
                </p>
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-semibold text-yellow-300 mb-1">¿Cómo selecciono o cambio mi avatar?</h2>
                <p class="text-gray-200 text-sm md:text-base">
                    Puedes elegir tu avatar al registrarte o desde la edición de perfil. Haz clic en la imagen para seleccionarla y confirma tu elección.
                </p>
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-semibold text-yellow-300 mb-1">¿Cómo elimino mi cuenta?</h2>
                <p class="text-gray-200 text-sm md:text-base">
                    Desde la sección "Editar Perfil", encontrarás la opción "Eliminar mi cuenta". Recuerda que esta acción es irreversible.
                </p>
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-semibold text-yellow-300 mb-1">¿A quién puedo contactar si tengo problemas?</h2>
                <p class="text-gray-200 text-sm md:text-base">
                    Si tienes cualquier duda o incidencia, puedes escribirnos a <a href="mailto:soporte@moviehub.com" class="text-yellow-400 underline">soporte@moviehub.com</a>.
                </p>
            </div>
        </div>
        <div class="mt-8 text-center">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold rounded-lg shadow transition duration-200 transform hover:scale-105 text-sm md:text-base">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver al Dashboard
            </a>
        </div>
    </div>
</body>
</html>
