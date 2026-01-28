@extends('master')

@section('title', 'Modifica Record')

@section('content')
<div class="max-w-3xl mx-auto">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('pagine.cerca-dati') }}" class="bg-white border border-gray-200 text-gray-400 p-2 rounded-lg hover:text-teal-500 hover:border-teal-500 transition shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Modifica Account</h1>
            <p class="text-gray-500 text-sm">Aggiornamento delle informazioni per il record <span class="font-mono font-bold text-teal-600">#{{ $account->id }}</span></p>
        </div>
    </div>

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="h-2 bg-gradient-to-r from-amber-400 to-orange-500"></div>

        <div class="p-10">
            <form action="{{ route('pagine.aggiorna-dati', $account->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') 
                
                <div class="group">
                    <label for="nome" class="block text-sm font-bold text-gray-700 mb-2 transition group-focus-within:text-teal-600">
                        <i class="fas fa-user mr-2 text-gray-300 group-focus-within:text-teal-400"></i> Nome Completo
                    </label>
                    <input type="text" name="nome" id="nome" required
                        placeholder="Inserisci il nome" 
                        class="w-full border-2 border-gray-100 p-4 rounded-2xl focus:border-teal-500 focus:ring-0 transition-all outline-none bg-gray-50 focus:bg-white text-gray-700 shadow-sm"
                        value="{{ old('nome', $account->nome) }}">
                    @error('nome')
                        <p class="text-red-500 text-xs mt-2 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 transition group-focus-within:text-teal-600">
                        <i class="fas fa-envelope mr-2 text-gray-300 group-focus-within:text-teal-400"></i> Indirizzo Email
                    </label>
                    <input type="email" name="email" id="email" required
                        placeholder="email@esempio.it" 
                        class="w-full border-2 border-gray-100 p-4 rounded-2xl focus:border-teal-500 focus:ring-0 transition-all outline-none bg-gray-50 focus:bg-white text-gray-700 shadow-sm"
                        value="{{ old('email', $account->email) }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-gray-50 p-4 rounded-2xl flex gap-3 items-center border border-gray-100">
                    <i class="fas fa-history text-gray-400"></i>
                    <p class="text-xs text-gray-500">
                        Ultima modifica registrata: <span class="font-bold">{{ $account->updated_at->format('d/m/Y H:i') }}</span>
                    </p>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="flex-1 bg-gray-900 hover:bg-teal-600 text-white font-black py-4 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-teal-200 uppercase tracking-widest flex justify-center items-center gap-3 group">
                        <i class="fas fa-save"></i>
                        <span>Aggiorna Dati</span>
                    </button>
                    
                    <a href="{{ route('pagine.cerca-dati') }}" class="flex-1 bg-white border-2 border-gray-100 text-gray-400 hover:text-gray-600 hover:border-gray-300 font-bold py-4 rounded-2xl transition-all text-center uppercase tracking-widest text-sm flex items-center justify-center">
                        Annulla
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection