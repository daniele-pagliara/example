@extends('master')

@section('content')
<div class="w-full max-w-md bg-white shadow-2xl rounded-3xl overflow-hidden">
    <div class="bg-gray-800 p-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-700 rounded-full mb-4 shadow-inner">
            <span class="text-3xl">🔐</span>
        </div>
        <h1 class="text-2xl font-bold text-white">Area Riservata</h1>
        <p class="text-gray-400 text-sm italic">Inserisci le tue credenziali</p>
    </div>

    <div class="p-8">
        {{-- BLOCCO MESSAGGI DI ERRORE (Throttling e Credenziali) --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl">
                <div class="flex items-center mb-1">
                    <span class="text-red-600 mr-2">⚠️</span>
                    <strong class="text-red-800 text-sm">Attenzione</strong>
                </div>
                <ul class="text-xs text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- MESSAGGIO DI SUCCESSO (Post Reset Password) --}}
        @if (session('successo'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl">
                <div class="flex items-center">
                    <span class="text-green-600 mr-2">✅</span>
                    <p class="text-xs text-green-700 font-semibold">{{ session('successo') }}</p>
                </div>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="email" class="text-sm font-semibold text-gray-700 mb-1">Indirizzo Email</label>
                <input type="email" name="email" id="email"
                    placeholder="nome@esempio.com"
                    value="{{ old('email') }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-800 focus:border-gray-800 outline-none transition">
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password"
                    placeholder="••••••••"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-800 focus:border-gray-800 outline-none transition">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="inline-flex cursor-pointer text-gray-600 select-none">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 mr-2 rounded border-gray-300 text-gray-800 focus:ring-gray-800 cursor-pointer shrink-0">
                    <span class="leading-none ">Ricordami</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-gray-500 hover:text-gray-800 transition leading-none">Password dimenticata?</a>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-gray-800 hover:bg-black text-white font-bold py-4 rounded-2xl shadow-lg transition duration-300 transform hover:-translate-y-1">
                    ACCEDI ORA
                </button>
            </div>
        </form>
    </div>

    <div class="bg-gray-50 p-6 text-center border-t border-gray-100">
        <p class="text-sm text-gray-600">
            Non hai un account?
            <a href="{{ route('registrati') }}" class="text-gray-800 font-bold hover:underline">Registrati</a>
        </p>
    </div>
</div>
@endsection