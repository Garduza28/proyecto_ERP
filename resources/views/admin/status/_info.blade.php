@csrf

<!-- Sección del folio -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <x-forms.input value="{{ $invoice->orden }}" id="orden" type="text" label="Folio" placeholder="Folio" />
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Sección del doctor seleccionado -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="doctor_id">Doctor Seleccionado</label>
        <!-- Verifica si $invoice->doctor no es null antes de mostrar su nombre -->
        @if ($invoice->doctor)
            <input type="text" class="form-control" value="{{ $invoice->doctor->name }}" readonly>
        @else
            <input type="text" class="form-control" value="Doctor no seleccionado" readonly>
        @endif
    </div>
</div>

<!-- Sección para seleccionar el estado del trabajo -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="status">Estado del trabajo</label>
        <select class="form-control" id="status" name="status">
            <option value="no_empezado">No empezado</option>
            <option value="en_proceso">En proceso</option>
            <option value="terminado">Terminado</option>
        </select>
    </div>
</div>
