@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <x-forms.input value="{{ $doctor->doctor ?? '' }}" id="name" type="text"
            label="Ingrese el nombre del Doctor" placeholder="Nombre del Doctor" />
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <x-forms.input value="{{ $doctor->doctor ?? '' }}" id="email" type="email"
            label="Ingrese el email" placeholder="Ingrese el Email" />
        @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <x-forms.input value="{{ $doctor->doctor ?? '' }}" id="direction" type="text"
            label="Ingrese su direccion" placeholder="Ingrese su direccion" />
        @error('direction')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <x-forms.input value="{{ $doctor->doctor ?? '' }}" id="number" type="text"
            label="Ingrese su numero telefonico" placeholder="Numero telefonico" />
        @error('number')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>
</div>
