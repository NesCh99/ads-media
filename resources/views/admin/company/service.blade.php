@extends('adminlte::page')
@section('title', 'servicees')
@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>Informacion de servicios de la Empresa</h5>
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
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Actualizar Información de los Servicios.
                    </h3>
                </div>
                <div class="card-body">
                    @can('admin.services.create')
                        
                    
                    <!-- Button trigger modal -->
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                        Agregar Servicio
                    </a>
                    @endcan

                    <hr>
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($company->services as $service)
                                    @if ($service->id == 1)
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                            href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                            aria-selected="true">
                                            @foreach ($icons as $icon)
                                                @if ($icon['id'] == $service->icon)
                                                    <small class="mr-2">
                                                        <i class="{{ $icon['icon'] }}"></i>
                                                    </small>
                                                @endif
                                            @endforeach
                                            <small>
                                                {{ $service->name }}
                                            </small>
                                        </a>
                                    @else
                                        <a class="nav-link" id="vert-tabs-{{ $service->id }}-tab" data-toggle="pill"
                                            href="#vert-tabs-{{ $service->id }}" role="tab"
                                            aria-controls="vert-tabs-{{ $service->id }}" aria-selected="false">
                                            @foreach ($icons as $icon)
                                                @if ($icon['id'] == $service->icon)
                                                    <small class="mr-2">
                                                        <i class="{{ $icon['icon'] }}"></i>
                                                    </small>
                                                @endif
                                            @endforeach
                                            <small>
                                                {{ $service->name }}
                                            </small>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                @foreach ($company->services as $service)
                                    @if ($service->id == 1)
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel"
                                            aria-labelledby="vert-tabs-home-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Formulario de laravel colective -->
                                                    {!! Form::model($service, [
                                                        'route' => ['admin.services.update', $service],
                                                        'method' => 'put',
                                                        'files' => true,
                                                        'class' => 'actualizar-1',
                                                    ]) !!}
                                                    <div class="form-group">
                                                        {!! Form::label('name', 'Nombre Del Servicio') !!}
                                                        {!! Form::text('name', $service->name, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Ingrese el Nombre del Servicio',
                                                        ]) !!}
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('body', 'Descripción Del Servicio') !!}
                                                        {!! Form::textarea('body', $service->body, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Ingrese una Descripción del Servicio',
                                                        ]) !!}
                                                        @error('body')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <p class="font-wight-blod">Seleccione un ícono </p>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                @foreach ($icons as $icon)
                                                                    <label class="mr-2 mb-2">
                                                                        {!! Form::radio('icon', $icon['id'], true) !!}
                                                                        <i class="{{ $icon['icon'] }}"
                                                                            style="font-size: 30px"></i>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('icon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    @can('admin.services.update')
                                                        
                                                    
                                                    {!! Form::submit('Actualizar servicio', ['class' => 'btn btn-outline-primary']) !!}
                                                    @endcan
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="tab-pane fade" id="vert-tabs-{{ $service->id }}" role="tabpanel"
                                            aria-labelledby="vert-tabs-{{ $service->id }}-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Formulario de laravel colective -->
                                                    {!! Form::model($service, [
                                                        'route' => ['admin.services.update', $service],
                                                        'method' => 'put',
                                                        'files' => true,
                                                        'class' => 'actualizar-2',
                                                    ]) !!}
                                                    <div class="form-group">
                                                        {!! Form::label('name', 'Nombre Del Servicio') !!}
                                                        {!! Form::text('name', $service->name, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Ingrese el Nombre del Servicio',
                                                        ]) !!}
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('body', 'Descripción Del Servicio') !!}
                                                        {!! Form::textarea('body', $service->body, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Ingrese una Descripción del Servicio',
                                                        ]) !!}
                                                        @error('body')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <p class="font-wight-blod">Seleccione un ícono </p>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                @foreach ($icons as $icon)
                                                                    <label class="mr-2 mb-2">
                                                                        {!! Form::radio('icon', $icon['id'], true) !!}
                                                                        <i class="{{ $icon['icon'] }}"
                                                                            style="font-size: 30px"></i>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('icon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    @can('admin.services.update')
                                                        
                                                   
                                                    {!! Form::submit('Actualizar servicio', ['class' => 'btn btn-outline-primary']) !!}
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
            </div>
        </div>
    </section>
@stop
@section('js')
    <script>
        //Cambia la imagen predeterminada por la que se cargó
        document.getElementById("icon").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
    <script>
        //Cambia la imagen predeterminada por la que se cargó
        document.getElementById("icon1").addEventListener('change', cambiarImagen1);

        function cambiarImagen1(event) {
            var file1 = event.target.files[0];
            var reader1 = new FileReader();
            reader1.onload = (event) => {
                document.getElementById("picture1").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file1);
        }
    </script>
    <script src="{{ asset('/js/icons.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    
    $('.actualizar-1').submit(function(e){
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



        $('.actualizar-2').submit(function(e){
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
