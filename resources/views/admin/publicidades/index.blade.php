@extends('adminlte::page')

@section('title', 'Publicidades')

@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>PUBLICIDADES | </b> Lista de Registros</h5>
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
    <div class="row justify-content-center">
        @foreach ($publicidades as $publicidad)
            <div class="card p-3 m-2" style="width: 15rem;">
                @if ($publicidad->PortadaPub)
                    <img src="{{ Storage::url($publicidad->PortadaPub) }}" class="card-img-top rounded" width="150px"
                        height="150px">
                @else
                    <img src="https://images.pexels.com/photos/7383469/pexels-photo-7383469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top rounded" width="150px" height="150px">
                @endif

                <div class="card-body">
                    <h5 class="card-title"><b> Posición: {{ $publicidad->idPublicidad }}</b></h5>
                    <p class="card-text">{{ $publicidad->DescripcionPub }}</p>
                </div>
                @can('admin.publicidades.edit')
                    <a href="{{ route('admin.publicidades.edit', $publicidad->idPublicidad) }}"
                        class="btn btn-outline-primary">Editar</a>
                @endcan
            </div>
        @endforeach
    </div>


@stop
