<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new Doctor;
        $mdoctor = Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'direction' => $request->direction,
            'number' => $request->number
        ]);
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $mdoctor = Doctor::all();
        return view('admin.doctor.info', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        // dd($doctor);
        return view('admin.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $datadoctor = [];
        $datadoctor['name'] = $request->name;
        $datadoctor['email'] = $request->email;
        $datadoctor['direction'] = $request->direction;
        $datadoctor['number'] = $request->number;
        $doctor->update($datadoctor);
        return redirect()->route('admin.doctor.index')
            ->with('Se creo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        // dd($doctors);
        $doctor->delete();
        return redirect()->route('admin.doctor.index')
            ->with('eliminar', 'ok');
    }
}
