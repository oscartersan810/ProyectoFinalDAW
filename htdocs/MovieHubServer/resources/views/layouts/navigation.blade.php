<nav class="px-6 py-4 bg-gradient-to-b from-gray-900 to-gray-800 shadow-lg sticky top-0 z-50 border-b border-gray-700">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <!-- Logo - Mejorado con efecto hover -->
        <a href="{{ route('welcome') }}" class="group">
            <div class="flex items-center space-x-2">
                <div class="p-2 bg-yellow-600 rounded-lg group-hover:bg-yellow-700 transition duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white group-hover:text-yellow-300 transition duration-300">
                    Movie<span class="text-yellow-400">Hub</span>
                </span>
            </div>
        </a>

        <!-- Menú para móvil - Mejorado visualmente -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none p-2 rounded-lg hover:bg-gray-700 transition">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Navegación principal - Estilo mejorado -->
        <ul id="nav-links" class="hidden md:flex space-x-8 items-center">
            <li>
                <a href="{{ route('welcome') }}" class="text-gray-300 hover:text-yellow-400 transition duration-300 flex items-center py-2 px-3 rounded-lg hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Inicio
                </a>
            </li>
            
            <li>
                <a href="{{ route('explore') }}" class="text-gray-300 hover:text-yellow-400 transition duration-300 flex items-center py-2 px-3 rounded-lg hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Explorar
                </a>
            </li>
            
            <li>
                <a href="#acciones" class="text-gray-300 hover:text-yellow-400 transition duration-300 flex items-center py-2 px-3 rounded-lg hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    Top
                </a>
            </li>

            <!-- Menú desplegable de reseñas - Estilo mejorado -->
            <li class="relative group mr-8">
                <button class="text-gray-300 hover:text-yellow-400 transition duration-300 flex items-center py-2 px-3 rounded-lg hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    Reseñas
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="absolute left-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition duration-200 z-50 border border-gray-700">
                    <li><a href="{{ route('reviews.movies') }}" class="block px-4 py-3 hover:bg-gray-700 text-gray-300 hover:text-yellow-400 transition">Películas</a></li>
                    <li><a href="{{ route('reviews.series') }}" class="block px-4 py-3 hover:bg-gray-700 text-gray-300 hover:text-yellow-400 transition">Series</a></li>
                </ul>
            </li>

            <!-- Menú de usuario - Estilo mejorado -->
            @auth
                <li class="relative group ml-4">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <div class="relative">
                            <img src="{{ asset('storage/avatars/' . basename(Auth::user()->avatar)) }}" alt="avatar"
                                class="w-10 h-10 rounded-full object-cover border-2 border-yellow-500">
                            <div class="absolute -bottom-1 -right-1 bg-green-500 rounded-full w-3 h-3 border-2 border-gray-800"></div>
                        </div>
                    </button>
                    <ul class="absolute right-0 mt-2 w-56 bg-gray-800 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition duration-200 z-50 border border-gray-700">
                        <li class="border-b border-gray-700">
                            <div class="px-4 py-3">
                                <p class="text-sm text-white font-medium">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </li>
                        <li><a href="{{ route('dashboard') }}" class="block px-4 py-3 hover:bg-gray-700 text-gray-300 hover:text-yellow-400 transition flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Mi cuenta
                        </a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 hover:bg-gray-700 text-gray-300 hover:text-yellow-400 transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="ml-4">
                    <a href="{{ route('login') }}" class="text-white bg-yellow-600 hover:bg-yellow-700 px-4 py-2 rounded-lg transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                </li>
                <li class="ml-2">
                    <a href="{{ route('register') }}" class="text-white bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Registrarse
                    </a>
                </li>
            @endauth
        </ul>
    </div>

    <!-- Menú móvil - Estilo mejorado -->
    <div id="mobile-menu" class="md:hidden hidden bg-gray-800 rounded-lg mt-2 p-4 shadow-xl border border-gray-700">
        <ul class="space-y-3">
            <li>
                <a href="{{ route('welcome') }}" class="flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Inicio
                </a>
            </li>
            <li>
                <a href="{{ route('explore') }}" class="flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Explorar
                </a>
            </li>
            <li>
                <a href="#acciones" class="flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    Top
                </a>
            </li>
            <li class="pt-2 border-t border-gray-700">
                <p class="px-3 py-2 text-gray-400 uppercase text-xs font-bold">Reseñas</p>
                <ul class="pl-5 mt-1 space-y-2">
                    <li>
                        <a href="{{ route('reviews.movies') }}" class="flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                            </svg>
                            Películas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reviews.series') }}" class="flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Series
                        </a>
                    </li>
                </ul>
            </li>
            
            @auth
                <li class="pt-2 border-t border-gray-700">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                        <img src="{{ asset('storage/avatars/' . basename(Auth::user()->avatar)) }}" alt="Foto de perfil" class="w-8 h-8 rounded-full object-cover mr-3">
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            @else
                <li class="pt-2 border-t border-gray-700">
                    <a href="{{ route('login') }}" class="flex items-center justify-center px-3 py-2 rounded-lg bg-yellow-600 text-white hover:bg-yellow-700 transition mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Iniciar sesión
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="flex items-center justify-center px-3 py-2 rounded-lg bg-gray-700 text-white hover:bg-gray-600 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Registrarse
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>