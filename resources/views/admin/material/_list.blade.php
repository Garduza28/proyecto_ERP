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
            @foreach ($materials as $material)
                <tr>
                    {{-- <td>pedo</td> --}}
                    <td>{{ $material->material }}</td>
                    <td>{{ $material->precio }}</td>
                    {{-- <td>pedo</td> --}}
                    {{-- <td>pedo</td> --}}


                    {{-- @endforeach --}}

                    <td>
                        <div class="d-flex flex-row">
                            <a class="btn btn-warning" href="{{ route('admin.material.edit', [$material->id]) }}"
                                role="button">Editar
                                Material</a>
                                <form action="{{ route('admin.material.destroy', [$material]) }}" class="alerta" method="POST">
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
