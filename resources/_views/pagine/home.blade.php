@extends('master')

@section('title', 'Dashboard Panoramica')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-teal-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Utenti Totali</p>
                    <p class="text-2xl font-black text-gray-800">1,284</p>
                </div>
                <div class="text-teal-500 bg-teal-50 p-3 rounded-lg">
                    <i class="fas fa-users fa-lg"></i>
                </div>
            </div>
            <p class="text-xs text-green-500 mt-4 font-bold"><i class="fas fa-arrow-up"></i> +12% rispetto al mese scorso</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Record Salvati</p>
                    <p class="text-2xl font-black text-gray-800">45,012</p>
                </div>
                <div class="text-blue-500 bg-blue-50 p-3 rounded-lg">
                    <i class="fas fa-database fa-lg"></i>
                </div>
            </div>
            <p class="text-xs text-blue-500 mt-4 font-bold">Aggiornato 5 min fa</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Tempo Risposta</p>
                    <p class="text-2xl font-black text-gray-800">120ms</p>
                </div>
                <div class="text-purple-500 bg-purple-50 p-3 rounded-lg">
                    <i class="fas fa-bolt fa-lg"></i>
                </div>
            </div>
            <div class="w-full bg-gray-200 h-1.5 mt-4 rounded-full">
                <div class="bg-purple-500 h-1.5 rounded-full" style="width: 85%"></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Errori Sistema</p>
                    <p class="text-2xl font-black text-gray-800">0</p>
                </div>
                <div class="text-red-500 bg-red-50 p-3 rounded-lg">
                    <i class="fas fa-exclamation-triangle fa-lg"></i>
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-4 italic">Nessun errore rilevato nelle ultime 24h</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
    <h3 class="text-lg font-bold text-gray-800 mb-4 italic">Attività Recente (Fittizia)</h3>
    
    <div class="flex items-end justify-between h-48 gap-2">
        <div class="bg-teal-400 w-full rounded-t" style="height: 40%"></div>
        <div class="bg-teal-500 w-full rounded-t" style="height: 60%"></div>
        <div class="bg-teal-600 w-full rounded-t" style="height: 80%"></div>
        <div class="bg-teal-400 w-full rounded-t" style="height: 35%"></div>
        <div class="bg-teal-500 w-full rounded-t" style="height: 90%"></div>
        <div class="bg-teal-300 w-full rounded-t" style="height: 55%"></div>
        <div class="bg-teal-600 w-full rounded-t" style="height: 75%"></div>
    </div>

    <div class="flex justify-between mt-2 text-[10px] text-gray-400 font-bold uppercase gap-2">
        <span class="w-full text-center">Lun</span>
        <span class="w-full text-center">Mar</span>
        <span class="w-full text-center">Mer</span>
        <span class="w-full text-center">Gio</span>
        <span class="w-full text-center">Ven</span>
        <span class="w-full text-center">Sab</span>
        <span class="w-full text-center">Dom</span>
    </div>
</div>

        <div class="bg-gray-900 p-6 rounded-xl shadow-md text-white">
            <h3 class="text-lg font-bold mb-6">Azioni Rapide</h3>
            <div class="space-y-4">
                <a href="{{ route('pagine.invia-dati') }}" class="flex items-center gap-3 p-3 bg-gray-800 hover:bg-teal-600 rounded-lg transition group">
                    <div class="bg-teal-500 p-2 rounded text-white group-hover:bg-white group-hover:text-teal-600 transition">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span>Invia Nuovi Record</span>
                </a>
                <a href="{{ route('pagine.cerca-dati') }}" class="flex items-center gap-3 p-3 bg-gray-800 hover:bg-blue-600 rounded-lg transition group">
                    <div class="bg-blue-500 p-2 rounded text-white group-hover:bg-white group-hover:text-blue-600 transition">
                        <i class="fas fa-search"></i>
                    </div>
                    <span>Cerca nel Database</span>
                </a>
                <button class="w-full mt-4 border border-gray-700 py-3 rounded-lg hover:border-gray-400 transition text-sm font-bold uppercase tracking-widest">
                    Genera Report PDF
                </button>
            </div>
        </div>
    </div>
</div>
@endsection