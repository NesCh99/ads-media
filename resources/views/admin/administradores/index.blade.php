@extends('adminlte::page')

@section('title', 'Administradores')

@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>ADMINISTRADORES | </b> Lista de Registros</h5>
        </div>
    </div>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table" id="administradores">
                <thead>
                    <tr>
                        <th>Nombre del Administrador</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $administrador)
                        @if($administrador->id != Auth::user()->id)
                        <tr>
                            <td>{{ $administrador->name }}</td>
                            <td>{{ $administrador->email }}</td>
                            <td><span
                                    class="badge badge-info">{{ str_replace(['"', '[', ']'], '', $administrador->getRoleNames()) }}</span>
                            </td>
                            <td>
                                @can('admin.administradores.edit')
                                    <a class="btn btn-outline-warning"
                                        href="{{ url('/admin/administradores/' . $administrador->id . '/edit') }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('admin.administradores.destroy')
                                    <form action="{{ route('admin.administradores.destroy', $administrador->id) }}" method="POST" class="btn delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger show-alert">
                                            Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
     
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#administradores').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
    
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Eliminar',
            text: "No podrá deshacer esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>

@stop
