@extends('adminlte::page')

@section('title', 'Video')

@section('content_header')
    <div class="card bg-dark">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h5><b>Código: </b> {{ $video->idVideo }}</h5>
                    <h1><b>Nombre: </b><b>{{ $video->NombreVid }}</b></h1>
                    <p><b>Deporte: </b><b>{{ $deporte->NombreDep }}</b> | {{ $campeonato->NombreCam }}</p>
                    <a class="btn btn-outline-info"
                        href="{{ url('/admin/videos/' . $video->idVideo . '/livestream') }}">Transmisión
                    </a>
                    
                </div>
                @can('admin.videos.edit')
                    <div class="col-md-1">
                        <a class="btn btn-outline-warning"
                            href="{{ url('/admin/videos/' . $video->idVideo . '/edit') }}">Editar</a>
                    </div>
                @endcan
                @can('admin.videos.destroy')
                    <div class="col-md-1">
                        <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="delete">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">
                                Eliminar
                            </button>
                        </form>
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
                <div class="row pb-3">
                    <div class="col-md-4">
                        <h5><b>Fecha de Inicio: </b>{{ $video->getReadableDate() }}</h5>
                    </div>
                    <div class="col-md-4">
                        @if (is_null($video->HoraInicioVid))
                            <h5><b>Hora de Inicio: </b>Sin Asignar</h5>
                        @else
                            <h5><b>Hora de Inicio: </b>{{ $video->getReadableHour() }}</h5>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5><b>Precio: </b>${{ $video->PrecioVid }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-5 pb-2">


                        <h5><b>Portada del Video</b></h5>

                        <figure class="figure">


                            @if ($video->PortadaVid)
                                <img src="{{ Storage::url($video->PortadaVid) }}"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un video"
                                    width="250px" height="250px">
                            @else
                                <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un video"
                                    width="250px" height="250px">
                            @endif
                            <figcaption class="figure-caption">Imagen para la portada del video.</figcaption>
                        </figure>


                    </div>
                    <div class="col-md-5">
                        <h5><b>Descripción del Video</b></h5>
                        {{ $video->DescripcionVid }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
