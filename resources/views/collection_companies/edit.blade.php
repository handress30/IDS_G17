@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empresa Recolectora</h1>

    <form action="{{ route('collection_companies.update', ['collection_company' => $thirdParty->id]) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ $thirdParty->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Identificación</label>
            <input type="text" name="identification" value="{{ $thirdParty->identification }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" value="{{ $thirdParty->email }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" value="{{ $thirdParty->phone }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="address" value="{{ $thirdParty->address }}" class="form-control">
        </div>

        <button class="btn btn-primary mt-3" type="submit">Actualizar Empresa</button>
    </form>
</div>
@endsection