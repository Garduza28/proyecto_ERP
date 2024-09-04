<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('admin.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new Material;
        $material->material = $request->material;

        // Limpia el valor del precio para eliminar cualquier símbolo de moneda o formato no numérico
        $precio = str_replace(['$', ','], '', $request->precio); // Elimina el símbolo de moneda ($) y cualquier coma (,) para asegurar un formato numérico adecuado
        $material->precio = $precio;

        $material->save();

        return redirect()->route('admin.material.index')->with('success', 'El material se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        return view('admin.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $datamaterial = [];
        $datamaterial['material'] = $request->material;
        $datamaterial['precio'] = $request->precio;
        $material->update($datamaterial);
        return redirect()->route('admin.material.index')
            ->with('Se creo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.material.index')
            ->with('eliminar', 'ok');
    }
}
