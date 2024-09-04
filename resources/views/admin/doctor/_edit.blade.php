@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <x-forms.input  value="{{ $doctor->name }}" id="name" type="text" label="Su Nombre"
            placeholder="Nombre" />
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <x-forms.input value="{{ $doctor->email ?? '' }}" id="email" type="text" label="Su email"
                placeholder="Email" />
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <x-forms.input value="{{ $doctor->direction ?? '' }}" id="direction" type="text" label="Su direccion"
                    placeholder="Direccion" />
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <x-forms.input value="{{ $doctor->number ?? '' }}" id="number" type="text" label="Su Numero"
                        placeholder="Numero" />
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
