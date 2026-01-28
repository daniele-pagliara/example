<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master-user</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- @include('auth.partials.header-user') -->
        @yield('content-user')
        <!-- @include('auth.partials.footer-user') -->
    </div>
</body>
</html>