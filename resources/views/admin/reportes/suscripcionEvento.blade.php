@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')


    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" style="padding-top: 10px">
        LISTA DE SUSCRIPCIONES
    </h2>



    <!-- overflow-hidden overflow-x-auto  -->

    <div class="w-full  rounded-lg shadow-xs" style="padding-top: 10px">
        <div class="w-full">
            <table id="example" class="table table-striped w-full whitespace-no-wrap" style="width:100%">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-slate-300 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-slate-300 ">
                        <th>Nombre Cliente</th>
                        <th>Email</th>
                        <th>Nombre del Evento</th>
                        <th>Precio del Evento</th>
                        <th>Fecha de Suscripción</th>
                        <th>Hora de Suscripción</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($suscripciones as $sub)
        
                        <tr>
                            <td class="px-4 py-3 "style="font-size: 11px">{{ $sub->name }}</td>
                            <td class="px-4 py-3 " style="font-size: 12px">{{ $sub->email }} </td>
                            <td class="px-4 py-3 " style="font-size: 11px">{{ $sub->NombreVid }} </td>
                            <td class="px-4 py-3 " style="font-size: 11px">${{ $sub->PrecioVid }} USD</td>
                            <td class="px-4 py-3 " style="font-size: 11px">
                                {{ \Carbon\Carbon::parse($sub->CreacionSus)->format('Y/m/d') }}</td>
                            <td class="px-4 py-3 "style="font-size: 11px">
                                {{ \Carbon\Carbon::parse($sub->CreacionSus)->format('H:i:s') }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>



     
@stop

@section('css')



    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/bulma.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/dataTables.bulma.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/jquery.dataTables.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles


@stop

@section('js')

    <script src="{{ asset('/js/admin/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/admin/dataTables.bulma.min.js') }}"></script>
    <script src="{{ asset('/js/admin/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/js/admin/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/js/admin/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/js/admin/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/js/admin/table.js') }}"></script>




    


@stop
