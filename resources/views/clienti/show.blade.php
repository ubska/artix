@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card text-bg-light mb-3">
                    <div class="card-header">
                        {{ $clienti->first_name }} {{ $clienti->last_name }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $clienti->phone_number }}</h5>
                        <p class="card-text">{{ $clienti->email }}</p>
                        <p class="card-text">{{ $clienti->address }}</p>

                        <hr>

                        <h5>Interventi</h5>

                        @if ($clienti->interventi->isNotEmpty())
                            @foreach ($clienti->interventi as $intervento)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6><strong>Data:</strong> {{ $intervento->data_intervento }}</h6>
                                        <p><strong>Descrizione:</strong> {{ $intervento->descrizione }}</p>
                                        <p><strong>Note:</strong> {{ $intervento->note ?? '—' }}</p>
                                        <a href="{{ route('interventi.edit', $intervento->id) }}"
                                            class="btn btn-sm btn-outline-primary">Modifica</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">Nessun intervento registrato</p>
                        @endif

                        <a href="{{ route('clienti.edit', $clienti->id) }}" class="btn btn-primary btn-sm">Modifica</a>
                        <a href="{{ route('clienti.index') }}" class="btn btn-secondary btn-sm">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
