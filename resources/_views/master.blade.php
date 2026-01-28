<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        
        {{-- MOSTRA SIDEBAR SOLO SE L'UTENTE È AUTENTICATO --}}
        @auth
            @include('partials.aside')
        @endauth

        {{-- AREA CONTENUTO --}}
        <div class="flex-1 flex flex-col min-w-0 bg-gray-100 overflow-y-auto">
            
            {{-- SE L'UTENTE NON È LOGGATO (es. Login), CENTRA IL CONTENUTO --}}
            @guest
                <main class="flex-1 flex items-center justify-center p-4">
                    @yield('content')
                </main>
            @endguest

            {{-- SE L'UTENTE È LOGGATO, USA IL LAYOUT STANDARD --}}
            @auth
                <header class="bg-white shadow-sm h-16 flex items-center px-8 justify-between z-10">
                    <h2 class="text-lg font-medium text-gray-600 uppercase tracking-wider">
                        @yield('title', 'Dashboard')
                    </h2>
                </header>

                <main class="flex-1 p-8">
                    @yield('content')
                </main>
            @endauth
            
        </div>
    </div>

</body>
</html>