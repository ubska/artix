@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Modifica Cliente</h2>

        <form action="{{ route('clienti.update', $clienti->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="first_name" class="form-label">Nome</label>
                <input type="text" name="first_name" id="first_name" class="form-control"
                    value="{{ old('first_name', $clienti->first_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Cognome</label>
                <input type="text" name="last_name" id="last_name" class="form-control"
                    value="{{ old('last_name', $clienti->last_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $clienti->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Telefono</label>
                <input type="number" name="phone_number" id="phone_number" class="form-control"
                    value="{{ old('phone_number', $clienti->phone_number) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva modifiche</button>
            <a href="{{ route('clienti.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
