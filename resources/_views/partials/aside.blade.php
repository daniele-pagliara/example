<aside class="w-64 bg-gray-900 text-white flex flex-col shadow-xl flex-shrink-0">
    <div class="p-6 text-2xl font-bold border-b border-gray-800 flex items-center gap-2">
        <span class="text-teal-400">🚀</span> Laravel App
    </div>

    <nav class="flex-1 overflow-y-auto py-4">
        <div class="px-4 mb-2 text-xs font-semibold text-gray-500 uppercase">Menu Principale</div>

        <a href="{{ route('pagine.home') }}" class="flex items-center gap-3 px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('pagine.home') ? 'bg-teal-600 border-r-4 border-teal-400' : '' }}">
            <i class="fas fa-home w-5"></i> Home
        </a>

        <a href="{{ route('pagine.cerca-dati') }}" class="flex items-center gap-3 px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('pagine.cerca-dati') ? 'bg-teal-600' : '' }}">
            <i class="fas fa-database w-5"></i> Database Centrale
        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-gray-800 transition">
            <i class="fas fa-chart-line w-5"></i> Statistiche
        </a>

        <div class="px-4 mt-6 mb-2 text-xs font-semibold text-gray-500 uppercase">Gestione</div>

        <a href="{{ route('pagine.invia-dati') }}" class="flex items-center gap-3 px-6 py-3 hover:bg-gray-800 transition">
            <i class="fas fa-plus-circle w-5"></i> Inserisci Dati
        </a>
    </nav>

    <div class="p-4 border-t border-gray-800 bg-gray-900">
    @auth
    <div class="flex items-center gap-3 mb-4 px-2">
        <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center font-bold text-white">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        
        <div class="text-sm">
            <p class="font-bold leading-none text-white">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white text-xs py-2 rounded-lg transition font-bold">
            LOGOUT
        </button>
    </form>
    @endauth
</div>
</aside>