@extends('layouts.app', ['page' => __('Clientes'), 'pageSlug' => 'cliente'])

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar Cliente</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.clientes.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="numtel">Número de Teléfono</label>
                            <input type="text" name="numtel" id="numtel" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="name_empresa">Nombre de la Empresa</label>
                            <input type="text" name="name_empresa" id="name_empresa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cargo_empresa">Cargo en la Empresa</label>
                            <input type="text" name="cargo_empresa" id="cargo_empresa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="direccion_empresa">Dirección de la Empresa</label>
                            <input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="num_empresa">Número de Teléfono de la Empresa</label>
                            <input type="text" name="num_empresa" id="num_empresa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email_empresa">Email de la Empresa</label>
                            <input type="email" name="email_empresa" id="email_empresa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="preferencia_contacto">Preferencia de Contacto</label>
                            <select name="preferencia_contacto" id="preferencia_contacto" class="form-control">
                                <option value="Telefono">Teléfono</option>
                                <option value="Email">Email</option>
                                <option value="Presencial">Presencial</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
