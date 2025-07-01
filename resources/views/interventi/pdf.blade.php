<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Intervento #{{ $intervento->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 40px;
            color: #000;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .section {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
            vertical-align: top;
        }

        .value {
            display: inline-block;
            max-width: 400px;
        }

        .description,
        .note {
            margin-top: 10px;
            white-space: pre-wrap;
        }

        .signature {
            margin-top: 40px;
        }

        .signature img {
            max-width: 300px;
            max-height: 150px;
            border: 1px solid #000;
        }

        footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <header>
        <div class="title">Artix - Rapporto Intervento</div>
        <div>ID Intervento: #{{ $intervento->id }}</div>
    </header>

    <div class="section">
        <div class="label">Data intervento:</div>
        <div class="value">{{ \Carbon\Carbon::parse($intervento->data_intervento)->format('d/m/Y') }}</div>
    </div>

    <div class="section">
        <div class="label">Cliente:</div>
        <div class="value">
            {{ $intervento->cliente->first_name }} {{ $intervento->cliente->last_name }}<br>
            {{ $intervento->cliente->email }}<br>
            {{ $intervento->cliente->phone_number }}<br>
            {{ $intervento->cliente->address ?? '-' }}
        </div>
    </div>

    <div class="section">
        <div class="label">Descrizione:</div>
        <div class="value description">{{ $intervento->descrizione }}</div>
    </div>

    @if ($intervento->note)
        <div class="section">
            <div class="label">Note:</div>
            <div class="value note">{{ $intervento->note }}</div>
        </div>
    @endif

    @if ($intervento->signature)
        <div class="signature">
            <strong>Firma del cliente:</strong><br>
            <img src="{{ $intervento->signature }}" alt="Firma del cliente">
        </div>
    @endif

    <footer>
        Documento generato automaticamente - Artix {{ now()->format('d/m/Y') }}
    </footer>
</body>

</html>
