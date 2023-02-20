@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>Videos | </b> Lista de Comentarios</h5>
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
            <div class="w-full  rounded-lg shadow-xs" style="padding-top: 10px">
                <div class="w-full">
                    <table id="comments" class="table table-striped w-full whitespace-no-wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del Cliente</th>
                                <th>Correo Electrónico del Cliente</th>
                                <th>Código de Video</th>
                                <th>Nombre de Video</th>
                                <th>Comentario</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td><small> {{ $comment->idComentario }} </small> </td>
                                    <td> <small>{{ $comment->cliente->name }}</small> </td>
                                    <td><small>{{ $comment->cliente->email }}</small> </td>
                                    <td><small>{{ $comment->idVideo }}</small> </td>
                                    <td><small>
                                            @foreach ($videos as $video)
                                                @if ($comment->idVideo == $video->idVideo)
                                                    {{ $video->NombreVid }}
                                                @endif
                                            @endforeach

                                        </small> </td>
                                    <td><small >{{ $comment->body }}</small> </td>
                                    <td>
                                        @can('admin.comments.destroy')
                                            
                                       
                                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="delete">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger mx-2"
                                                onclick="return confirm('¿Desea eliminar?')">
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
        </div>
    </div>
@stop



@section('css')



    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/bulma.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/dataTables.bulma.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/jquery.dataTables.min.css') }}">




@stop



@section('js')
    <script src="{{ asset('/js/admin/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/admin/dataTables.bulma.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#comments').DataTable({
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
