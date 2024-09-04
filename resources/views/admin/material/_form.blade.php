@extends('layouts.app', ['page' => __('Materiales'), 'pageSlug' => 'materiales'])
@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">

        <x-forms.input value="{{ $material->material ?? '' }}" id="material" type="text"
            label="Ingrese el nombre del material" placeholder="Nombre del material" />
        @error('material')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <x-forms.input value="{{ $material->precio ?? '' }}" id="precio" type="text" value="$" label="Precio"
            placeholder="Ingrese el Precio" />
        @error('precio')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>
</div>
