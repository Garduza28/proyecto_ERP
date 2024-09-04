@extends('layouts.app', ['page' => __('Estatus'), 'pageSlug' => 'status'])
@section('content')
    <div class="text-center">
        <h5>Crear Status:</h5>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Crear Status</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('admin.status.index') }}" role="button">Regresar</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.status.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.status._form')
            <button type="submit" class="btn btn-primary ml-3">Status usuario</button>
        </form>
    @endsection