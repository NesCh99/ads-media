@extends('adminlte::page')

@section('title', 'Video')

@section('content_header')
    <div class="card bg-dark">
        <div class="card-body">
            <h5><b>EDITAR VIDEO</b></h5>
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
            <!-- Formulario de laravel colective -->
            {!! Form::model($video, ['route' => ['admin.videos.update', $video], 'method' => 'put', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('Nombre', 'Nombre') !!}
                {!! Form::text('Nombre', $video->NombreVid, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre del Video',
                ]) !!}
                @error('Nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('Descripcion', 'Descripcion') !!}
                {!! Form::text('Descripcion', $video->DescripcionVid, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese una descripcion del Video',
                ]) !!}
                @error('Descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('Campeonato', 'Campeonato') !!}
                {!! Form::select('Campeonato', $campeonatos, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Fecha', 'Fecha de Inicio') !!}
                {{ Form::date('Fecha', $video->FechaInicioVid, ['class' => 'form-control']) }}
                @error('Fecha')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('Hora', 'Hora de Inicio') !!}
                {{ Form::time('Hora', $video->HoraInicioVid, ['class' => 'form-control']) }}
                @error('Hora')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('Precio', 'Precio') !!}
                {!! Form::number('Precio', $video->PrecioVid, ['min' => '0', 'class' => 'form-control']) !!}
                @error('Precio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('Portada', 'Portada del Video') !!}
                <div class="row">
                    <div class="col-md-4">
                    


                        <figure class="figure">

                            @if ($video->PortadaVid)
                                <img id="picture" src="{{ Storage::url($video->PortadaVid) }}"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un video"
                                    width="250px" height="250px">
                            @else
                                <img  id="picture" src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un video"
                                    width="250px" height="250px">
                            @endif


                            <figcaption class="figure-caption">Imagen para la portada del video.</figcaption>
                        </figure>


                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::file('Portada', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        </div>
                        <p>Tamaño máximo de 5MB</p>
                        @error('Portada')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            {!! Form::submit('Actualizar Video', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

    </div>


@stop
@section('js')
    <script>
        //Cambia la imagen predeterminada por la que se cargó
        document.getElementById("Portada").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
