@extends('layouts.app');

@section('content')
    <div class="container md-4">
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $clienti->first_name }} {{ $clienti->last_name }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ $clienti->phone_number }}</h5>
                <p class="card-text">{{ $clienti->email }}</p>
                <p class="card-text">{{ $clienti->address }}</p>
                <a href="{{ route('clienti.edit', $clienti->id) }}" class="btn btn-primary btn-sm">Modifica</a>
                <a href="{{ route('clienti.index') }}" class="btn btn-primary btn-sm">Torna in dietro</a>
            </div>
        </div>
    </div>
@endsection;
