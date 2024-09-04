@extends('layouts.app', ['page' => __('Clientes'), 'pageSlug' => 'cliente'])
@section('content')
    <div class="text-center">
        <h5>Agregar Cliente:</h5>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Agregar Cliente</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('admin.clientes.index') }}" role="button">Regresar</a>
                </div>

            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.clientes.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.clientes._form')
        </form>
    @endsection
