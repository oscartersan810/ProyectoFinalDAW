<!-- NAVBAR -->
<nav class="px-6 py-4 bg-gray-900 text-white">
        <div class="flex justify-between items-center">
            <a href="#bienvenida">
                <img src="/images/logo.png" alt="MovieHub Logo" class="h-16 md:h-20">
            </a>
            <div class="md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <ul id="nav-links" class="hidden md:flex space-x-6 text-base items-center">
                <li><a href="{{route('welcome')}}" class="hover:text-green-300 transition duration-300">Inicio</a></li>
                <li><a href="{{ route('explore') }}" class="hover:text-green-300 transition duration-300">Explorar</a></li>
                <li><a href="#acciones" class="hover:text-green-300 transition duration-300">Top Películas / Series</a></li>
                <li><a href="#valorada" class="hover:text-green-300 transition duration-300">Reseñas</a></li>

                @auth
                <li class="relative group">
                    <button class="focus:outline-none flex items-center space-x-2">
                        <img src="{{ asset('storage/avatars/' . basename(Auth::user()->avatar)) }}"
                            alt="avatar"
                            class="w-10 h-10 rounded-full object-cover border-2 border-green-300">
                    </button>
                    <ul class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition duration-200 z-50">
                        <li><a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Mi cuenta</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('login') }}" class="hover:text-green-300 transition duration-300">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-green-300 transition duration-300">Registrarse</a></li>
                @endauth
            </ul>
        </div>

        <!-- Menú móvil -->
        <ul id="mobile-menu" class="md:hidden hidden flex-col mt-4 space-y-2 text-base">
            <li><a href="#bienvenida" class="block hover:text-green-300">Inicio</a></li>
            <li><a href="#acerca" class="block hover:text-green-300">Explorar</a></li>
            <li><a href="#acciones" class="block hover:text-green-300">Top Películas / Series</a></li>
            <li><a href="#valorada" class="block hover:text-green-300">Reseñas</a></li>
            @auth
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:text-green-300 transition duration-300">
                    <img src="{{ asset('storage/avatars/' . basename(Auth::user()->avatar)) }}" alt="Foto de perfil" class="w-10 h-10 rounded-full object-cover inline">
                    <span>{{ Auth::user()->name }}</span>
                </a>
            </li>
            @else
            <li><a href="{{ route('login') }}" class="block hover:text-green-300">Login</a></li>
            <li><a href="{{ route('register') }}" class="block hover:text-green-300">Registrarse</a></li>
            @endauth
        </ul>
    </nav>