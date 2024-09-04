
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Material</th>
                <th>precio</th>
                <th width="30%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    {{-- <td>pedo</td> --}}
                    <td>{{ $proveedor->name }}</td>
                    <td>{{ $proveedor->email }}</td>
                    {{-- <td>pedo</td> --}}
                    {{-- <td>pedo</td> --}}


                    {{-- @endforeach --}}

                    <td>
                        <div class="d-flex flex-row">
                            <a class="btn btn-warning" href="{{ route('admin.proveedor.edit', [$proveedor->id]) }}"
                                role="button">Editar
                                Material</a>
                                <form action="{{ route('admin.proveedor.destroy', [$proveedor]) }}" class="alerta" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger formulario-eliminar">ELiminar</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

</div>
