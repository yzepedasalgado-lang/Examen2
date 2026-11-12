<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $medicamentos = Medicamento::where('nombre', 'like', "%$buscar%")
                                   ->orWhere('codigo', 'like', "%$buscar%")
                                   ->latest()
                                   ->paginate(10)
                                   ->withQueryString();

        return view('medicamentos.index', compact('medicamentos', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo'            => 'required|max:50|unique:medicamentos,codigo',
            'nombre'            => 'required|max:255',
            'categoria'         => 'required|in:Antibióticos,Analgésicos,Sueros,Material Quirúrgico,Vitaminas',
            'precio'            => 'required|numeric|gt:0',
            'costo'             => 'required|numeric|min:0',
            'inventario'        => 'required|integer|min:0',
            'imagen'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio'       => 'required|max:255',
            'fecha_vencimiento' => 'required|date',
            'fecha_registro'    => 'required|date',
            'numero_lote'       => 'required|max:50',
        ]);

        $datos = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = time() . '_' . uniqid() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads/medicamentos'), $nombre);
            $datos['imagen'] = $nombre;
        }

        Medicamento::create($datos);

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento registrado exitosamente en el catálogo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'codigo'            => 'required|max:50|unique:medicamentos,codigo,' . $medicamento->id,
            'nombre'            => 'required|max:255',
            'categoria'         => 'required|in:Antibióticos,Analgésicos,Sueros,Material Quirúrgico,Vitaminas',
            'precio'            => 'required|numeric|gt:0',
            'costo'             => 'required|numeric|min:0',
            'inventario'        => 'required|integer|min:0',
            'imagen'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio'       => 'required|max:255',
            'fecha_vencimiento' => 'required|date',
            'fecha_registro'    => 'required|date',
            'numero_lote'       => 'required|max:50',
        ]);

        $datos = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            if ($medicamento->imagen) {
                File::delete(public_path('uploads/medicamentos/' . $medicamento->imagen));
            }
            $archivo = $request->file('imagen');
            $nombre = time() . '_' . uniqid() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads/medicamentos'), $nombre);
            $datos['imagen'] = $nombre;
        }

        $medicamento->update($datos);

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        if ($medicamento->imagen) {
            File::delete(public_path('uploads/medicamentos/' . $medicamento->imagen));
        }

        $medicamento->delete();

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento eliminado del catálogo!');
    }
}