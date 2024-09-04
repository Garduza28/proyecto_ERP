@extends('layouts.app', ['page' => __('Invoice'), 'pageSlug' => 'invoice'])
@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <x-forms.input value="{{ $invoice->orden }}" id="orden" type="text" label="Folio" placeholder="Folio" />
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="doctor_id">Doctor Seleccionado</label>
            <!-- Mostrar el nombre del doctor asociado a esta orden -->
            <input type="text" class="form-control" value="{{ $invoice->doctor->name }}" readonly>
        </div>

        <x-forms.input value="{{ $invoice->paciente ?? '' }}" id="paciente" type="text" label="Paciente"
            placeholder="Paciente" />
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <x-forms.input value="{{ $invoice->color ?? '' }}" id="color" type="text" label="Color"
                placeholder="Color" />
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <x-forms.input value="{{ $invoice->unidades ?? '' }}" id="unidades" type="text" label="Unidades"
                    placeholder="Unidades" />
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="trabajo" class="form-label">Indicaciones</label>
                <textarea class="form-control" id="trabajo" rows="3"></textarea>
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
