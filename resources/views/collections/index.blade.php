@extends('layouts.app')
@section('title', 'Recolecciones')
@section('page-title', 'Recolecciones')


@section('content')
    <div class="container">
        <h1>Colecciones</h1>

        <a href="{{ route('collections.create') }}" class="btn btn-primary mb-3">Crear nueva colección</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Tipo de Residuo</th>
                <th>Estado</th>
                <th>Peso</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($collections as $collection)
                <tr>
                    <td>{{ $collection->id }}</td>
                    <td>{{ $collection->user->name }}</td>
                    <td>
                        <div style="display:inline-block; width: 15px; height: 15px; background-color: {{ $collection->wasteType->color_hex }}; border-radius: 50%; margin-left: 10px;"></div>
                        <span> {{ $collection->wasteType->name }}</span>
                    </td>
                    <td>{{ $collection->status }}</td>
                    <td>{{ $collection->weight }}</td>
                    <td>{{ $collection->date_requested }}</td>
                    <td>
                        <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
