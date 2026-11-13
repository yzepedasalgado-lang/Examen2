@extends('layouts.admin')

@section('titulo', 'Registrar Empleado')

@section('contenido')
<h1 class="h3 mb-3">Registrar Nuevo Empleado</h1>

<div class="card shadow-sm col-lg-10">
    <div class="card-body">
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Identidad (13 dígitos, sin guiones)</label>
                    <input type="text" name="identidad" maxlength="13" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}">
                    @error('identidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Apellido</label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}">
                    @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Correo</label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
                    @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Cargo</label>
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="">Seleccione</option>
                        <option value="Regente Farmacéutico" {{ old('cargo') == 'Regente Farmacéutico' ? 'selected' : '' }}>Regente Farmacéutico</option>
                        <option value="Asistente de Farmacia" {{ old('cargo') == 'Asistente de Farmacia' ? 'selected' : '' }}>Asistente de Farmacia</option>
                        <option value="Jefe de Bodega" {{ old('cargo') == 'Jefe de Bodega' ? 'selected' : '' }}>Jefe de Bodega</option>
                        <option value="Despachador" {{ old('cargo') == 'Despachador' ? 'selected' : '' }}>Despachador</option>
                        <option value="Cajero" {{ old('cargo') == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                    </select>
                    @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Salario base mensual (Lempiras)</label>
                    <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" placeholder="0.00">
                    @error('salario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Fecha de ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso') }}">
                    @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado</label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Empleado</button>
            </div>
        </form>
    </div>
</div>
@endsection