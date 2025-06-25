@extends('layouts.app')

@section('content')
    <div class="fluid">
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

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
