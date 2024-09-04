@extends('layouts.app', ['page' => __('Estatus'), 'pageSlug' => 'status'])
@section('content')
    <div class="text-center">
        <h5>Status</h5>
    </div>
    <div>
        <a href="{{ '/admin/status/create' }}" class="btn btn-primary " role="button" >Crear Status</a>
        <a href="{{ '/admin/user/' }}" class="btn btn-success " role="button" >Administrador de Usuario</a>
        <a href="{{ '/admin/doctor/' }}" class="btn btn-success " role="button" >Administrar Doctores</a>
        <a href="{{ '/admin/invoice/' }}" class="btn btn-success " role="button" >Administrar Ordenes</a>
        <a href="{{ '/admin/material/' }}" class="btn btn-success " role="button" >Administrar Materiales</a>

    </div>
    @include('admin.status._list')
    <script>
        function myFunction() {
            var input, filter, tr, td, a, i, txtValue;
            input = document.getElementById("orden");
            filter = input.value.toUpperCase();
            tr = document.getElementById("orden");
            td = tr.getElementsByTagName("td");
            for (i = 0; i < td.length; i++) {
                a = td[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    td[i].style.display = "";
                } else {
                    td[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
@section('javascript')
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'La orden Ha sido Eliminada.',
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
