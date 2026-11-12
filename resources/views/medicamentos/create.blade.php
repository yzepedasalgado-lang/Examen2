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

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Código (SKU) <span class="text-danger">*</span></label>
                    <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror"
                           value="{{ old('codigo') }}">
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre') }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Categoría <span class="text-danger">*</span></label>
                    <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
                        <option value="">Seleccione una categoría</option>
                        <option value="Antibióticos" {{ old('categoria') == 'Antibióticos' ? 'selected' : '' }}>Antibióticos</option>
                        <option value="Analgésicos" {{ old('categoria') == 'Analgésicos' ? 'selected' : '' }}>Analgésicos</option>
                        <option value="Sueros" {{ old('categoria') == 'Sueros' ? 'selected' : '' }}>Sueros</option>
                        <option value="Material Quirúrgico" {{ old('categoria') == 'Material Quirúrgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                        <option value="Vitaminas" {{ old('categoria') == 'Vitaminas' ? 'selected' : '' }}>Vitaminas</option>
                    </select>
                    @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Laboratorio <span class="text-danger">*</span></label>
                    <input type="text" name="laboratorio" class="form-control @error('laboratorio') is-invalid @enderror"
                           value="{{ old('laboratorio') }}">
                    @error('laboratorio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Número de lote <span class="text-danger">*</span></label>
                    <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror"
                           value="{{ old('numero_lote') }}">
                    @error('numero_lote')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Precio (L.) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror"
                           value="{{ old('precio') }}" placeholder="0.00">
                    @error('precio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Costo (L.) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror"
                           value="{{ old('costo') }}" placeholder="0.00">
                    @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Inventario <span class="text-danger">*</span></label>
                    <input type="number" name="inventario" class="form-control @error('inventario') is-invalid @enderror"
                           value="{{ old('inventario') }}" placeholder="0">
                    @error('inventario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Fecha de registro <span class="text-danger">*</span></label>
                    <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror"
                           value="{{ old('fecha_registro', date('Y-m-d')) }}">
                    @error('fecha_registro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Fecha de vencimiento <span class="text-danger">*</span></label>
                    <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                           value="{{ old('fecha_vencimiento') }}">
                    @error('fecha_vencimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label fw-bold">Fotografía del empaque (jpg, png o webp, máx. 5MB)</label>
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
                    @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

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