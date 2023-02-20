@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<div class="card-header bg-dark">
    <div class="row align-items-center">
        <h5><b>BALANCE GENERAL| </b> Pagos de Suscripciones</h5> 
    </div>
</div>

@stop

@section('content')





    <!-- overflow-hidden overflow-x-auto  -->

    <div class="w-full  rounded-lg shadow-xs" style="padding-top: 10px">
        <div class="w-full">
            <table id="example" class="table table-striped w-full whitespace-no-wrap" style="width:100%">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-slate-300 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-slate-300 ">
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Transacción ID</th>
                        <th>Tipo de Pago</th>
                        <th>Fecha de Pago</th>
                        <th>Hora de Pago</th>
                        <th>Pago Bruto</th>
                        <th>Comisión PayPal</th>
                        <th>Pago Neto</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @php($balance = 0)
                    @php($tipo = 1)
                    @foreach ($pagos as $pago)
                        @php($balance = $balance + $pago->net)
                        <tr>
                            <td class="px-4 py-3 "style="font-size: 11px">{{ $pago->NombreCompleto }}</td>
                            <td class="px-4 py-3 " style="font-size: 12px">{{ $pago->Email }} </td>
                            <td class="px-4 py-3 " style="font-size: 11px">{{ $pago->idPaypal }}</td>
                            <td class="px-4 py-3 " style="font-size: 11px">
                                @if ($pago->TipoPago == $tipo)
                                    EVENTO
                                @else
                                    CAMPEONATO
                                @endif


                            </td>
                            <td class="px-4 py-3 " style="font-size: 11px">
                                {{ \Carbon\Carbon::parse($pago->FechaHoraPago)->format('Y/m/d') }}</td>
                            <td class="px-4 py-3 "style="font-size: 11px">
                                {{ \Carbon\Carbon::parse($pago->FechaHoraPago)->format('H:i:s') }}</td>
                            <td class="px-4 py-3 "style="font-size: 11px">${{ $pago->TotalPago }} USD</td>
                            <td class="px-4 py-3 "style="font-size: 11px">-${{ $pago->fee }} </td>
                            <td class="px-4 py-3 "style="font-size: 11px">${{ $pago->net }} </td>
                            <td class="px-4 py-3 "style="font-size: 11px"> ${{ $balance }} USD </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>


    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" style="padding-top: 10px">
        BALANCE GENERAL| Gráficos Estadísticos
    </h2>




    <!-- component -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

    <!-- This is an example component -->
    <form method="POST" action="{{ route('admin.reporte.pagos.totales') }}">
        @csrf
        <div class=" mx-auto flex">
            <div class="flex-auto w-64">

                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Balance
                    mensual</label>
                <select name="Años"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Todos los años</option>

                    @for ($i = $fechas[0]['fechaMin']; $i <= $fechas[1]['fechaMax']; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor

                </select>
                <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

            </div>

            <div class="flex-auto w-32" style="margin-top: 28px; margin-left:10px">
                <!-- component -->
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB"></path>
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor"></path>
                    </svg>
                    Generar Gráfico..
                </button>

            </div>

        </div>

    </form>
    <br>

    <div class="w-full max-w-full px-3 mt-0 lg:flex-none pb-8 " >
        <div
            class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <h6>Balance mensual </h6>

                <p class="leading-normal text-sm">
                    <i class="fa fa-arrow-up text-lime-500"></i>

                    @if ($año === 'Todos los años' || is_null($año))
                        <span class="font-semibold"></span> Balance General
                    @else
                        <span class="font-semibold">del año</span>  {{ $año }}
                    @endif

                </p>
            </div>


            <section class="content">
                <div class="container-fluid">
        
                    <div class="">
        
                        <div class="">
                            <h4>Gráficos Estadísticos</h4>
                            <div class="row">
                                <div class="col-4 col-sm-2">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home"
                                            role="tab" aria-controls="vert-tabs-home" aria-selected="true"><small> Gráfico de Barras </small> </a>
        
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
                                            role="tab" aria-controls="vert-tabs-profile" aria-selected="false"><small>Gráfico de lineas</small></a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                            href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                            aria-selected="false"><small>Gráfico Circular</small></a>
                                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false"><small>Gráfico de Área Polar</small></a>
                                    </div>
                                </div>
                                <div class="col-8 col-sm-10">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel"
                                            aria-labelledby="vert-tabs-home-tab">
                                            <div class="flex-auto">
                                                <canvas id="myChart" height="100px"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                            aria-labelledby="vert-tabs-profile-tab">
                                            <div class="flex-auto">
                                                <canvas id="lineChart" height="100px"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                            aria-labelledby="vert-tabs-messages-tab">
                                            <div class="flex-auto">
                                                <canvas id="pieChart" height="100px"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                            aria-labelledby="vert-tabs-settings-tab">
                                            <div class="flex-auto">
                                                <canvas id="bubbleChart" height="100px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
        
                    </div>
        
        
        
                </div>
        
            </section>
        </div>
    </div>
    
    </div>
    
@stop

@section('css')



    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/bulma.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('/css/admin/dataTables.bulma.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css"
        href="{{ asset('/css/admin/jquery.dataTables.min.css') }}">
    <link id="style-switch" rel="stylesheet" type="text/css"
        href="{{ asset('/css/admin/buttons.dataTables.min.css') }}">
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
    <script>
        const pagos = JSON.parse(`<?php echo $balanceMensual; ?>`)
        
        //bar chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Balance Mensual',
                    data: pagos.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                
            }
        });
        //line chart
        const line = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(line, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Balance Mensual',
                    data: pagos.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



        //pie chart
        const pie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pie, {
            type: 'pie',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Balance Mensual',
                    data: pagos.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



         //bubble chart
         const bubble = document.getElementById('bubbleChart').getContext('2d');
        const bubbleChart  = new Chart(bubble, {
            type: 'polarArea',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Balance Mensual',
                    data: pagos.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



    </script>



@stop
