@extends('layouts.admin')

@section('titulo', 'Editar Medicamento')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 mb-0">Editar Medicamento</h1>
    <small class="text-muted">Modificando: <strong>{{ $medicamento->nombre }}</strong> (ID: {{ $medicamento->id }})</small>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-warning text-dark py-3">
        <h6 class="m-0 fw-bold"><i class="fas fa-edit me-2"></i>Actualizar Información</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('medicamentos.update', $medicamento) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('medicamentos._form')

            <hr class="my-4">
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync me-1"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection