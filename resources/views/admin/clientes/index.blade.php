@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<div class="card-header bg-dark">
    <div class="row align-items-center">
        <h5><b>CLIENTES | </b> Lista de Registros</h5>
    </div>
</div>


@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="clientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Cliente</th>
                        <th>Correo Electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $index => $cliente)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$cliente->name}}</td>
                            <td>{{$cliente->email}}</td>
                            @can('admin.clientes.show')
                                <td>
                                    <a class="btn btn-outline-primary" href="{{route('admin.clientes.show', $cliente)}}">
                                    Ver
                                    </a>
                                </td>
                            @endcan
                        </tr>
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
        $('#clientes').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@stop