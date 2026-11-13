@extends('layouts.admin')

@section('titulo', 'Editar Empleado')

@section('contenido')
<h1 class="h3 mb-3">Editar Empleado: {{ $empleado->nombre }} {{ $empleado->apellido }}</h1>

<div class="card shadow-sm col-lg-10">
    <div class="card-body">
        <form action="{{ route('empleados.update', $empleado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Identidad (13 dígitos, sin guiones)</label>
                    <input type="text" name="identidad" maxlength="13" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad', $empleado->identidad) }}">
                    @error('identidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $empleado->nombre) }}">
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Apellido</label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $empleado->apellido) }}">
                    @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Correo</label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $empleado->correo) }}">
                    @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Cargo</label>
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="">Seleccione</option>
                        <option value="Regente Farmacéutico" {{ old('cargo', $empleado->cargo) == 'Regente Farmacéutico' ? 'selected' : '' }}>Regente Farmacéutico</option>
                        <option value="Asistente de Farmacia" {{ old('cargo', $empleado->cargo) == 'Asistente de Farmacia' ? 'selected' : '' }}>Asistente de Farmacia</option>
                        <option value="Jefe de Bodega" {{ old('cargo', $empleado->cargo) == 'Jefe de Bodega' ? 'selected' : '' }}>Jefe de Bodega</option>
                        <option value="Despachador" {{ old('cargo', $empleado->cargo) == 'Despachador' ? 'selected' : '' }}>Despachador</option>
                        <option value="Cajero" {{ old('cargo', $empleado->cargo) == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                    </select>
                    @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Salario base mensual (Lempiras)</label>
                    <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $empleado->salario) }}">
                    @error('salario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Fecha de ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso->format('Y-m-d')) }}">
                    @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado</label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="Activo" {{ old('estado', $empleado->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado', $empleado->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Actualizar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection