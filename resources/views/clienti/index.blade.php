@extends('layouts.app')

@section('content')
    <div class="fluid">
        <a href="{{ route('clienti.create') }}" class="btn btn-outline-success">Aggiungi nuovo cliente</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clienti as $cliente)
                    <tr>
                        <td>{{ $cliente->first_name }}</td>
                        <td>{{ $cliente->last_name }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->phone_number }}</td>
                        <td>
                            <a href="{{ route('clienti.show', $cliente->id) }}" class="btn btn-info btn-sm">Vedi</a>
                            <a href="{{ route('clienti.edit', $cliente->id) }}" class="btn btn-primary btn-sm">Modifica</a>

                            <form action="{{ route('clienti.destroy', $cliente->id) }}" method="POST"
                                style="display:inline-block"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo cliente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
