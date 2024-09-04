@extends('layouts.app', ['page' => __('Doctores'), 'pageSlug' => 'doctor'])
@section('content')
    <div class="text-center">
        <h5>Informacion del Doctor:</h5>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Informacion deL Doctor</h2>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.doctor.show', ['doctor' => $doctor->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('put')
            @include('admin.doctor._info')
        </form>
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('admin.doctor.index') }}" role="button">Regresar</a>
        </div>
    @endsection
