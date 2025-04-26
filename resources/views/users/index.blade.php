@extends('layouts.app')

@section('title', 'Administrar Usuarios')
@section('page-title', 'Administrar Usuarios')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Usuarios</h3>
        <div class="card-tools">
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-user-plus"></i> Crear Usuario
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover text-nowrap">
            <thead class="bg-success text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile ?? 'Sin perfil' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        {{-- Aquí luego agregamos botón Eliminar --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay usuarios registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>
@endsection