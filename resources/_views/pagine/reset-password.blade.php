@extends('master')

@section('content')
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <h2>Imposta Nuova Password</h2>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    
    <label>Nuova Password:</label>
    <input type="password" name="password" required>
    
    <label>Conferma Password:</label>
    <input type="password" name="password_confirmation" required>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <button type="submit">Aggiorna Password</button>
</form>
@endsection