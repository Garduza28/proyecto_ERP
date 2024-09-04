@extends('layouts.app', ['page' => __('Invoice'), 'pageSlug' => 'invoice'])
@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <x-forms.input value="{{ $invoice->invoice ?? '' }}" id="orden" type="text"
            label="Ingrese el numero de orden" placeholder="Numero de Orden" />
        @error('orden')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <div class="mb-3">
                <label for="doctor_id">Seleccione el Doctor</label>
                <select class="form-select" name="doctor_id" id="doctor_id">
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('doctor_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <x-forms.input value="{{ $invoice->invoice ?? '' }}" id="paciente" type="text"
                    label="Ingrese el nombre del paciente" placeholder="Ingrese el paciente" />
                @error('paciente')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div>
                    <button class="btn btn-secondary" id="agregarMatBtnElem" type="button">Agregar Material</button>
                    <div name="input_wrapper" id="input_wrapper">
                        <input type="hidden" name="materiales_totales" id="materiales_totales_input">

                    </div>
                </div>

                @push('javascript')
                <script>
                    let materiales_total = [];

                    let materials = {{ Js::from($materials) }};

                    let test = document.getElementById("agregarMatBtnElem");
                    console.log(test);
                    test.addEventListener("click", function() {
                        let GenRandomId = Math.floor((Math.random() * 10000) + 1);
                        let optionHtml = ``;
                        materials.forEach(function(material) {
                            optionHtml += `<option data-precio="${material.precio}" value="${material.id}">${material.material}</option>`;
                        });
                        let input_text = `
                        <div id="container-${GenRandomId}" class="rounded-0 form-control col-12" >
                            <select name="material_id[]" id="${GenRandomId}">
                                ${optionHtml}
                            </select>
                            <input id="input-precio-${GenRandomId}" name="precio_total[]" placeholder="Precio" value="" readonly />
                            <input id="input-unidades-${GenRandomId}" name="unidades[]" placeholder="Unidades" value="1" />
                            <input id="input-total-${GenRandomId}" name="precio_total[]" placeholder="Costo Total" value="$" readonly />
                        </div>
                        `;
                        let input_wraper = document.getElementById('input_wrapper');
                        input_wraper.insertAdjacentHTML('beforeend', input_text);

                        // Llama a la función para mostrar el precio automáticamente
                        mostrarPrecio(GenRandomId);

                        document.getElementById(GenRandomId).addEventListener("change", function(event) {
                            mostrarPrecio(GenRandomId); // Mostrar el precio al cambiar el material
                            calcularTotal(GenRandomId); // Recalcular el costo total al cambiar el material
                        });

                        document.getElementById(`input-unidades-${GenRandomId}`).addEventListener("input", function() {
                            calcularTotal(GenRandomId); // Recalcular el costo total cuando cambia el número de unidades
                        });

                        // Recalcular el costo total al agregar un nuevo material
                        calcularTotal(GenRandomId);
                    });

                    // Función para mostrar el precio automáticamente
                    function mostrarPrecio(GenRandomId) {
                        let selectElement = document.getElementById(GenRandomId);
                        let selectedOption = selectElement.options[selectElement.selectedIndex];
                        let precioMaterial = selectedOption.dataset.precio;
                        document.getElementById(`input-precio-${GenRandomId}`).value = precioMaterial;
                    }

                    // Función para calcular el total
                    function calcularTotal(GenRandomId) {
                        let precioMaterial = parseFloat(document.getElementById(`input-precio-${GenRandomId}`).value);
                        let unidadesMaterial = parseFloat(document.getElementById(`input-unidades-${GenRandomId}`).value);
                        let costoTotal = isNaN(precioMaterial) || isNaN(unidadesMaterial) ? '' : precioMaterial * unidadesMaterial;
                        document.getElementById(`input-total-${GenRandomId}`).value = costoTotal === '' ? '' : '$' + costoTotal.toFixed(2);
                    }

                    // Antes de enviar el formulario, actualizar el valor del campo oculto con el array de materiales
                    document.getElementById('agregarMatBtnElem').addEventListener('submit', function() {
                        document.getElementById("materiales_totales_input").value = JSON.stringify(materiales_total);
                    });
                </script>

                @endpush

                <x-forms.input value="{{ $invoice->invoice ?? '' }}" id="color" type="text" label="Ingrese el color"
                    placeholder="Ingrese el color" />
                @error('color')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="trabajo" class="form-label">Indicaciones</label>
                    <textarea class="form-control" name="trabajo" id="trabajo" rows="4"></textarea>
                </div>
            </div>
