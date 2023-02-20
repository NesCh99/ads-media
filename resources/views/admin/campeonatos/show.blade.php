@extends('adminlte::page')

@section('title', 'Campeonato')

@section('content_header')


 


    <div class="card bg-dark">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h5><b>Código: </b> {{ $campeonato->idCampeonato }}</h5>
                    <h1><b>Nombre: </b><b>{{ $campeonato->NombreCam }}</b></h1>
                    <p><b>Deporte: </b>{{ $deporte->NombreDep }}</p>
                </div>
                @can('admin.campeonatos.edit')
                    <div class="col-md-2 ">
                        <a class="btn btn-outline-warning"
                            href="{{ url('/admin/campeonatos/' . $campeonato->idCampeonato . '/edit') }}">Editar</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pr-5 pb-2">
                        <h5><b>Portada del Campeonato</b></h5>

                        <figure class="figure">


                            @if ($campeonato->PortadaCam)
                                <img src="{{ Storage::url($campeonato->PortadaCam) }}"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un campeonato"
                                    width="250px" height="250px">
                            @else
                                <img src="https://images.pexels.com/photos/4219812/pexels-photo-4219812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un campeonato"
                                    width="250px" height="250px">
                            @endif
                            <figcaption class="figure-caption">Imagen para la portada del campeonato.</figcaption>
                        </figure>



                    </div>
                    <div class="col-md-5">
                        <h5><b>Descripción del Campeonato</b></h5>
                        {{ $campeonato->DescripcionCam }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Videos </h1>
                </div>

            </div>
        </div>
    </section>


    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="videos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Video</th>
                        <th>Fecha de Inicio</th>
                        <th>Precio del Video ($)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $index => $video)
                        <tr>
                            <td><b>{{ $index + 1 }}</b></td>
                            <td>{{ $video->NombreVid }}</td>
                            <td>{{ $video->FechaInicioVid }}</td>
                            <td>{{ $video->PrecioVid }}$</td>
                            <td>
                                @can('admin.videos.show')
                                    <a class="btn btn-outline-primary" href="{{ route('admin.videos.show', $video) }}">Ver</a>
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
            $('#videos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@stop
