@extends('layouts.app', ['page' => __('Materiales'), 'pageSlug' => 'materiales'])
@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <x-forms.input  value="{{ $material->material }}" id="material" type="text" label="Material"
            placeholder="Material" />
        @error('material')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <x-forms.input value="{{ $material->precio ?? '' }}" id="precio" type="text" label="Precio"
                placeholder="Precio" />
            @error('precio')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
