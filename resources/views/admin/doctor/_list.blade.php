<div>
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Doctores</th>
                {{-- <th>Paciente</th> --}}
                <th width="50%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    {{-- <td>pedo</td> --}}
                    <td>Doctor: {{ $doctor->name }}</td>
                    {{-- <td>pedo</td> --}}


                    {{-- @endforeach --}}

                    <td>
                        <div class="d-flex flex-row">
                            <a class="btn btn-warning" href="{{ route('admin.doctor.edit', [$doctor->id]) }}"
                                role="button">Editar
                                usuario</a>
                            <a class="btn btn-info" href="{{ route('admin.doctor.show', ['doctor' => $doctor->id]) }}"
                                role="button">Informacion usuario</a>
                            <form action="{{ route('admin.doctor.destroy', [$doctor]) }}" class="alerta" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">ELiminar</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

</div>
