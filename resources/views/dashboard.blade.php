@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<h1 class="h3 mb-4" style="color: #14606e;"> Dashboard Gerencial</h1>

<div class="row">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card text-white shadow-sm border-0" style="background-color: #14606e;">
            <div class="card-body">
                <div>Medicamentos en Catálogo</div>
                <h2>{{ $totalMedicamentos }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card text-white shadow-sm border-0" style="background-color: #2a9bb0;">
            <div class="card-body">
                <div>Proveedores Activos</div>
                <h2>{{ $proveedoresActivos }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-sm border-0" style="background-color: #5bb8d9; color: #0e4a56;">
            <div class="card-body">
                <div>Empleados en Nómina</div>
                <h2>{{ $totalEmpleados }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card text-white shadow-sm border-0" style="background-color: #0e4a56;">
            <div class="card-body">
                <div>Valor del Inventario</div>
                <h2>L. {{ number_format($valorInventario, 2) }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection