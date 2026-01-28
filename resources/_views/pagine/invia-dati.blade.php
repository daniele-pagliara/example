@extends('master')

@section('title', 'Nuovo Record')

@section('content')
<div class="max-w-3xl mx-auto">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('pagine.cerca-dati') }}" class="bg-white border border-gray-200 text-gray-400 p-2 rounded-lg hover:text-teal-500 hover:border-teal-500 transition shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Inserimento Dati</h1>
            <p class="text-gray-500 text-sm">Aggiungi un nuovo account al database centrale.</p>
        </div>
    </div>

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="h-2 bg-gradient-to-r from-teal-400 to-blue-500"></div>

        <div class="p-10">
            <form action="{{ route('test.post') }}" method="POST" class="space-y-6">
                @csrf 
                
                <div class="group">
                    <label for="nome" class="block text-sm font-bold text-gray-700 mb-2 transition group-focus-within:text-teal-600">
                        <i class="fas fa-user mr-2 text-gray-300 group-focus-within:text-teal-400"></i> Nome Completo
                    </label>
                    <input type="text" name="nome" id="nome" required
                        placeholder="Esempio: Mario Rossi" 
                        class="w-full border-2 border-gray-100 p-4 rounded-2xl focus:border-teal-500 focus:ring-0 transition-all outline-none bg-gray-50 focus:bg-white text-gray-700 shadow-sm"
                        value="{{ old('nome') }}">
                    @error('nome')
                        <p class="text-red-500 text-xs mt-2 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 transition group-focus-within:text-teal-600">
                        <i class="fas fa-envelope mr-2 text-gray-300 group-focus-within:text-teal-400"></i> Indirizzo Email
                    </label>
                    <input type="email" name="email" id="email" required
                        placeholder="mario.rossi@esempio.it" 
                        class="w-full border-2 border-gray-100 p-4 rounded-2xl focus:border-teal-500 focus:ring-0 transition-all outline-none bg-gray-50 focus:bg-white text-gray-700 shadow-sm"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-blue-50 p-4 rounded-2xl flex gap-3 items-start border border-blue-100">
                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                    <p class="text-xs text-blue-700 leading-relaxed">
                        I dati inseriti saranno visibili immediatamente nella sezione <strong>Lista Account</strong> e potranno essere modificati o cestinati in qualsiasi momento.
                    </p>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-gray-900 hover:bg-teal-600 text-white font-black py-4 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-teal-200 uppercase tracking-widest flex justify-center items-center gap-3 group">
                        <span>Salva nel Database</span>
                        <i class="fas fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <p class="text-center text-gray-400 text-xs mt-8 italic">
        <i class="fas fa-lock mr-1"></i> Connessione crittografata al database di test
    </p>
</div>
@endsection