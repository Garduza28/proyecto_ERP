@csrf
<div>
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Su Nombre</th>
                <th>Su Email</th>
                <th>Su Direccion</th>
                <th>Su Numero de Telefono</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->direction }}</td>
                    <td>{{ $doctor->number }}</td>
                        </div>
                    </td>
                </tr>
        </tbody>

    </table>

</div>
