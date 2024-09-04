@extends('layouts.app', ['page' => __('Invoice'), 'pageSlug' => 'invoice'])

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Informacion de la Orden</h2>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

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
                        <th>Unidades</th>
                        <th>Precio Total</th>
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
                        <td>
                            @foreach (json_decode($invoice->materiales_total, true) as $material)
                                <div>{{ $material['material'] }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach (json_decode($invoice->materiales_total, true) as $material)
                                <div>{{ $material['unidades'] }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach (json_decode($invoice->materiales_total, true) as $material)
                                <div>${{ $material['precio_total'] }}</div>
                            @endforeach
                        </td>
                        <td>{{ $invoice->created_at }}</td>
                        <td>{{ $invoice->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <img src="https://brandslogos.com/wp-content/uploads/images/large/warner-bros-logo.png" alt="Logo" class="logo"> <!-- Agrega la ruta de tu logo -->
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('admin.invoice.index') }}" role="button">Regresar</a>
        </div>

        <!-- Botón para generar PDF -->
        <form action="{{ route('admin.invoice.pdf', $invoice) }}" method="GET">
            <button type="submit" class="btn btn-info ml-3 mt-3">Generar PDF</button>
        </form>
    </div>
@endsection
