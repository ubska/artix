@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Nuovo Intervento + Cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Attenzione!</strong> Ci sono alcuni errori nel modulo:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('interventi.storeWithClient') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Dati Cliente</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('nome') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Cognome</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('cognome') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ old('telefono') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="indirizzo" class="form-label">Indirizzo (facoltativo)</label>
                        <input type="text" name="indirizzo" class="form-control" value="{{ old('indirizzo') }}">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-success text-white">Dati Intervento</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="descrizione" class="form-label">Descrizione</label>
                        <textarea name="descrizione" class="form-control" required>{{ old('descrizione') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="data_intervento" class="form-label">Data intervento</label>
                        <input type="date" name="data_intervento" class="form-control"
                            value="{{ old('data_intervento') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Note (facoltative)</label>
                        <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File allegato (immagine o PDF)</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salva Intervento + Cliente</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
