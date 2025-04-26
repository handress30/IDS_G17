@extends('layouts.app')

@section('title', 'Tipos residuos')
@section('page-title', 'Tipos residuos')

@section('content')
    <div class="container">
        <h1>Tipos de Residuos</h1>

        <a href="{{ route('waste-types.create') }}" class="btn btn-primary mb-3">Crear nuevo tipo</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Color</th> <!-- Columna para mostrar el color -->
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($wasteTypes as $wasteType)
                <tr>
                    <td>{{ $wasteType->id }}</td>
                    <td>{{ $wasteType->name }}</td>
                    <td>
                        <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $wasteType->color_hex }}; border-radius: 50%;"></span>
                    </td>
                    <td>
                        <a href="{{ route('waste-types.edit', $wasteType->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('waste-types.destroy', $wasteType->id) }}" method="POST" style="display:inline-block;">
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
