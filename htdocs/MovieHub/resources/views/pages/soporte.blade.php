@extends('layouts.app')

@section('content')
<section class="min-h-[70vh] flex items-center justify-center py-8 px-4 bg-gray-900 text-white font-sans relative overflow-hidden">
    <!-- Efecto de partículas -->
    <div class="absolute inset-0 z-0">
        <div class="particles"></div>
    </div>

    <div class="w-full h-full max-w-5xl bg-gray-800/90 rounded-xl shadow-lg p-6 md:p-10 border border-yellow-500/30 backdrop-blur-lg relative z-10 transform transition-all duration-300 hover:shadow-yellow-500/20 hover:border-yellow-500/50 flex flex-col">
        <!-- Logo y título con animación -->
        <div class="mb-8 flex flex-col items-center animate-fadeIn">
            <div class="flex items-center mb-3 transform transition-transform duration-300 hover:scale-105">
                <div class="p-2 bg-yellow-600 rounded-lg mr-2 shadow-md animate-pulse">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="text-xl md:text-2xl font-bold text-white">
                    Movie<span class="text-yellow-400">Hub</span>
                </span>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-yellow-400 text-center bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-yellow-600">
                Centro de Ayuda
            </h1>
            <p class="mt-2 text-gray-400 text-sm">¿Cómo podemos ayudarte hoy?</p>
        </div>

        <!-- Barra de búsqueda -->
        <div class="mb-6 relative animate-fadeIn">
            <input type="text" id="faq-search" placeholder="Buscar en preguntas frecuentes..." 
                   class="w-full px-4 py-3 bg-gray-900/70 border border-yellow-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all duration-300">
            <svg class="w-5 h-5 absolute right-3 top-3.5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- Categorías de ayuda -->
        <div class="flex flex-wrap gap-2 mb-6 animate-fadeIn">
            <button class="px-3 py-1 bg-yellow-600/20 text-yellow-300 rounded-full text-xs hover:bg-yellow-600/30 transition-all border border-yellow-500/20">
                Cuentas
            </button>
            <button class="px-3 py-1 bg-yellow-600/20 text-yellow-300 rounded-full text-xs hover:bg-yellow-600/30 transition-all border border-yellow-500/20">
                Perfil
            </button>
            <button class="px-3 py-1 bg-yellow-600/20 text-yellow-300 rounded-full text-xs hover:bg-yellow-600/30 transition-all border border-yellow-500/20">
                Suscripción
            </button>
            <button class="px-3 py-1 bg-yellow-600/20 text-yellow-300 rounded-full text-xs hover:bg-yellow-600/30 transition-all border border-yellow-500/20">
                Contenido
            </button>
            <button class="px-3 py-1 bg-yellow-600/20 text-yellow-300 rounded-full text-xs hover:bg-yellow-600/30 transition-all border border-yellow-500/20">
                Problemas técnicos
            </button>
        </div>

        <!-- FAQ con más preguntas -->
        <div class="space-y-4 animate-fadeIn" id="faq">
            <!-- Sección de Cuentas -->
            <h3 class="text-lg font-bold text-yellow-300 mt-6 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Cuentas y Registro
            </h3>
            
            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo me registro en MovieHub?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Para registrarte en MovieHub:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Haz clic en "Registrarse" en la esquina superior derecha</li>
                        <li>Completa el formulario con tus datos personales</li>
                        <li>¡Listo! Ya puedes disfrutar de MovieHub</li>
                    </ol>
                </div>
            </div>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo inicio sesión?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>¿Como iniciar sesión?:</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>Con tu correo y contraseña en la página de inicio de sesión</li>
                        <li>Si olvidaste tu contraseña, usa la opción "Recuperar contraseña"</li>
                    </ul>
                    <p class="mt-2 text-yellow-300">Problemas al iniciar sesión? <a href="mailto:adminmoviehub@gmail.com" class="underline">Contáctanos</a></p>
                </div>
            </div>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo recupero mi contraseña?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Sigue estos pasos para recuperar tu contraseña:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Ve a la página de inicio de sesión</li>
                        <li>Haz clic en "¿Olvidaste tu contraseña?"</li>
                        <li>Ingresa el correo asociado a tu cuenta</li>
                        <li>Sigue las instrucciones en el correo que recibirás</li>
                        <li>Crea una nueva contraseña segura</li>
                    </ol>
                    <p class="mt-2 text-yellow-300">Si no recibes el correo, revisa tu carpeta de spam o <a href="mailto:adminmoviehub@gmail.com" class="underline">contáctanos</a>.</p>
                </div>
            </div>

            <!-- Sección de Perfil -->
            <h3 class="text-lg font-bold text-yellow-300 mt-8 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg>
                Perfil y Configuración
            </h3>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo edito mi perfil?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Para editar tu perfil:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Haz clic en tu foto de perfil en la esquina superior derecha</li>
                        <li>Selecciona "Editar Perfil" en el menú desplegable</li>
                        <li>Modifica la información que desees cambiar</li>
                        <li>Haz clic en "Guardar Cambios"</li>
                    </ol>
                    <p class="mt-2 text-yellow-300">Puedes cambiar tu nombre, correo, contraseña y foto de perfil.</p>
                </div>
            </div>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo selecciono o cambio mi avatar?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Para cambiar tu avatar:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Ve a la sección de edición de perfil</li>
                        <li>Haz clic en tu avatar actual</li>
                        <li>Selecciona "Cambiar imagen"</li>
                        <li>Elige una imagen desde tu dispositivo</li>
                        <li>Ajusta la imagen si es necesario</li>
                        <li>Guarda los cambios</li>
                    </ol>
                    <p class="mt-2 text-yellow-300">Formatos soportados: JPG, PNG, GIF (máx. 5MB)</p>
                </div>
            </div>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo cambio mi correo electrónico?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Para cambiar tu correo electrónico:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Ve a "Editar Perfil"</li>
                        <li>Actualiza tu dirección de correo en el campo correspondiente</li>
                        <li>Ingresa tu contraseña actual para confirmar</li>
                        <li>Te enviaremos un correo de verificación a tu nueva dirección</li>
                        <li>Haz clic en el enlace de verificación</li>
                    </ol>
                    <p class="mt-2 text-yellow-300">Importante: Hasta que no verifiques el nuevo correo, seguirás usando el anterior.</p>
                </div>
            </div>

            <!-- Sección de Contenido -->
            <h3 class="text-lg font-bold text-yellow-300 mt-8 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                </svg>
                Contenido y Funcionalidades
            </h3>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo busco películas o series?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>MovieHub ofrece varias formas de buscar contenido:</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>Usa la barra de búsqueda en la parte superior</li>
                        <li>Explora por categorías en la página principal</li>
                        <li>Filtra por género, año o calificación</li>
                        <li>Consulta nuestras recomendaciones personalizadas</li>
                    </ul>
                    <p class="mt-2 text-yellow-300">¿No encuentras algo? <a href="mailto:adminmoviehub@gmail.com" class="underline">Sugiérenos contenido</a></p>
                </div>
            </div>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo añado películas o series a favoritos?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Para añadir contenido a tus favoritos:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Busca la película o serie que te interesa</li>
                        <li>Haz clic en el icono de corazón <svg class="inline w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg> junto al título</li>
                        <li>El corazón se pondrá rojo si está en favoritos</li>
                        <li>Puedes ver todos tus favoritos en tu perfil</li>
                    </ol>
                    <p class="mt-2 text-yellow-300">¡Así puedes guardar tus pelis y series preferidas para verlas después!</p>
                </div>
            </div>

            <!-- Sección de Reseñas -->
            <h3 class="text-lg font-bold text-yellow-300 mt-8 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                Reseñas y Valoraciones
            </h3>
            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo escribo una reseña?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Busca la película o serie que quieras reseñar</li>
                        <li>Haz clic en "Escribir Reseña"</li>
                        <li>Completa el formulario con tu valoración y comentario</li>
                        <li>Guarda tu reseña</li>
                    </ol>
                    <p class="mt-2 text-yellow-300">Solo puedes escribir reseñas si has iniciado sesión.</p>
                </div>
            </div>
            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo valoro una película o serie?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>En la ficha de la película o serie, selecciona la cantidad de estrellas que deseas dar</li>
                        <li>Puedes dejar solo la valoración o añadir también una reseña</li>
                        <li>Tu valoración se sumará al promedio de la comunidad</li>
                    </ol>
                </div>
            </div>

            <!-- Sección de Problemas -->
            <h3 class="text-lg font-bold text-yellow-300 mt-8 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                Problemas y Soluciones
            </h3>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿Cómo elimino mi cuenta?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Para eliminar tu cuenta permanentemente:</p>
                    <ol class="list-decimal pl-5 mt-2 space-y-1">
                        <li>Ve a la sección "Editar Perfil"</li>
                        <li>Desplázate hasta "Eliminar Cuenta"</li>
                        <li>Ingresa tu contraseña para confirmar</li>
                        <li>Lee la información sobre lo que implica</li>
                        <li>Confirma la eliminación</li>
                    </ol>
                    <div class="mt-3 p-3 bg-red-900/30 border border-red-700/50 rounded text-sm">
                        <p class="font-bold text-red-300">¡Advertencia!</p>
                        <p>Esta acción es irreversible. Perderás acceso a todos tus datos, listas y preferencias.</p>
                    </div>
                </div>
            </div>

            <div class="border border-yellow-600/30 rounded-lg overflow-hidden transition-all duration-300 hover:border-yellow-500/50">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-gray-800 hover:bg-yellow-900/20 transition-all duration-300 focus:outline-none faq-question group">
                    <span class="text-left text-yellow-300 font-semibold group-hover:text-yellow-200 transition-colors">¿A quién puedo contactar si tengo problemas?</span>
                    <svg class="w-5 h-5 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-4 py-3 bg-gray-900/80 text-gray-200 text-sm">
                    <p>Nuestro equipo de soporte está disponible para ayudarte:</p>
                    <div class="mt-3 space-y-2">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-yellow-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="font-semibold text-yellow-300">Correo electrónico:</p>
                                <a href="mailto:adminmoviehub@gmail.com" class="text-yellow-400 underline hover:text-yellow-300">adminmoviehub@gmail.com</a>
                                <p class="text-xs text-gray-400 mt-1">Respuesta en 24-48 horas</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-yellow-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <div>
                                <p class="font-semibold text-yellow-300">Chat en vivo (Aún no disponible):</p>
                                <p class="text-gray-300">Disponible en la app móvil</p>
                                <p class="text-xs text-gray-400 mt-1">Horario: 9am - 6pm (GMT-5)</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 p-3 bg-yellow-900/20 border border-yellow-700/30 rounded text-sm">
                        <p class="font-bold text-yellow-300">¡Importante!</p>
                        <p class="mt-1">Para reportes técnicos, incluye capturas de pantalla y detalles de tu dispositivo/navegador.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de contacto -->
        <div class="mt-8 flex justify-center animate-fadeIn">
            <a href="mailto:adminmoviehub@gmail.com" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg shadow transition duration-200 transform hover:scale-105 text-sm md:text-base">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contactar Soporte
            </a>
        </div>
    </div>
