@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <h1>Empresas Recolectoras</h1>

    <a href="{{ route('collection_companies.create') }}" class="btn btn-success mb-3">Crear Empresa</a>


    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Identificación</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($thirdParties as $empresa)
            <tr>
                <td>{{ $empresa->name }}</td>
                <td>{{ $empresa->identification }}</td>
                <td>{{ $empresa->email }}</td>

                <td>
                    <a href="{{ route('collection_companies.edit', $empresa) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('collection_companies.destroy', $empresa) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro de eliminar?')" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection