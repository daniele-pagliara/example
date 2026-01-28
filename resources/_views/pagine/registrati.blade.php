@extends('master')

@section('content')
<div class="w-full max-w-md bg-white shadow-2xl rounded-3xl overflow-hidden my-10">
    <div class="bg-gray-800 p-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-700 rounded-full mb-4 shadow-inner">
            <span class="text-3xl">📝</span>
        </div>
        <h1 class="text-2xl font-bold text-white">Crea Account</h1>
        <p class="text-gray-400 text-sm italic">Unisciti alla nostra piattaforma</p>
    </div>

    <div class="p-8">
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registrati.post') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="flex flex-col">
                <label for="name" class="text-sm font-semibold text-gray-700 mb-1">Nome Completo</label>
                <input type="text" name="name" id="name" placeholder="Mario Rossi" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-800 focus:border-gray-800 outline-none transition">
            </div>

            <div class="flex flex-col">
                <label for="email" class="text-sm font-semibold text-gray-700 mb-1">Indirizzo Email</label>
                <input type="email" name="email" id="email" placeholder="nome@esempio.com" value="{{ old('email') }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-800 focus:border-gray-800 outline-none transition">
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" placeholder="Minimo 8 caratteri" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-800 focus:border-gray-800 outline-none transition">
            </div>

            <div class="flex flex-col">
                <label for="password_confirmation" class="text-sm font-semibold text-gray-700 mb-1">Conferma Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ripeti password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-800 focus:border-gray-800 outline-none transition">
            </div>

            <div class="pt-2">
                <button type="submit" 
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-4 rounded-2xl shadow-lg transition duration-300 transform hover:-translate-y-1 uppercase tracking-wider">
                    Registrati Adesso
                </button>
            </div>
        </form>
    </div>

    <div class="bg-gray-50 p-6 text-center border-t border-gray-100">
        <p class="text-sm text-gray-600">
            Hai già un account? 
            <a href="{{ route('login') }}" class="text-gray-800 font-bold hover:underline">Accedi qui</a>
        </p>
    </div>
</div>
@endsection