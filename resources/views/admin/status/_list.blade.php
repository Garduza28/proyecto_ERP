<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Numero de orden</th>
                <th>Doctor</th>
                <th>Estatus</th>
                <th width="30%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>Orden: {{ $invoice->orden }}</td>
                    {{-- Mostrar el nombre del doctor asociado a esta factura --}}
                    <td>
                        @if ($invoice->doctor)
                            Doctor: {{ $invoice->doctor->name }}
                        @else
                            Doctor no asociado
                        @endif
                    </td>
                    <td>Paciente: {{ $invoice->paciente }}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a class="btn btn-warning"
                                href="{{ route('admin.status.edit', ['invoice' => $invoice->id]) }}"
                                role="button">Editar Orden</a>
                            <a class="btn btn-info"
                                href="{{ route('admin.status.show', ['invoice' => $invoice->id]) }}"
                                role="button">Informacion de la Orden</a>
                            <form action="{{ route('admin.status.destroy', [$invoice]) }}" class="alerta"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger formulario-eliminar">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