</section>

<style>
    /* Animaciones personalizadas */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    /* Efecto de partículas */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    
    .particles::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(circle at 20% 30%, rgba(255, 215, 0, 0.03) 0%, transparent 50%),
                          radial-gradient(circle at 80% 70%, rgba(255, 215, 0, 0.03) 0%, transparent 50%);
        animation: particleMove 20s linear infinite;
    }
    
    @keyframes particleMove {
        0% { transform: translate(0, 0); }
        50% { transform: translate(50px, 50px); }
        100% { transform: translate(0, 0); }
    }
    
    /* Transiciones para FAQ */
    .faq-answer {
        transition: all 0.3s ease-out;
        max-height: 0;
        overflow: hidden;
    }
    
    .faq-answer.active {
        max-height: 500px;
    }
    
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

<script>
    // Animación de preguntas frecuentes
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('svg');
            // Cerrar todas las demás respuestas
            document.querySelectorAll('.faq-answer').forEach(a => {
                if (a !== answer) {
                    a.classList.add('hidden');
                    const btnSvg = a.previousElementSibling.querySelector('svg');
                    if(btnSvg) btnSvg.classList.remove('rotate-180');
                    a.style.maxHeight = null;
                }
            });
            // Alternar la respuesta actual
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
            // Animación suave
            if (!answer.classList.contains('hidden')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
            } else {
                answer.style.maxHeight = null;
            }
        });
    });

    // Función de búsqueda
    document.getElementById('faq-search').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const questions = document.querySelectorAll('.faq-question');
        questions.forEach(question => {
            const questionText = question.textContent.toLowerCase();
            const answer = question.nextElementSibling;
            const container = question.parentElement;
            if (questionText.includes(searchTerm)) {
                container.style.display = 'block';
            } else if (answer.textContent.toLowerCase().includes(searchTerm)) {
                container.style.display = 'block';
                answer.classList.remove('hidden');
                question.querySelector('svg').classList.add('rotate-180');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            } else {
                container.style.display = 'none';
            }
        });
    });

    // Efecto hover en tarjetas
    const faqItems = document.querySelectorAll('#faq > div');
    faqItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.transform = 'translateY(-3px)';
            item.style.boxShadow = '0 10px 20px rgba(245, 158, 11, 0.1)';
        });
        item.addEventListener('mouseleave', () => {
            item.style.transform = '';
            item.style.boxShadow = '';
        });
    });

    // Fix: Evitar que los botones de categorías envíen el formulario o recarguen la página
    document.querySelectorAll('.flex.flex-wrap.gap-2.mb-6.animate-fadeIn button').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection