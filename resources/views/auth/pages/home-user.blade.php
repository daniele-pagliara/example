@extends('auth.master-user')
@section('content-user')
    <sidebar-provider>
        <dashboard-user 
            dashboard-url="{{ route('pagine.home') }}" 
            database-url="{{ route('pagine.cerca-dati') }}"
            home-url="{{ url('/') }}"
            logout-url="{{ route('logout') }}"
            csrf-token="{{ csrf_token() }}"
            :user-data="{{ Auth::user() }}"
            >
        </dashboard-user>
    </sidebar-provider>
@endsection