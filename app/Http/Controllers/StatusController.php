<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Statu;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        $material = Material::all();
        $doctor = Doctor::all();
       // $statuses = Status::with('invoice')->get();
        //dd($invoices);
        return view('admin.status.index', compact('invoices', 'material', 'doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $statu = new Statu;
        $mpatient = Patient::create([
            'name' => $request->patient
        ]);
        $mStatus = Statu::create([
            'orden_dental' => $request->orden__dental,
            'color' => $request->color,
            'status' => $request->status
        ]);
        return redirect()->route('admin.status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice, Doctor $doctor, Material $material)
    {
        $mInvoice = Invoice::all();
        $mDoctor = Doctor::all();
        $mMaterial = Material::all();
        return view('admin.status.info', compact('invoice', 'doctor', 'material'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //dd($invoice);
        $doctors = Doctor::all();
        $materials = Material::all();
        return view('admin.status.edit', compact('invoice','doctors', 'materials'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statu $statu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.status.index')
            ->with('eliminar', 'ok');
    }
}
