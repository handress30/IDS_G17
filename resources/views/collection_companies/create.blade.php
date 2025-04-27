@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Empresa Recolectora</h1>

    <form action="{{ route('collection_companies.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Identificación</label>
            <input type="text" name="identification" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="address" class="form-control">
        </div>

        <button class="btn btn-success mt-3" type="submit">Crear Empresa</button>
    </form>
</div>
@endsection