@extends('layouts.app')

@section('content')
    <div class="fluid">
        <a href="{{ route('interventi.create') }}" class="btn btn-success btn-sm">Aggiungi nuovo intervento</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">descrizione</th>
                    <th scope="col">data-intervento</th>
                    <th scope="col">note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interventi as $intervento)
                    <tr>
                        <td>{{ $intervento->client_id }}</td>
                        <td>{{ $intervento->descrizione }}</td>
                        <td>{{ $intervento->data_intervento }}</td>
                        <td>{{ $intervento->note }}</td>
                        <td>
                            @if ($intervento->file_path)
                                <a href="{{ Storage::url($intervento->file_path) }}" target="_blank">Visualizza file</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
