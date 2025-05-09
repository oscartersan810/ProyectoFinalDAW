<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MovieHub') }}</title>

    <!-- Tailwind y AOS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

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

        /* Ajustes específicos para la selección de avatar */
        .avatar-container {
            background-color: rgba(255, 255, 255, 0.85); /* blanco semi-transparente */
            margin: 2rem;
            padding: 2rem;
            border-radius: 1rem;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .avatar-item {
            display: inline-block;
            cursor: pointer;
        }

        #prevPage, #nextPage, #randomAvatarBtn, #acceptBtn {
            margin-top: 1rem;
        }
    </style>

    <!-- Scripts de tu app -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>

<body class="text-white font-sans antialiased min-h-screen flex items-center justify-center">

    <div class="avatar-container">
        <h1 class="text-3xl font-bold mb-4 text-green-300">Selecciona tu Avatar</h1>

        <form method="POST" action="{{ route('select.avatar.store') }}" enctype="multipart/form-data">
    @csrf
    <div id="avatarContainer" class="grid grid-cols-3 sm:grid-cols-4 gap-4 mb-6">
        @foreach($avatars as $index => $avatar)
            <label class="cursor-pointer group avatar-item {{ $index >= 20 ? 'hidden' : '' }}">
                <input type="radio" name="avatar" value="{{ $avatar }}" class="sr-only peer">
                <img src="{{ asset($avatar) }}"
                     class="rounded-full border-4 border-transparent peer-checked:border-green-400 group-hover:scale-105 transition duration-200 w-24 h-24 mx-auto object-cover" />
            </label>
        @endforeach
    </div>

    <div class="flex justify-center gap-4 mb-6">
        <button type="button" id="prevPage" class="bg-gray-600 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded disabled:opacity-50" disabled>
            ← Anterior
        </button>
        <button type="button" id="nextPage" class="bg-gray-600 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded">
            Siguiente →
        </button>
    </div>

    <div class="flex justify-center gap-4">
        <button type="button" id="randomAvatarBtn"
                class="px-4 py-2 bg-yellow-400 text-black rounded hover:bg-yellow-500 transition font-bold">
            Seleccionar Aleatorio
        </button>
        <button type="submit" id="acceptBtn" disabled
                class="px-4 py-2 bg-green-400 text-black rounded hover:bg-green-500 transition font-bold disabled:opacity-50">
            Aceptar
        </button>
    </div>
</form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const avatars = Array.from(document.querySelectorAll('.avatar-item'));
            const perPage = 20;
            let currentPage = 0;

            const renderPage = () => {
                avatars.forEach((el, idx) => {
                    el.classList.toggle('hidden', idx < currentPage * perPage || idx >= (currentPage + 1) * perPage);
                });

                document.getElementById('prevPage').disabled = currentPage === 0;
                document.getElementById('nextPage').disabled = (currentPage + 1) * perPage >= avatars.length;
            };

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

            document.querySelectorAll('input[name="avatar"]').forEach(radio => {
                radio.addEventListener('change', () => {
                    document.getElementById('acceptBtn').disabled = false;
                });
            });

            document.getElementById('randomAvatarBtn').addEventListener('click', () => {
                const visibleRadios = avatars.filter(el => !el.classList.contains('hidden')).map(el => el.querySelector('input[type="radio"]'));
                if (visibleRadios.length > 0) {
                    const random = visibleRadios[Math.floor(Math.random() * visibleRadios.length)];
                    random.checked = true;
                    document.getElementById('acceptBtn').disabled = false;
                }
            });

            renderPage();
        });
    </script>
</body>

</html>
