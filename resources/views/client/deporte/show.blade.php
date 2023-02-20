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
                                        @foreach ($deporte as $item)
                                            @if ($item->PortadaDep)
                                                <img src="{{ Storage::url($item->PortadaDep) }}" alt="/"
                                                    class="deportes">
                                            @else
                                                <img src="https://images.pexels.com/photos/159698/soccer-football-sport-ball-159698.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="/" class="deportes">
                                            @endif
                                        @endforeach


                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-md-flex align-items-center justify-content-between">


                                            @foreach ($deporte as $item)
                                                <h1 class="my-3 text-white "> {{ $item->NombreDep }}</h1>
                                            @endforeach


                                            <div class="ml-auto mb-2">
                                                <!-- share -->
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
                                                    <span
                                                        style="color: #FCFCFC;padding-left:5px;padding-right:5px">Comparte
                                                        si te ha gustado</span>
                                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                    <!-- AddToAny END -->
                                                </div>
                                                <!-- end share -->
                                            </div>
                                        </div>

                                        <div class="text-white my-2">


                                            @foreach ($deporte as $item)
                                                <p>{{ $item->DescripcionDep }}</p>
                                            @endforeach



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-gradient "></div>
                </section>
                <!--Banner-->

                <div class="wrapper p-3 p-lg-5">
                    <!--New Releases-->
                    <section>
                        <div class="d-flex relative align-items-center justify-content-between">
                            <div class="mb-4">
                                <h4>Campeonatos</h4>
                                <p>Revise la lista de campeonatos</p>
                            </div>
                            <a href="{{ route('cliente.campeonatos.index') }}">Ver todos los Campeonatos<i
                                    class="icon-angle-right ml-3"></i></a>
                        </div>


                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="playlist">
                                            <ul class="list-group">


                                                @foreach ($campeonatos as $campeonato)
                                                    @if ($campeonato->Videos->count() == $campeonato->subs && $campeonato->Videos->count() > 0)
                                                        <li class="list-group-item my-1">
                                                            <div class="d-flex align-items-center">

                                                                <div class="col-6">
                                                                    <h6>{{ $campeonato->NombreCam }}</h6>
                                                                </div>
                                                                <span class=" ml-auto">
                                                                    Fecha de Inicio:
                                                                    {{ $campeonato->FechaInicioCam }}</span>


                                                                <div class="ml-auto">
                                                                    <a href="{{ route('cliente.campeonato.show', $campeonato->idCampeonato) }}"
                                                                        class="btn btn-outline-primary btn-sm d-none d-lg-block">SUSCRITO</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li class="list-group-item my-1">
                                                            <div class="d-flex align-items-center">

                                                                <div class="col-6">
                                                                    <h6>{{ $campeonato->NombreCam }}</h6>
                                                                </div>
                                                                <span class=" ml-auto">
                                                                    Fecha de Inicio:
                                                                    {{ $campeonato->FechaInicioCam }}</span>

                                                                <div class="ml-auto">
                                                                    <a href="{{ route('cliente.suscripcion.campeonato', $campeonato->idCampeonato) }}"
                                                                        class="btn btn-outline-primary btn-sm d-none d-lg-block">SUSCRIBIRSE</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach





                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--New Releases-->
                    <br>
                    <br>
                    <!--Latest Posts-->
                    <section class="section">
                        <div class="d-flex relative align-items-center justify-content-between">
                            <div class="mb-4">
                                <h4>Últimas Transmisiones</h4>
                                <p>Revise la Lista de transmisiones</p>
                            </div>
                            <a href="{{ route('cliente.videos.index') }}">Ver todas las Transmisiones<i
                                    class="icon-angle-right ml-3"></i></a>
                        </div>

                        <div class="lightSlider has-items-overlay" data-item="3" data-item-lg="2" data-item-md="1"
                            data-item-sm="1" data-auto="false" data-pager="false" data-controls="true"
                            data-loop="false">

                            @foreach ($videos as $video)
                                @if ($video->subs === 1)
                                    <div class="card">
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
                                            <div class="img-overlay"></div>
                                            <div class="has-bottom-gradient">
                                                <div class="d-flex">
                                                    <div class="card-img-overlay">
                                                        <div class="pt-3 pb-3">
                                                            <a
                                                                href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">

                                                                <div>
                                                                    <h5 style="color:white">{{ $video->NombreVid }}
                                                                    </h5>

                                                                    @if ($video->MetaDato)
                                                                        <small style="float: right">
                                                                            {{ \FormatTime::LongTimeFilter($video->MetaDato->ModificacionMetaDato) }}</small>
                                                                    @else
                                                                        <small style="float: right">
                                                                            {{ $video->HoraInicioVid }}</small>
                                                                    @endif



                                                                    <!-- component -->
                                                                    <!-- This is an example component -->
                                                                    <div class="max-w-lg mx-auto">
                                                                        <!-- Component Start -->

                                                                        <small>
                                                                            <span
                                                                                class="inline-flex items-center rounded-full p-2 bg-blue-700 hover:bg-blue-800 text-white group transition-all duration-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none"
                                                                                role="alert" tabindex="0">
                                                                                <i class="fa-solid fa-circle-play"></i>

                                                                                <span
                                                                                    class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 overflow-hidden transition-all duration-500 group-hover:px-2 group-focus:px-2">
                                                                                    SUSCRITO
                                                                                </span>
                                                                            </span>

                                                                        </small>
                                                                        <!-- Component End -->


                                                                    </div>






                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>
                                        <div class="bottom-gradient bottom-gradient-thumbnail"></div>
                                    </div>
                                @else
                                    <div class="card">
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
                                            <div class="img-overlay"></div>
                                            <div class="has-bottom-gradient">
                                                <div class="d-flex">
                                                    <div class="card-img-overlay">
                                                        <div class="pt-3 pb-3 ">
                                                            <a
                                                                href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">

                                                                <div>
                                                                    <h5 style="color:white">{{ $video->NombreVid }}
                                                                    </h5>

                                                                    @if ($video->MetaDato)
                                                                        <small style="float: right">
                                                                            {{ \FormatTime::LongTimeFilter($video->MetaDato->ModificacionMetaDato) }}</small>
                                                                    @else
                                                                        <small style="float: right">
                                                                            {{ $video->HoraInicioVid }}</small>
                                                                    @endif


                                                                    <!-- component -->
                                                                    <!-- This is an example component -->
                                                                    <div class="max-w-lg mx-auto">

                                                                        <!-- Component Start -->

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
                                                                        <!-- Component End -->



                                                                    </div>


                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>
                                        <div class="bottom-gradient bottom-gradient-thumbnail"></div>
                                    </div>
                                @endif
                            @endforeach



                        </div>
                    </section>
                    <!--New Releases-->





                </div>

            </div>
        </div>

        @include('client.componets.footer')
    </main>


</x-app-layout>
