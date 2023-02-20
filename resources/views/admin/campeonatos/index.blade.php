@extends('adminlte::page')

@section('title', 'Campeonatos')

@section('content_header')
<div class="card-header bg-dark">
    <div class="row align-items-center">
        <h5><b>CAMPEONATOS | </b> Lista de Registros</h5>
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
            <table class="table table-striped" id="campeonatos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Campeonato</th>
                        <th>Fecha de Inicio</th>
                        <th>Descuento (%)</th>
                        <th class="d-flex justify-content-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campeonatos as $index => $campeonato)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$campeonato->NombreCam}}</td>
                            <td>{{$campeonato->FechaInicioCam}}</td>
                            <td>{{$campeonato->DescuentoCam.'%'}}</td>
                            <td class="d-flex justify-content-center">
                                @can('admin.campeonatos.show')
                                    <a class="btn btn-outline-primary mx-2" href="{{route('admin.campeonatos.show', $campeonato)}}">Ver</a>
                                @endcan
                                @can('admin.campeonatos.edit')
                                    <a class="btn btn-outline-warning mx-2" href="{{url('/admin/campeonatos/'.$campeonato->idCampeonato.'/edit')}}">Editar</a>
                                @endcan
                                @can('admin.campeonatos.destroy')
                                    <form action="{{route('admin.campeonatos.destroy', $campeonato)}}" method="POST" class="delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger mx-2">
                                            Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
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
        $('#campeonatos').DataTable({
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
    