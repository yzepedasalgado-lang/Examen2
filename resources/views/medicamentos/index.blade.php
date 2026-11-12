@extends('layouts.admin')

@section('titulo', 'Medicamentos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-0">Catálogo de Medicamentos</h1>
        <small class="text-muted">DISFARMA - Control de Inventario Farmacéutico</small>
    </div>
    <a href="{{ route('medicamentos.create') }}" class="btn text-white shadow-sm" style="background-color: #14606e;">
        <i class="fas fa-plus me-1"></i> Nuevo Medicamento
    </a>
</div>

<form action="{{ route('medicamentos.index') }}" method="GET" class="row g-2 mb-3">
    <div class="col-md-6">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o SKU" value="{{ $buscar }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-dark"><i class="fas fa-search me-1"></i> Buscar</button>
        <a href="{{ route('medicamentos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
    </div>
</form>

<div class="card shadow-sm mb-4 border-0">
    <div class="card-header text-white py-3" style="background-color: #14606e;">
        <h6 class="m-0 fw-bold"><i class="fas fa-table me-2"></i>Listado General de Medicamentos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">Foto</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th class="text-end">Precio</th>
                        <th class="text-center">Existencias</th>
                        <th>Vence</th>
                        <th class="text-center" style="width: 130px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicamentos as $medicamento)
                    <tr>
                        <td class="text-center">
                            @if ($medicamento->imagen)
                                <img src="{{ asset('uploads/medicamentos/' . $medicamento->imagen) }}"
                                     width="50" height="50" class="rounded" style="object-fit: cover;">
                            @else
                                <i class="fas fa-image fa-2x text-secondary"></i>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $medicamento->codigo }}</td>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamento->categoria }}</td>
                        <td class="text-end">L. {{ number_format($medicamento->precio, 2) }}</td>
                        <td class="text-center">
                            @if ($medicamento->inventario > 20)
                                <span class="badge bg-success">{{ $medicamento->inventario }} Óptimo</span>
                            @elseif ($medicamento->inventario >= 10)
                                <span class="badge bg-warning text-dark">{{ $medicamento->inventario }} Moderado</span>
                            @else
                                <span class="badge bg-danger">{{ $medicamento->inventario }} ¡Desabastecimiento!</span>
                            @endif
                        </td>
                        <td>{{ $medicamento->fecha_vencimiento->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('medicamentos.edit', $medicamento) }}" class="btn btn-warning btn-sm me-1" title="Editar">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('medicamentos.destroy', $medicamento) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Confirma que desea eliminar este medicamento del catálogo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">
                            <i class="fas fa-box-open fa-3x mb-3 text-secondary d-block"></i>
                            No hay medicamentos registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $medicamentos->links() }}
        </div>
    </div>
</div>
@endsection