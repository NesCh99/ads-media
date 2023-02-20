@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')


    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" style="padding-top: 10px">
        ADS SPORTS PAGOS POR EVENTOS
    </h2>



    <!-- overflow-hidden overflow-x-auto  -->

    <div class="w-full  rounded-lg shadow-xs" style="padding-top: 10px">
        <div class="w-full">
            <table id="example" class="table table-striped w-full whitespace-no-wrap" style="width:100%">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-slate-300 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-slate-300 ">
                        <th>Nombre del Cliente</th>
                        <th>Nombre del Evento</th>
            
                        <th>Transacción ID</th>
                        
                        <th>Fecha de Pago</th>
                        <th>Hora de Pago</th>
                        <th>Gross</th>
                        <th>Concepto</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php($tipo = 1)
                   @foreach($pagosEventos as $pago) 
                        <tr>
                            <td class="px-4 py-3 " style="font-size: 12px">{{ $pago->NombreCompleto}} </td>
                            <td class="px-4 py-3 "style="font-size: 11px">{{ $pago->NombreVid }}</td>
                            <td class="px-4 py-3 " style="font-size: 11px">{{ $pago->idPaypal }}</td>
                      
                            <td class="px-4 py-3 " style="font-size: 11px">
                                {{ \Carbon\Carbon::parse($pago->FechaHoraPago)->format('Y/m/d') }}</td>
                            <td class="px-4 py-3 "style="font-size: 11px">
                                {{ \Carbon\Carbon::parse($pago->FechaHoraPago)->format('H:i:s') }}</td>
                            <td class="px-4 py-3 "style="font-size: 11px">${{ $pago->TotalPago }} USD</td>
                            <td class="px-4 py-3 "style="font-size: 11px"> @if ($pago->TipoPago == $tipo)
                                PAGO POR EVENTO
                            @else
                            PAGO POR CAMPEONATO
                            @endif
                        
                         </td>
                         
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop
