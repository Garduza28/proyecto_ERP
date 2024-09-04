<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        //dd($clientes);
        return view('admin.clientes.index', compact('clientes'));
    }


    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        Clientes::create($request->all());
        return redirect()->route('admin.clientes.index')->with('success', 'clientes creado exitosamente.');
    }

    public function edit(Clientes $clientes)
    {
        return view('admin.clientes.edit', compact('clientes'));
    }

    public function update(Request $request, Clientes $clientes)
    {
        $clientes->update($request->all());

        return redirect()->route('admin.clientes.index')->with('success', 'clientes actualizado exitosamente.');
    }

    public function info(Clientes $clientes)
    {
        return view('clientes.info', compact('clientes'));
    }
    public function show(Clientes $clientes)
    {
        $clientes = $clientes;
        //dd($clientes);
                return view('admin.clientes.info', compact('clientes'));
    }

    public function destroy(Clientes $clientes)
    {

        $clientes->delete();

        return redirect()->route('admin.clientes.index')->with('success', 'clientes eliminado exitosamente.');
    }
}
