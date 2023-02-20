<x-app-layout>

    @section('css')

        <link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
    @stop

    @section('js')
        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/table.js') }}"></script>

    @stop


    @include('client.componets.sidebar')

    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce p-0">
            <div class="animated fadeInUpShort">
                <!--Banner-->
                <section class="relative" data-bg-possition="center"
                    style="background-image:url('https://images.pexels.com/photos/114296/pexels-photo-114296.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
                    <div class="wrapper has-bottom-gradient">
                        <div class="row pt-5 ml-lg-5 mr-lg-5">
                            <div class="col-md-10 offset-1">
                                <div class="row my-5 pt-5">
                                    <div class="col-md-3">


                                    </div>
                                    <div class="col-md-9">
                                      

                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-gradient "></div>
                </section>
                <!--Banner-->

                <div class="wrapper p-3 p-lg-5" style="width: 90%">
                    <!--New Releases-->

                    <table id="example" class="table is-striped" style="width:100%">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th>N° Pago</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Fecha</th>
                                <th>Número de Contrato</th>
                                <th>total de Pago</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{ $pago->idPago }}</td>
                                    <td>{{ $pago->NombreCompleto }}</td>
                                    <td>{{ $pago->Email }}</td>
                                    <td>{{ $pago->FechaHoraPago }}</td>
                                    <td> {{ $pago->idPaypal }}</td>
                                    <td>${{ $pago->TotalPago }} USD</td>

                                </tr>
                                
                            @endforeach
                        </tbody>





                        </tbody>
                    </table>


                    <br>
                    <br>

                    @include('client.componets.footer')
                </div>

                



            </div>
        </div>

        
    </main>




</x-app-layout>
