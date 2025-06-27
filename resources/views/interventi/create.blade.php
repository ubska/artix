@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6 max-w-xl bg-white p-6 rounded shadow">


        {{-- Form --}}
        <form method="POST" action="{{ route('interventi.store') }}">
            @csrf


            {{-- cliente --}}
            <div class="mb-4">
                <label class="block font-semibold" for="descrizione">cliente id</label>
                <input name="client_id" id="client_id" rows="3" required
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">{{ old('client_id') }}</input>
            </div>


            {{-- Descrizione --}}
            <div class="mb-4">
                <label class="block font-semibold" for="descrizione">Descrizione</label>
                <textarea name="descrizione" id="descrizione" rows="3" required
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">{{ old('descrizione') }}</textarea>
            </div>

            {{-- Data intervento --}}
            <div class="mb-4">
                <label class="block font-semibold" for="data_intervento">Data Intervento</label>
                <input type="date" name="data_intervento" id="data_intervento" value="{{ old('data_intervento') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            {{-- Note --}}
            <div class="mb-4">
                <label class="block font-semibold" for="note">Note</label>
                <textarea name="note" id="note" rows="2" class="w-full border border-gray-300 rounded px-3 py-2 mt-1">{{ old('note') }}</textarea>
            </div>
            {{-- caricamento file  --}}
            <div class="mb-3">
                <label for="file" class="form-label">File (immagine o PDF)</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            {{-- Submit --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Salva Intervento
            </button>
        </form>
    </div>
@endsection
