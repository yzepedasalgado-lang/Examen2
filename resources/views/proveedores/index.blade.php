@extends('layouts.admin')

@section('titulo', 'Proveedores')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"> Laboratorios y Proveedores Mayoristas</h1>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Proveedor
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
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th>Límite de crédito</th>
                        <th>Plazo</th>
                        <th>Estado</th>
                        <th class="text-center" style="width: 160px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->rtn }}</td>
                        <td class="fw-bold">{{ $proveedor->empresa }}</td>
                        <td>{{ $proveedor->contacto }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->categoria }}</td>
                        <td>L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                        <td><span class="badge bg-info text-dark">{{ $proveedor->dias_credito }} días</span></td>
                        <td>
                            @if($proveedor->estado == 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este proveedor?')">
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
                        <td colspan="9" class="text-center text-muted py-4">No hay proveedores registrados aún.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $proveedores->links() }}
    </div>
</div>
@endsection