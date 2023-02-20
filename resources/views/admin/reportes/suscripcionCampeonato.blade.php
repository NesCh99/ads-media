@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')


    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" style="padding-top: 10px">
        LISTA DE SUSCRIPCIONES POR CAMPEONATO
    </h2>



    <!-- overflow-hidden overflow-x-auto  -->

    <div class="w-full  rounded-lg shadow-xs" style="padding-top: 10px">
        <div class="w-full">
            <table id="example" class="table table-striped w-full whitespace-no-wrap" style="width:100%">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-slate-300 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-slate-300 ">
                        <th>Nombre Campeonato</th>
                        <th>LISTA DE SUSCRIPCIONES </th>

                        <th>Fecha de Incio</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($campeonatos as $campeonato)
                        @foreach ($subs as $k => $suscripcione)
                            @if ($campeonato->idCampeonato === $k)
                                <tr>
                                    <td class="px-4 py-3 "style="font-size: 11px">{{ $campeonato->NombreCam }}</td>

                                    <td class="px-4 py-3 "style="font-size: 11px">


                                        <table class="table table-striped w-full whitespace-no-wrap" style="width:100%">
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-slate-300 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-slate-300 ">
                                                    <th><small> Nombre Cliente</small></th>
                                                    <th><small> Email</small></th>
                                                    <th><small> Nombre del Evento</small></th>
                                                    <th><small> Precio del Evento</small></th>
                                                    <th><small> Fecha de Suscripción</small></th>
                                                    <th> <small> Hora de Suscripción </small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($packSubs as $sub)
                                                    @if ($sub->idCampeonato === $k)
                                                        <tr>
                                                            <td class="px-4 py-3 "style="font-size: 11px">
                                                                <small> {{ $subs[$k][$sub->idVideo]['name'] }} </small>
                                                            </td>
                                                            <td class="px-4 py-3 " style="font-size: 12px">
                                                                <small> {{ $subs[$k][$sub->idVideo]['email'] }} </small>
                                                            </td>
                                                            <td class="px-4 py-3 " style="font-size: 11px">
                                                                <small> {{ $subs[$k][$sub->idVideo]['NombreVid'] }} </small>
                                                            </td>
                                                            <td class="px-4 py-3 " style="font-size: 11px">
                                                                <small> ${{ $subs[$k][$sub->idVideo]['PrecioVid'] }} USD
                                                                </small>
                                                            </td>
                                                            <td class="px-4 py-3 " style="font-size: 11px">
                                                                <small>
                                                                    {{ \Carbon\Carbon::parse($subs[$k][$sub->idVideo]['CreacionSus'])->format('Y/m/d') }}
                                                                </small>
                                                            </td>
                                                            <td class="px-4 py-3 "style="font-size: 11px">
                                                                <small>
                                                                    {{ \Carbon\Carbon::parse($subs[$k][$sub->idVideo]['CreacionSus'])->format('H:i:s') }}
                                                                </small>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>

                                        </table>






                                    </td>






                                    <td class="px-4 py-3 " style="font-size: 12px">{{ $campeonato->FechaInicioCam }} </td>


                                </tr>
                            @endif
                        @endforeach
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
