<header-user 
    dashboard-url="{{ route('pagine.home') }}" 
    database-url="{{ route('pagine.cerca-dati') }}"
    home-url="{{ url('/') }}"
    logout-url="{{ route('logout') }}"
    csrf-token="{{ csrf_token() }}">
</header-user>