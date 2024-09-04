@extends('layouts.app', ['page' => __('Clientes'), 'pageSlug' => 'cliente'])
@section('content')
    <div class="text-center">
        <h5>Clientes</h5>
    </div>
    <div>
        <a href="{{ '/admin/clientes/create' }}" class="btn btn-primary " role="button">Agregar Cliente</a>
        <a href="{{ '/admin/doctor/' }}" class="btn btn-success " role="button">Administrar Doctor</a>
        <a href="{{ '/admin/user/' }}" class="btn btn-success " role="button">Administrador de Usuario</a>
        <a href="{{ '/admin/status/' }}" class="btn btn-success " role="button">Administrador de Status</a>
        <a href="{{ '/admin/invoice/' }}" class="btn btn-success " role="button">Administrar Ordenes</a>
    </div>
    @include('admin.clientes._list')
@endsection
@section('javascript')
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El Material Ha sido Eliminado.',
                'success'
            )
        </script>
    @endif

    <script>
        delete_forms = document.querySelectorAll('.alerta')

        delete_forms.forEach(function(delete_form) {
            delete_form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Esta seguro??',
                    text: "Ya no se puede revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Borrar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            })
        })
    </script>
@endsection
