@extends('guest.master-log')

@section('content-guest')
    <div class="relative flex min-h-screen items-center justify-center py-12 px-4">
    <div class="absolute top-6 left-6">
        <a href="{{ route('guest.home') }}" class="flex items-center gap-2 text-sm text-muted-foreground hover:text-primary transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            <span class="hidden sm:inline">Torna alla home</span>
        </a>
    </div>

    <div class="w-full max-w-[550px]"> 
        <signup-page 
            register-post-url="{{ route('registrati.post') }}" 
            csrf-token="{{ csrf_token() }}"
            login-post-url="{{ route('login') }}"
        >
        </signup-page>
    </div>
</div>
@endsection