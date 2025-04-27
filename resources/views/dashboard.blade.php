@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            border-radius: 8px; /* Bordes redondeados */
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-weight: bold;
            color: #333;
        }

        h2 {
            font-size: 2rem;
            color: #333;
        }

        small {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Efecto hover */
        .card-body:hover {
            background-color: #e2e8f0;
        }
    </style>

    <div class="container">
        <h1 class="mb-4">Dashboard de Recolección de Residuos</h1>

        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="start_date">Fecha de Inicio</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate->format('Y-m-d') }}">
                </div>

                <div class="col-md-4">
                    <label for="end_date">Fecha de Fin</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate->format('Y-m-d') }}">
                </div>

                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <!-- Separador con espaciado y bordes -->
        <div style="margin-top: 30px; margin-bottom: 30px; border-top: 2px solid #ddd;"></div>


        <!-- Contador de Estado de Recolección -->
        <div class="row mb-4">
            @foreach($statusCounts as $status => $count)
                <div class="col-md-4">
                    <div class="card text-center shadow-sm" style="background-color: #f0f9f0;">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase">{{ $status }}</h3>
                            <h2><b>{{ $count }}</b></h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Separador con espaciado y bordes -->
        <div style="margin-top: 30px; margin-bottom: 30px; border-top: 2px solid #ddd;"></div>


        <!-- Resumen de Tipo de Residuo -->
        <div class="row mb-4">
            @foreach($summary as $type => $data)
                <div class="col-md-4">
                    <div class="card text-center shadow-sm" style="background-color: #f0f9f0;">
                        <div class="card-body">
                            <!-- Icono colorido basado en tipo de residuo -->
                            <div style="display:inline-block; width: 15px; height: 15px; background-color: {{ $data['color_hex'] }}; border-radius: 50%; margin-left: 10px;"></div>
                            <h3 class="card-title">{{ $data['name'] }}</h3>
                            <h2><b>{{ $data['total_weight'] }}</b> Kg</h2>
                            <small>Última Actualización: {{ \Carbon\Carbon::parse($data['last_updated'])->format('d-m-Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Gráfica (opcional más adelante) -->
        {{-- Puedes agregar una gráfica si decides usar librerías como Chart.js o ApexCharts más tarde --}}

    </div>
@endsection
