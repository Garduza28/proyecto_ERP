@extends('layouts.app', ['page' => __('Materiales'), 'pageSlug' => 'materiales'])
@section('content')
    <div class="text-center">
        <h5>Editar Material:</h5>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Editar Material</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('admin.material.index') }}" role="button">Regresar</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.material.update', ['material' => $material->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @include('admin.material._edit')
            <button type="submit" class="btn btn-primary ml-3">Editar material</button>
        </form>
    @endsection
