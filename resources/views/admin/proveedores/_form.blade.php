@extends('layouts.app', ['page' => __('Proveedores'), 'pageSlug' => 'proveedor'])

@section('content')

    <div class="container">
        <h2>Crear Proveedor</h2>
        <form method="POST"  action="{{ route('admin.proveedor.store') }}">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('admin.proveedor.index') }}" role="button">Regresar</a>
            </div>
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="direction">Dirección:</label>
                <input type="text" class="form-control" id="direction" name="direction" required>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" required>
            </div>
            <div class="form-group">
                <label for="number">Número de Teléfono:</label>
                <input type="text" class="form-control" id="number" name="number">
            </div>
            <div class="form-group">
                <label for="rfc">RFC:</label>
                <input type="text" class="form-control" id="rfc" name="rfc">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" class="form-control" id="empresa" name="empresa">
            </div>
            <div class="form-group">
                <label for="postal">Código Postal:</label>
                <input type="text" class="form-control" id="postal" name="postal">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
