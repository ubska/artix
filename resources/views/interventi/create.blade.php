@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6 max-w-xl bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Aggiungi nuovo intervento</h1>

        {{-- Form --}}
        <form method="POST" action="{{ route('interventi.store') }}">
            @csrf



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

            {{-- Submit --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Salva Intervento
            </button>
        </form>
    </div>
@endsection
