<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice PDF</title>
    <style>
        /* Estilos CSS para tu factura PDF */
        body {
            font-family: Arial, sans-serif;
            background-image: url('ruta/a/tu/imagen/fondo.jpg'); /* Agrega la ruta de la imagen de fondo */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0; /* Asegura que no haya margen alrededor del cuerpo de la hoja */
            padding: 0; /* Asegura que no haya relleno alrededor del cuerpo de la hoja */
        }
        .container {
            position: relative; /* Establece la posición relativa para permitir posicionamiento absoluto dentro de este contenedor */
            width: 100%;
            max-width: 800px; /* ajusta el ancho máximo según tu necesidad */
            margin: 0 auto; /* centra el contenedor horizontalmente */
            padding: 20px; /* añade un espacio de relleno alrededor del contenedor */
            box-sizing: border-box; /* asegura que el espacio de relleno y el borde se incluyan en el ancho total */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px; /* ajusta el tamaño del logo según tu necesidad */
        }
        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed; /* fija el ancho de la tabla para evitar que se expanda más allá de su contenedor */
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* permite que el texto se ajuste automáticamente al ancho de la celda */
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="black/img/lala.png" alt="Logo" class="logo"> <!-- Agrega la ruta de tu logo -->
        <div class="header">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Doctor</th>
                    <th>Paciente</th>
                    <th>Color</th>
                    <th>Indicación</th>
                    <th>Servicio</th>
                    <th>Unidades</th>
                    <th>Precio Total</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Modificación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->orden }}</td>
                    <td>{{ $invoice->doctor->name }}</td>
                    <td>{{ $invoice->paciente }}</td>
                    <td>{{ $invoice->color }}</td>
                    <td>{{ $invoice->trabajo }}</td>
                    <td>
                        @foreach (json_decode($invoice->materiales_total, true) as $material)
                            {{ $material['material'] }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach (json_decode($invoice->materiales_total, true) as $material)
                            {{ $material['unidades'] }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach (json_decode($invoice->materiales_total, true) as $material)
                            ${{ $material['precio_total'] }} <br>
                        @endforeach
                    </td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->updated_at }}</td>
                </tr>
            </tbody>
        </table>
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('admin.invoice.index') }}" role="button">Regresar</a>
        </div>
    </div>
</body>
</html>
