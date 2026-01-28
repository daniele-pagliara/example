<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master-Guest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div id="app" login-url="{{ route('login') }}" register-url="{{ route('registrati') }}">
        @include('guest.partials.header-guest')
        @yield('content-guest')
        @include('guest.partials.footer-guest')

    </div>

</body>

</html>