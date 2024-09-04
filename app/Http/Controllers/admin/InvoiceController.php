<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;

class InvoiceController extends Controller
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
        //dd($invoices);
        return view('admin.invoice.index', compact('invoices', 'material', 'doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $materials = Material::all();
        return view('admin.invoice.create', compact('doctors', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'orden' => 'required',
            'paciente' => 'required',
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);

        try {
            // Busca el doctor si se proporciona un ID en la solicitud
            $doctor = null;
            if ($request->has('doctor_id')) {
                $doctor = Doctor::find($request->doctor_id);
            }

            // Procesa los datos de los materiales
// Procesa los datos de los materiales
$materiales = [];
if ($request->has('material_id')) {
    $count = count($request->material_id);
    for ($i = 0; $i < $count; $i++) {
        // Encuentra el material por su ID
        $materialName = Material::find($request->material_id[$i])->material;

        // Guarda el nombre del material en lugar del ID
        $material = [
            'material' => $materialName,
            'unidades' => $request->unidades[$i],
            'precio_total' => $request->precio_total[$i]
        ];
        $materiales[] = $material;
    }
}


            // Serializa el array de materiales a formato JSON
            $materiales_json = json_encode($materiales);

            // Crea una nueva factura con los datos proporcionados
            $invoice = Invoice::create([
                'orden' => $request->orden,
                'paciente' => $request->paciente,
                'color' => $request->color,
                'trabajo' => $request->trabajo,
                'doctor_id' => $doctor ? $doctor->id : null,
                'materiales_total' => $materiales_json,
            ]);

            return redirect()->route('admin.invoice.index')->with('success', 'Se ha creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Ha ocurrido un error al crear la factura.');
        }
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice, Doctor $doctor, Material $material)
    {
        $mInvoice = Invoice::all();
        $mDoctor = Doctor::all();
        $mMaterial = Material::all();
        return view('admin.invoice.info', compact('invoice', 'doctor', 'material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
       
        $doctors = Doctor::all();
        $materials = Material::all();
        return view('admin.invoice.edit', compact('invoice','doctors', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $datainvoice = [];
        $datainvoice['orden'] = $request->orden;
        $datainvoice['paciente'] = $request->paciente;
        $datainvoice['color'] = $request->color;
        $datainvoice['trabajo'] = $request->trabajo;
        $invoice->update($datainvoice);
        return redirect()->route('admin.invoice.index')
            ->with('Se creo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoice.index')
            ->with('eliminar', 'ok');
    }

    public function generarPDF(Invoice $invoice)
    {
        // Instancia de Dompdf
        $dompdf = new Dompdf();
        
        // Contenido HTML para el PDF
        $html = view('admin.invoice.pdf', compact('invoice'))->render();
        
        // Carga el contenido HTML al Dompdf
        $dompdf->loadHtml($html);
        
        // Renderiza el PDF
        $dompdf->render();
        
        // Devuelve el PDF como una respuesta HTTP
        return $dompdf->stream();
    }
    
}
