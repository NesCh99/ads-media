@extends('adminlte::page')

@section('title', 'Deporte')

@section('content_header')


   


    <div class="card bg-dark">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h5><b>Código: </b> {{ $deporte->idDeporte }}</h5>
                    <h1><b>Nombre: </b> <b>{{ $deporte->NombreDep }}</b></h1>
                </div>
                @can('admin.deportes.edit')
                    <div class="col-md-2 ">
                        <a class="btn btn-outline-warning"
                            href="{{ url('/admin/deportes/' . $deporte->idDeporte . '/edit') }}">Editar</a>
                    </div>
                @endcan
            </div>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pr-5 pb-2">
                        <h5><b>Portada del Deporte</b></h5>
                        <figure class="figure">

                            @if ($deporte->PortadaDep)
                                <img src="{{ Storage::url($deporte->PortadaDep) }}"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un deporte"
                                    width="250px" height="250px">
                            @else
                                <img src="https://images.pexels.com/photos/159698/soccer-football-sport-ball-159698.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un deporte"
                                    width="250px" height="250px">
                            @endif


                            <figcaption class="figure-caption">Imagen para la portada del deporte.</figcaption>
                        </figure>





                    </div>
                    <div class="col-md-5">
                        <h5><b>Descripción del Deporte</b></h5>
                        {{ $deporte->DescripcionDep }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Campeonatos </h1>
                </div>

            </div>
        </div>
    </section>


    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="campeonatos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Campeonato</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campeonatos as $index => $campeonato)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $campeonato->NombreCam }}</td>
                            <td>
                                @can('admin.campeonatos.show')
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('admin.campeonatos.show', $campeonato) }}">Ver</a>
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
        $(document).ready(function() {
            $('#campeonatos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@stop
