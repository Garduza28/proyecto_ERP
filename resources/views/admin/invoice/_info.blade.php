@extends('layouts.app', ['page' => __('Invoice'), 'pageSlug' => 'invoice'])
@csrf
<div>
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Folio</th>
                <th>Doctor</th>
                <th>Paciente</th>
                <th>Color</th>
                <th>Indicacion</th>
                <th>Servicio</th>
                <th>Fecha en la que se registro</th>
                <th>Fecha en la que se modifico</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>{{ $invoice->orden }}</td>
                    <td>{{ $invoice->doctor->name }}</td>
                    <td>{{ $invoice->paciente }}</td>
                    <td>{{ $invoice->color }}</td>
                    <td>{{ $invoice->trabajo }}</td>
                    <td>{{ $invoice->materiales_total }}</td>
                    <td>{{ $invoice->material_recepcion }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->updated_at }}</td>

                </tr>
        </tbody>

    </table>

</div>
