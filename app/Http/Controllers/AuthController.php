<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::orderBy('apellido')->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'identidad'       => 'required|digits:13|unique:empleados,identidad',
            'nombre'          => 'required|string|max:255',
            'apellido'        => 'required|string|max:255',
            'cargo'           => 'required|string|max:255',
            'salario'         => 'required|numeric|min:0',
            'codigo_empleado' => 'required|digits:13|unique:empleados,codigo_empleado',
            'fecha_ingreso'   => 'required|date',
        ]);

        Empleado::create($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate([
            'identidad'       => ['required', 'digits:13', Rule::unique('empleados', 'identidad')->ignore($empleado->id)],
            'nombre'          => 'required|string|max:255',
            'apellido'        => 'required|string|max:255',
            'cargo'           => 'required|string|max:255',
            'salario'         => 'required|numeric|min:0',
            'codigo_empleado' => ['required', 'digits:13', Rule::unique('empleados', 'codigo_empleado')->ignore($empleado->id)],
            'fecha_ingreso'   => 'required|date',
        ]);

        $empleado->update($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado dado de baja correctamente.');
    }
}