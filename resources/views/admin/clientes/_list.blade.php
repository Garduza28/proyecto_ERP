
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th width="30%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    {{-- <td>pedo</td> --}}
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->email }}</td>
                    {{-- <td>pedo</td> --}}
                    {{-- <td>pedo</td> --}}


                    {{-- @endforeach --}}

                    <td>
                        <div class="d-flex flex-row">
                            <a class="btn btn-warning" href="{{ route('admin.clientes.edit', [$cliente->id]) }}"
                                role="button">Editar
                                Material</a>
                                <a class="btn btn-info" href="{{ route('admin.clientes.show', ['clientes' => $cliente->id]) }}"
                                    role="button">Informacion usuario</a>
                                <form action="{{ route('admin.clientes.destroy', [$cliente]) }}" class="alerta" method="POST">
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
