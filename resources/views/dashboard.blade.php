@extends('layouts.app')

@section('content')
    <div class="container py-5" style="max-width: 800px;">

        <h1 class="mb-4 text-center">Benvenuto, {{ Auth::user()->name }}!</h1>
        <p class="text-center text-muted mb-5">Scegli cosa vuoi gestire oggi.</p>

        <div class="row g-4">

            <!-- Card Clienti -->
            <div class="col-md-4">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <i class="bi bi-people-fill" style="font-size: 3rem; color: #0d6efd;"></i>
                        </div>
                        <h5 class="card-title">Clienti</h5>
                        <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-auto">Vai a Clienti</a>
                    </div>
                </div>
            </div>

            <!-- Card Interventi -->
            <div class="col-md-4">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <i class="bi bi-wrench-adjustable-circle-fill" style="font-size: 3rem; color: #198754;"></i>
                        </div>
                        <h5 class="card-title">Interventi</h5>
                        <a href="{{ route('interventi.index') }}" class="btn btn-success mt-auto">Vai a Interventi</a>
                    </div>
                </div>
            </div>

            <!-- Card nuovo -->
            <div class="col-md-4">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <i class="bi bi-wrench-adjustable-circle-fill" style="font-size: 3rem; color: #198754;"></i>
                        </div>
                        <h5 class="card-title">+ NUOVO</h5>
                        <a href="{{ route('interventi.createWithClient') }}" class="btn btn-success">
                            + Nuovo Intervento
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
