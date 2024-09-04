@extends('layouts.app', ['page' => __('Proveedores'), 'pageSlug' => 'proveedor'])

@section('content')
    <div class="container">
        <h2>Editar Proveedor</h2>
        <form method="POST" action="{{ route('admin.proveedor.update', $proveedor->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $proveedor->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $proveedor->email }}" required>
            </div>
            <div class="form-group">
                <label for="direction">Dirección:</label>
                <input type="text" class="form-control" id="direction" name="direction" value="{{ $proveedor->direction }}" required>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $proveedor->ciudad }}" required>
            </div>
            <div class="form-group">
                <label for="number">Número de Teléfono:</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ $proveedor->number }}">
            </div>
            <div class="form-group">
                <label for="rfc">RFC:</label>
                <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $proveedor->rfc }}">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" class="form-control" id="empresa" name="empresa" value="{{ $proveedor->empresa }}">
            </div>
            <div class="form-group">
                <label for="postal">Código Postal:</label>
                <input type="text" class="form-control" id="postal" name="postal" value="{{ $proveedor->postal }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
