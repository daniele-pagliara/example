@extends('master')

@section('content')
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <h2>Recupera Password</h2>
    
    @if (session('successo'))
        <div style="color: green;">{{ session('successo') }}</div>
    @endif

    <label>Inserisci la tua Email:</label>
    <input type="email" name="email" required>
    @error('email') <span style="color: red;">{{ $message }}</span> @enderror
    
    <button type="submit">Invia Link di Reset</button>
</form>
@endsection