@extends('auth.master-user')
@section('content-user')
    <sidebar-provider>
        <update-form
            dashboard-url="{{ route('pagine.home') }}" 
            database-url="{{ route('pagine.cerca-dati') }}"
            home-url="{{ url('/') }}"
            logout-url="{{ route('logout') }}"
            csrf-token="{{ csrf_token() }}"
            :user-data="{{ Auth::user() }}"
            :users="{{ $usersForVue->toJson() }}"
            >
        </update-form>
    </sidebar-provider>
@endsection