<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores.index', compact('proveedores'));
    }


    public function create()
    {
        return view('admin.proveedores.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar el proveedor en la base de datos
        Proveedor::create($request->all());

        return redirect()->route('admin.proveedor.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('admin.proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        // Lógica para actualizar el proveedor en la base de datos
        $proveedor->update($request->all());

        return redirect()->route('admin.proveedor.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function info(Proveedor $proveedor)
    {
        return view('proveedores.info', compact('proveedor'));
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function destroy(Proveedor $proveedor)
    {
        // Lógica para eliminar el proveedor de la base de datos
        $proveedor->delete();

        return redirect()->route('admin.proveedor.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
