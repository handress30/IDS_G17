@extends('layouts.app')

@section('title', 'Tipos residuos')
@section('page-title', 'Tipos residuos')

@section('content')
    <div class="container">
        <h1>Editar Tipo de Residuo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('waste-types.update', $wasteType->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Residuo</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $wasteType->name }}" required>
            </div>
            <div class="mb-3">
                <label for="color_hex" class="form-label">Color (Hexadecimal)</label>
                <input type="color" class="form-control form-control-color" id="color_hex" name="color_hex" value="{{ $wasteType->color_hex }}" title="Elige un color">
            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('waste-types.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
