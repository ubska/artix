@extends('layouts.app');

@section('content')
    <div class="container md-4">
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $clienti->first_name }} {{ $clienti->last_name }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ $clienti->phone_number }}</h5>
                <p class="card-text">{{ $clienti->email }}</p>
                <p class="card-text">{{ $clienti->address }}</p>
            </div>
        </div>
    </div>
@endsection;
