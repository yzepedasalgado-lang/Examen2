@extends('layouts.admin')

@section('titulo', 'Registrar Medicamento')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 mb-0">Registrar Nuevo Medicamento</h1>
    <small class="text-muted">DISFARMA - Catálogo e Inventario</small>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header text-white py-3" style="background-color: #14606e;">
        <h6 class="m-0 fw-bold"><i class="fas fa-pills me-2"></i>Ficha del Medicamento</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('medicamentos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('medicamentos._form')

            <hr class="my-4">
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn text-white" style="background-color: #14606e;">
                    <i class="fas fa-save me-1"></i> Guardar Medicamento
                </button>
            </div>
        </form>
    </div>
</div>
@endsection