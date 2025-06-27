@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Modifica Intervento</h2>

        <form action="{{ route('interventi.update', $interventi->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            {{-- id cliente --}}
            <div class="mb-3">
                <label for="client_id" class="form-label">id del cliente</label>
                <input type="text" name="client_id" id="first_name" class="form-control"
                    value="{{ old('client_id', $interventi->client_id) }}" required>
            </div>
            {{-- descrizione del intervento --}}
            <div class="mb-3">
                <label for="descrizione" class="form-label">descrizione</label>
                <input type="text" name="descrizione" id="descrizione" class="form-control"
                    value="{{ old('descrizione', $interventi->descrizione) }}" required>
            </div>
            {{-- data del intervento --}}
            <div class="mb-4">
                <label class="block font-semibold" for="data_intervento">Data Intervento</label>
                <input type="date" name="data_intervento" id="data_intervento"
                    value="{{ old('data_intervento', $interventi->data_intervento) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>
            {{-- note --}}
            <div class="mb-3">
                <label for="note" class="form-label">note</label>
                <input type="text" name="note" id="note" class="form-control"
                    value="{{ old('note', $interventi->note) }}" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Carica file (immagine o PDF)</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salva modifiche</button>
            <a href="{{ route('clienti.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
