<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Medicamento;
use App\Models\Proveedor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMedicamentos = Medicamento::count();
        $proveedoresActivos = Proveedor::where('estado', 'Activo')->count();
        $totalEmpleados = Empleado::count();

        $valorInventario = 0;
        foreach (Medicamento::all() as $medicamento) {
            $valorInventario = $valorInventario + ($medicamento->inventario * $medicamento->precio);
        }

        return view('dashboard', compact(
            'totalMedicamentos',
            'proveedoresActivos',
            'totalEmpleados',
            'valorInventario'
        ));
    }
}