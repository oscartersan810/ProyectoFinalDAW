<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu correo - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');
        body {
            background: #1e1e1e;
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-gray-900 rounded-xl shadow-lg p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/moviehub-logo.png') }}" alt="Logo MovieHub" class="h-12">
            </a>
        </div>

        <h2 class="text-2xl font-bold text-green-300 text-center mb-4">Verifica tu dirección de correo electrónico</h2>

        <p class="text-sm text-gray-300 mb-6 text-center">
            Gracias por registrarte en MovieHub. Antes de continuar, por favor revisa tu correo electrónico y haz clic en el enlace de verificación.
            <br>Si no recibiste el correo, te podemos enviar otro.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-green-400 text-center font-semibold">
                Se ha enviado un nuevo enlace de verificación a tu correo.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}" class="flex flex-col space-y-4">
            @csrf

            <button type="submit"
                    class="w-full py-2 px-4 bg-green-400 hover:bg-green-500 text-black font-bold rounded-lg transition duration-300 transform hover:scale-105">
                Reenviar correo de verificación
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4 text-center">
            @csrf
            <button type="submit" class="text-sm text-red-400 hover:underline">
                Cerrar sesión
            </button>
        </form>
    </div>

</body>
</html>
