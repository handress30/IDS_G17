@extends('layouts.app')

@section('title', 'Recolecciones')
@section('page-title', 'Recolecciones')

@section('content')

{{--
@php
    dd(auth()->user()->profile->domain);
@endphp
--}}


<div class="container">
    <h1>Recolecciones</h1>

    <a href="{{ route('collections.create') }}" class="btn btn-primary mb-3">Crear nueva recolección</a>

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
                <td>
                    @if($collection->status == 'Pendiente')
                    <span class="badge badge-warning">{{ $collection->status }}</span>
                    @else
                    <span class="badge badge-success">{{ $collection->status }}</span>
                    @endif
                </td>
                <td>{{ $collection->weight ?? '-' }}</td>
                <td>{{ $collection->date_requested }}</td>
                <td>
                    <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                    </form>

                    @if (in_array(auth()->user()->profile->domain ?? '', ['SuperAdministrador', 'AdministradorRecolecciones', 'Recolector']))
                    <!-- Botón que activa el modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#confirmModal-{{ $collection->id }}">
                        Confirmar Recolección
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmModal-{{ $collection->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel-{{ $collection->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('collections.confirm', $collection->id) }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmModalLabel-{{ $collection->id }}">Confirmar Recolección</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro de confirmar esta recolección para el usuario <strong>{{ $collection->user->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
