@extends('layouts.app', ['page' => __('Proveedores'), 'pageSlug' => 'proveedor'])
@section('content')
    <div class="text-center">
        <h5>Crear Proveedor:</h5>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Crear Proveedor</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('admin.proveedor.index') }}" role="button">Regresar</a>
                </div>

            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.proveedor.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.proveedores._form')
            <button type="submit" class="btn btn-primary ml-3">Agregar Proveedor</button>
        </form>
    @endsection
