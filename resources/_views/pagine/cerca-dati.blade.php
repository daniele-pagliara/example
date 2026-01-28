@extends('master')

@section('title', 'Gestione Database')

@section('content')
<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Lista Account Salvati</h1>
            <p class="text-gray-500 text-sm">Gestisci, modifica o monitora i record presenti nel database.</p>
        </div>
        <a href="{{ route('pagine.invia-dati') }}" class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-teal-200 transition-all flex items-center gap-2">
            <i class="fas fa-plus"></i> NUOVO ACCOUNT
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

        @if($accounts->isEmpty())
        <div class="text-center py-20 bg-gray-50">
            <div class="text-gray-300 mb-4">
                <i class="fas fa-folder-open fa-4x"></i>
            </div>
            <p class="text-gray-500 text-xl font-medium">Nessun dato trovato.</p>
            <p class="text-gray-400 text-sm mb-6">Il database è attualmente vuoto.</p>
            <a href="{{ route('pagine.invia-dati') }}" class="text-teal-600 font-bold border-b-2 border-teal-600 pb-1">
                Comincia ora inserendo il primo record
            </a>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 uppercase text-[11px] font-black tracking-widest border-b border-gray-100">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Informazioni Utente</th>
                        <th class="px-6 py-4">Data Inserimento</th>
                        <th class="px-6 py-4 text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($accounts as $account)
                    <tr class="hover:bg-teal-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-500 px-2 py-1 rounded text-xs font-mono font-bold group-hover:bg-white transition">
                                #{{ $account->id }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center font-bold text-xs">
                                    {{ strtoupper(substr($account->nome, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-gray-800 capitalize">{{ $account->nome }}</div>
                                    <div class="text-xs text-gray-400 italic">{{ $account->email }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600 font-medium">
                                <i class="far fa-calendar-alt mr-1 text-gray-300"></i>
                                {{ $account->created_at->format('d M, Y') }}
                            </div>
                            <div class="text-[10px] text-gray-400 ml-5">{{ $account->created_at->format('H:i') }}</div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('pagine.modifica-dati', $account->id) }}"
                                    class="bg-white border border-gray-200 text-gray-600 p-2 rounded-lg hover:text-teal-500 hover:border-teal-500 transition shadow-sm"
                                    title="Modifica">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST"
                                    onsubmit="return confirm('Sei sicuro di voler spostare questo account nel cestino?');"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-white border border-gray-200 text-gray-600 p-2 rounded-lg hover:text-red-500 hover:border-red-500 transition shadow-sm"
                                        title="Elimina">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-gray-50 px-8 py-4 flex justify-between items-center border-t border-gray-100">
            <div class="flex items-center gap-2 text-sm text-gray-500 font-medium">
                <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                Database connesso: <span class="text-gray-800">{{ $accounts->count() }} record totali</span>
            </div>
            <div class="flex gap-4">
                <button class="text-xs font-bold text-gray-400 hover:text-gray-600 transition uppercase tracking-widest">Esporta CSV</button>
                <button class="text-xs font-bold text-gray-400 hover:text-gray-600 transition uppercase tracking-widest">Stampa</button>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection