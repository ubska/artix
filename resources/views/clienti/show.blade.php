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

                                        @if ($intervento->file_path)
                                            @php
                                                $ext = pathinfo($intervento->file_path, PATHINFO_EXTENSION);
                                            @endphp

                                            @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif']))
                                                <img src="{{ Storage::url($intervento->file_path) }}"
                                                    alt="Anteprima immagine" style="max-width:200px;">
                                            @else
                                                <a href="{{ Storage::url($intervento->file_path) }}"
                                                    target="_blank">Visualizza file</a>
                                            @endif
                                        @endif

                                        {{-- Firma --}}
                                        @if ($intervento->signature)
                                            <p><strong>Firma:</strong></p>
                                            <img src="{{ $intervento->signature }}" alt="Firma Cliente"
                                                style="border:1px solid #000; max-width:400px;">
                                        @else
                                            <p><em>Nessuna firma disponibile.</em></p>
                                        @endif
                                        <a href="{{ route('interventi.downloadPdf', $intervento->id) }}"
                                            class="btn btn-primary">
                                            Scarica PDF
                                        </a>

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
