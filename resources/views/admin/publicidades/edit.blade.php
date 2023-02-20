@extends('adminlte::page')

@section('title', 'Publicidad')

@section('content_header')
    <div class="card bg-dark">
        <div class="card-body">
            <h4><b>EDITAR PUBLICIDAD</b></h4>
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
            <!-- Formulario de laravel colective -->
            {!! Form::model($publicidad, [
                'route' => ['admin.publicidades.update', $publicidad->idPublicidad],
                'method' => 'put',
                'files' => true,
            ]) !!}
            <div class="form-group">
                {!! Form::label('Descripcion', 'Descripción') !!}
                {!! Form::text('Descripcion', $publicidad->DescripcionPub, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese una descripcion de la Publicidad',
                ]) !!}
                @error('Descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('Url', 'Url') !!}
                {!! Form::text('Url', $publicidad->UrlPub, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el Url de la Publicidad',
                ]) !!}
                @error('Url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('Imagen', 'Imagen') !!}
                <div class="row">
                    <div class="col-md-4">
                        

                        <figure class="figure">

                            @if ($publicidad->PortadaPub)
                                <img id="picture" src="{{ Storage::url($publicidad->PortadaPub) }}"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de una publicidad"
                                    width="250px" height="250px">
                            @else
                                <img  id="picture" src="https://images.pexels.com/photos/7383469/pexels-photo-7383469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de una publicidad"
                                    width="250px" height="250px">
                            @endif


                            <figcaption class="figure-caption">Imagen para la portada de una publicidad.</figcaption>
                        </figure>


                    </div>
                    <div-col>
                        <div class="form-group">
                            {!! Form::file('Imagen', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        </div>
                        <p>Tamaño máximo de 5MB</p>
                        @error('Imagen')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div-col>
                </div>
            </div>
            {!! Form::submit('Actualizar Publicidad', ['class' => 'btn btn-outline-primary']) !!}
            {!! Form::close() !!}
        </div>

    </div>

@stop
@section('js')
    <script>
        //Cambia la imagen predeterminada por la que se cargó
        document.getElementById("Imagen").addEventListener('change', cambiarImagen);

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
