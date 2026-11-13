@extends('layouts.admin')

@section('titulo', 'Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"> Nómina y Personal</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Empleado
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado General - DISFARMA Honduras</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Identidad</th>
                        <th>Nombre completo</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Ingreso</th>
                        <th>Estado</th>
                        <th class="text-center" style="width: 160px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->identidad }}</td>
                        <td class="fw-bold">{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>
                            @if($empleado->cargo == 'Regente Farmacéutico')
                                <span class="badge bg-primary">{{ $empleado->cargo }}</span>
                            @elseif($empleado->cargo == 'Asistente de Farmacia')
                                <span class="badge bg-info text-dark">{{ $empleado->cargo }}</span>
                            @elseif($empleado->cargo == 'Jefe de Bodega')
                                <span class="badge bg-dark">{{ $empleado->cargo }}</span>
                            @elseif($empleado->cargo == 'Despachador')
                                <span class="badge bg-warning text-dark">{{ $empleado->cargo }}</span>
                            @else
                                <span class="badge bg-success">{{ $empleado->cargo }}</span>
                            @endif
                        </td>
                        <td>L. {{ number_format($empleado->salario, 2) }}</td>
                        <td>{{ $empleado->fecha_ingreso->format('d/m/Y') }}</td>
                        <td>
                            @if($empleado->estado == 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este empleado?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No hay empleados registrados aún.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $empleados->links() }}
    </div>
</div>
@endsection