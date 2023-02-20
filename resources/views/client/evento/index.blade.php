<x-app-layout>

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
                                        <div class="d-md-flex align-items-center justify-content-between">





                                            <div class="ml-auto mb-2">
                                                <div class="share">
                                                    <!-- AddToAny BEGIN -->
                                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                                        <a class="a2a_button_facebook"></a>
                                                        <a class="a2a_button_twitter"></a>
                                                        <a class="a2a_button_email"></a>
                                                        <a class="a2a_button_whatsapp"></a>
                                                        <a class="a2a_button_facebook_messenger"></a>
                                                    </div>
                                                    <span style="color: #FCFCFC;padding-left:5px;padding-right:5px">Comparte si te ha gustado</span>
                                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                    <!-- AddToAny END -->
                                                </div>
                                            </div>
                                        </div>

                                      

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-gradient "></div>
                </section>
                <!--Banner-->

                <div class="">
                    <!--New Releases-->

                    <!--Banner-->
                    <div class="wrapper animated fadeInUpShort p-md-5 p-3">
                        <div class="lightSlider has-items-overlay playlist" data-item="3" data-item-lg="2"
                            data-item-md="2" data-item-sm="1" data-auto="false" data-pager="false" data-controls="true"
                            data-loop="false">
                            @foreach ($proximosEventos as $video)
                                @if ($video->subs === 1 || $video->PrecioVid == 0)
                                    <div>
                                        <div class="mb-2 card no-b">
                                            <figure class="card-img figure">
                                                <div class="img-wrapper">
                                                    <div class="videoSlider">
                                                        @if ($video->PortadaVid)
                                                            <img src="{{ Storage::url($video->PortadaVid) }}"
                                                                alt="Card image">
                                                        @else
                                                            <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                                alt="Card image">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="img-overlay text-white">
                                                    <div class="figcaption">
                                                    </div>
                                                </div>
                                                <div class="has-bottom-gradient">
                                                    <div class="d-flex">
                                                        <div class="card-img-overlay">
                                                            <div>
                                                                <div class="mr-3 float-left text-center">
                                                                    <div class="s-36">
                                                                        {{ Carbon\Carbon::parse($video->FechaInicioVid)->format('d') }}
                                                                    </div>

                                                                    @php($fecha = Carbon\Carbon::parse($video->FechaInicioVid)->month)
                                                                    @switch($fecha)
                                                                        @case(1)
                                                                            <span>Enero</span>
                                                                        @break

                                                                        @case(2)
                                                                            <span>Febrero</span>
                                                                        @break

                                                                        @case(3)
                                                                            <span>Marzo</span>
                                                                        @break

                                                                        @case(4)
                                                                            <span>Abril</span>
                                                                        @break

                                                                        @case(5)
                                                                            <span>Mayo</span>
                                                                        @break

                                                                        @case(6)
                                                                            <span>Junio</span>
                                                                        @break

                                                                        @case(7)
                                                                            <span>Julio</span>
                                                                        @break

                                                                        @case(8)
                                                                            <span>Agosto</span>
                                                                        @break

                                                                        @case(9)
                                                                            <span>Septiembre</span>
                                                                        @break

                                                                        @case(10)
                                                                            <span>Octubre</span>
                                                                        @break

                                                                        @case(11)
                                                                            <span>Noviembre</span>
                                                                        @break

                                                                        @default
                                                                            <span>Diciembre</span>
                                                                    @endswitch

                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <a
                                                                            href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                                            <h4 class="text-primary">
                                                                                {{ $video->NombreVid }}</h4>
                                                                        </a>
                                                                    </div>

                                                                    <div class="mt-2">
                                                                        <a
                                                                            href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                                            <small>
                                                                                <span
                                                                                    class="inline-flex items-center rounded-full p-2 bg-blue-700 hover:bg-blue-800 text-white group transition-all duration-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none"
                                                                                    role="alert" tabindex="0">
                                                                                    <i
                                                                                        class="fa-solid fa-circle-play"></i>

                                                                                    <span
                                                                                        class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 overflow-hidden transition-all duration-500 group-hover:px-2 group-focus:px-2">
                                                                                        SUSCRITO
                                                                                    </span>
                                                                                </span>

                                                                            </small>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                            <div class="bottom-gradient"></div>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <div class="mb-2 card no-b">
                                            <figure class="card-img figure">
                                                <div class="img-wrapper">
                                                    <div class="videoSlider">
                                                        @if ($video->PortadaVid)
                                                            <img src="{{ Storage::url($video->PortadaVid) }}"
                                                                alt="Card image">
                                                        @else
                                                            <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                                alt="Card image">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="img-overlay text-white">
                                                    <div class="figcaption">
                                                    </div>
                                                </div>
                                                <div class="has-bottom-gradient">
                                                    <div class="d-flex">
                                                        <div class="card-img-overlay">
                                                            <div>
                                                                <div class="mr-3 float-left text-center">
                                                                    <div class="s-36">
                                                                        {{ Carbon\Carbon::parse($video->FechaInicioVid)->format('d') }}
                                                                    </div>

                                                                    @php($fecha = Carbon\Carbon::parse($video->FechaInicioVid)->month)
                                                                    @switch($fecha)
                                                                        @case(1)
                                                                            <span>Enero</span>
                                                                        @break

                                                                        @case(2)
                                                                            <span>Febrero</span>
                                                                        @break

                                                                        @case(3)
                                                                            <span>Marzo</span>
                                                                        @break

                                                                        @case(4)
                                                                            <span>Abril</span>
                                                                        @break

                                                                        @case(5)
                                                                            <span>Mayo</span>
                                                                        @break

                                                                        @case(6)
                                                                            <span>Junio</span>
                                                                        @break

                                                                        @case(7)
                                                                            <span>Julio</span>
                                                                        @break

                                                                        @case(8)
                                                                            <span>Agosto</span>
                                                                        @break

                                                                        @case(9)
                                                                            <span>Septiembre</span>
                                                                        @break

                                                                        @case(10)
                                                                            <span>Octubre</span>
                                                                        @break

                                                                        @case(11)
                                                                            <span>Noviembre</span>
                                                                        @break

                                                                        @default
                                                                            <span>Diciembre</span>
                                                                    @endswitch

                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <a
                                                                            href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                                            <h4 class="text-primary">
                                                                                {{ $video->NombreVid }}</h4>
                                                                        </a>
                                                                    </div>

                                                                    <div class="mt-2">
                                                                        <a
                                                                            href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                                            <small>
                                                                                <span
                                                                                    class="inline-flex items-center rounded-full p-2 bg-blue-700 hover:bg-blue-800 text-white group transition-all duration-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none"
                                                                                    role="alert" tabindex="0">
                                                                                    <i
                                                                                        class="fa-solid fa-cart-shopping"></i>

                                                                                    <span
                                                                                        class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 overflow-hidden transition-all duration-500 group-hover:px-2 group-focus:px-2">
                                                                                        SUSCRIBETE
                                                                                    </span>
                                                                                </span>

                                                                            </small>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                            <div class="bottom-gradient"></div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach




                        </div>
                        <br>
                        <br>

                        <div class="container mx-auto px-1 py-2 md:py-24">

                            <div class="text-white ">

                                <div class="relative mb-5">
                                    <h1 class="mb-2 text-primary">Calendario de Eventos</h1>

                                </div>



                            </div>

                            <!-- <div class="font-bold text-gray-800 text-xl mb-4">
                                Schedule Tasks
                            </div> -->

                            <div class="dark:bg-slate-800 rounded-lg shadow overflow-hidden">

                                <div class="flex items-center justify-between py-2 px-1">


                                    <div id='calendar' class="w-full"></div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var videos = JSON.parse(`<?php echo $calendario; ?>`);
                            console.log(videos);

                            var iniciar = JSON.parse(`<?php echo $iniciar; ?>`);
                            console.log(iniciar);


                            document.addEventListener('DOMContentLoaded', function() {

                                var calendarEl = document.getElementById('calendar');

                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    headerToolbar: {
                                        left: 'prevYear,prev,next,nextYear today',
                                        center: 'title',
                                        right: 'dayGridMonth,dayGridWeek,dayGridDay'

                                    },
                                    height: 500,  // <-- agrega esta línea
                                    locale: 'es',
                                    timeZone: 'local',
                                    initialDate: iniciar,
                                    navLinks: true, // can click day/week names to navigate views
                                    editable: true,
                                    dayMaxEvents: true, // allow "more" link when too many events
                                    events: videos
                                });

                                calendar.render();
                            });
                        </script>
                        @include('client.componets.footer')
                    </div>

                </div>

            </div>
        </div>

    </main>






</x-app-layout>
