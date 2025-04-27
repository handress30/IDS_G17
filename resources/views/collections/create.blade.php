@extends('layouts.app')

@section('title', 'Recolecciones')
@section('page-title', 'Recolecciones')

@section('content')
    <div class="container">
        
        <form class="mt-4" action="{{ route('collections.store') }}" method="POST">
            <h1 class="mx-auto font-bold text-center py-2.5 bg-organico">Registro de recolección</h1>
            @csrf
            <div class="p-4">
                <div class="w-full grid  gap-x-8">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Usuario</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="date_requested" class="form-label">Fecha de Solicitud</label>
                        <input type="date" name="date_requested" id="date_requested" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="waste_type_id" class="form-label">Tipo de Residuo</label>
                        <select name="waste_type_id" id="waste_type_id" class="form-control">
                            @foreach($wasteTypes as $wasteType)
                                <option value="{{ $wasteType->id }}">{{ $wasteType->name }}</option>
                            @endforeach
                        </select>
                    </div>
        
               
        
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Completado">Completado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso</label>
                        <input type="number" name="weight" id="weight" class="form-control" step="0.01">
                    </div>
                </div>
    
                <div class="w-full flex gap-8 justify-center items-center mt-4">
                    <button type="submit" class="btn btn-primary px-10">Guardar</button>
                    <a href="{{ route('collections.index') }}" class="btn btn-secondary px-10">Cancelar</a>
                </div>
          
            </div>
  

        
        </form>
    </div>
@endsection
