@extends('layouts.app')

@section('title', 'Tipos residuos')
@section('page-title', 'Tipos residuos')

@section('content')
    <div class="container">

        <a href="{{ route('waste-types.create') }}" class="btn btn-primary mb-3 icon-text-wrapper ml-auto">
            <i class="fa fa-plus " ></i>
            <p>Agregar</p>
        </a>

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
                    <td>
                        <div class="label-tipo-residuo" style="background-color: {{ $wasteType->color_hex }}">
                            {{ $wasteType->name }}
                        </div>
                    </td>
                    <td>
                        <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $wasteType->color_hex }}; border-radius: 50%;"></span>
                    </td>
                    <td>
                        <a href="{{ route('waste-types.edit', $wasteType->id) }}" class="btn btn-warning btn-sm text-gray-700 font-semibold">
                            <i class="fa fa-edit text-gray-600" ></i>
                        </a>

                        <form action="{{ route('waste-types.destroy', $wasteType->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">
                                <i class="fa fa-trash text-white"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
