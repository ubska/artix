@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6 max-w-xl bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Aggiungi nuovo cliente</h1>

        {{-- Mostra errori di validazione --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('clienti.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold" for="name">Nome</label>
                <input type="text" name="first_name" id="name" required value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block font-semibold" for="name">Cognome</label>
                <input type="text" name="last_name" id="name" required value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div class="mb-4">
                <label class="block font-semibold" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div class="mb-4">
                <label class="block font-semibold" for="phone">Telefono</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Salva Cliente
            </button>
        </form>
    </div>
@endsection
