<header class="bg-teal-600 text-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        {{-- Logo o Titolo con link alla Home --}}
        <a href="{{ Auth::check() ? route('pagine.home') : url('/') }}" class="hover:opacity-80 transition">
            <h1 class="font-bold text-xl flex items-center gap-2">
                <span>🚀</span> Laravel App
            </h1>
        </a>

        <nav>
            <ul class="flex items-center gap-6">
                @auth
                    {{-- Link di navigazione visibili solo se loggati --}}
                    <li><a href="{{ route('pagine.home') }}" class="text-sm hover:underline decoration-2 underline-offset-4">Home</a></li>
                    <li><a href="{{ route('pagine.cerca-dati') }}" class="text-sm hover:underline decoration-2 underline-offset-4">Cerca</a></li>
                    <li><a href="{{ route('pagine.invia-dati') }}" class="text-sm hover:underline decoration-2 underline-offset-4">Inserisci</a></li>

                    <div class="flex items-center gap-4 ml-4 pl-4 border-l border-teal-500">
                        <span class="text-sm text-teal-100 italic">Ciao, <strong>{{ Auth::user()->name }}</strong></span>

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-2 px-4 rounded-lg transition duration-300 shadow-md">
                                LOGOUT
                            </button>
                        </form>
                    </div>
                @endauth

                @guest
                    {{-- Link visibili solo per i visitatori --}}
                    <li>
                        <a href="{{ route('registrati') }}" 
                           class="bg-white text-teal-600 text-xs font-bold py-2 px-4 rounded-lg hover:bg-teal-50 transition shadow-md">
                            REGISTRATI
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>