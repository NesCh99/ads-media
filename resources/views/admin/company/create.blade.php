@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>Nuevo Servicio</h5>
        </div>
    </div>
@stop
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif
@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Formulario de laravel colective -->
            {!! Form::open([
                'route' => ['admin.services.store'],
                'method' => 'post',
                'files' => true,
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre Del Servicio') !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el Nombre del Servicio',
                ]) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Descripción Del Servicio') !!}
                {!! Form::textarea('body', null, [
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
                                <i class="{{ $icon['icon'] }}" style="font-size: 30px"></i>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            @error('icon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::submit('Registrar Servicio', ['class' => 'btn btn-outline-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('/js/icons.js') }}"></script>
@stop
