@extends('layouts.app', ['page' => __('Clientes'), 'pageSlug' => 'cliente'])

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Información del Cliente</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Número de Teléfono</th>
                                <th>Email</th>
                                <th>Nombre de la Empresa</th>
                                <th>Cargo en la Empresa</th>
                                <th>Dirección de la Empresa</th>
                                <th>Número de Teléfono de la Empresa</th>
                                <th>Email de la Empresa</th>
                                <th>Preferencia de Contacto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $clientes->name }}</td>
                                <td>{{ $clientes->direccion }}</td>
                                <td>{{ $clientes->numtel }}</td>
                                <td>{{ $clientes->email }}</td>
                                <td>{{ $clientes->name_empresa }}</td>
                                <td>{{ $clientes->cargo_empresa }}</td>
                                <td>{{ $clientes->direccion_empresa }}</td>
                                <td>{{ $clientes->num_empresa }}</td>
                                <td>{{ $clientes->email_empresa }}</td>
                                <td>{{ $clientes->preferencia_contacto }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
