@extends('adminlte::page')
@section('title', 'Publicidades')
@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>Informacion de la Empresa </h5>
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
    {{-- informacion genera de la empresa  --}}
    <div class="card">
        <div class="card-body">
            <!-- Formulario de laravel colective -->
            {!! Form::model($company, [
                'route' => ['admin.company.update', $company],
                'method' => 'put',
                'files' => true,
                'class' => 'actualizar',
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre de la Empresa') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del about']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slogan', 'Slogan de la Empresa') !!}
                {!! Form::text('slogan', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese un slogan para el about',
                ]) !!}
                @error('slogan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('information', '¿Qué hacemos?') !!}
                {!! Form::textarea('information', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese información sobre lo que hace su Empresa',
                ]) !!}
                @error('information')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>




            <div class="form-group">
                {!! Form::label('image', 'Portada del Empresa') !!}
                <div class="row">
                    <div class="col-md-4">

                        <figure class="figure">

                            @if ($company->image)
                                <img id="company" src="{{ Storage::url($company->image) }}"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un campeonato"
                                    width="250px" height="250px">
                            @else
                                <img id="company"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                                    class="figure-img img-fluid rounded img-thumbnail" alt="Portada de un campeonato"
                                    width="250px" height="250px">
                            @endif


                            <figcaption class="figure-caption">Imagen para la Portada de la Empresa.</figcaption>
                        </figure>


                    </div>
                    <div-col>
                        <div class="form-group">
                            {!! Form::file('image', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        </div>
                        <p>Tamaño máximo de 5MB</p>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div-col>
                </div>
            </div>


            @can('admin.company.update')
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            @endcan
            {!! Form::close() !!}
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Información de las Condiciones de uso y las Políticas de privacidad.
                    </h3>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                                aria-selected="true">Condiciones de uso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                                href="#custom-content-below-profile" role="tab"
                                aria-controls="custom-content-below-profile" aria-selected="false">Políticas de
                                privacidad</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        @foreach ($company->terms as $term)
                            @if ($term->id == 1)
                                <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel"
                                    aria-labelledby="custom-content-below-home-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Formulario de laravel colective -->
                                            {!! Form::model($term, [
                                                'route' => ['admin.terms.update', $term],
                                                'method' => 'put',
                                                'class' => 'actualizar-term',
                                            ]) !!}
                                            <div class="form-group">
                                                {!! Form::label('body', 'Editar') !!}
                                                {!! Form::textarea('body', null, [
                                                    'class' => 'form-control',
                                                ]) !!}
                                                @error('body')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @can('admin.company.update')
                                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                            @endcan
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                    aria-labelledby="custom-content-below-profile-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Formulario de laravel colective -->
                                            {!! Form::model($term, [
                                                'route' => ['admin.terms.update', $term],
                                                'method' => 'put',
                                                'class' => 'actualizar-policy',
                                            ]) !!}
                                            <div class="form-group">
                                                {!! Form::label('body1', 'Editar') !!}
                                                {!! Form::textarea('body1', $term->body, [
                                                    'class' => 'form-control',
                                                ]) !!}
                                                @error('body1')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @can('admin.company.update')
                                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                            @endcan
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/translations/de.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body1'))
            .catch(error => {
                console.error(error);
            });



        //Cambia la imagen predeterminada por la que se cargó
        document.getElementById("image").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("company").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.actualizar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Está segur@?',
                text: "La información que va actualizar se ha considerado como crítica",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });


        $('.actualizar-term').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Está segur@?',
                text: "La información que va actualizar se ha considerado como crítica",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });


        $('.actualizar-policy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Está segur@?',
                text: "La información que va actualizar se ha considerado como crítica",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });
    </script>
@stop
