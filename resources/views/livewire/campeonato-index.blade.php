<div>
    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce no-p">
            <!--Banner-->
            <section class="relative section text-white" data-bg-possition="top"
                style="
                              background-image:url('');">
                <div class="wrapper has-bottom-gradient p-md-5 p-3">

                    <div class="ml-3">
                        <ul class="project-filter nav nav-tabs card-header-tabs nav-material  mb-3"
                            role="tablist">

                            <li class="nav-item" data-filter="*">
                                <a class="nav-link active show" href="#">TODOS LOS CAMPEONATOS</a>
                            </li>
                            <li class="nav-item" data-filter=".type1">
                                <a class="nav-link" href="#">SUSCRITO</a>
                            </li>
                            <li class="nav-item" data-filter=".type2">
                                <a class="nav-link" href="#">SUSCRIBETE</a>
                            </li>


                            @livewire('search-campeonato-component')







                        </ul>
                    </div>
                </div>
                <div class="bottom-gradient "></div>
            </section>
            <!--Banner-->
            <div class="wrapper animated fadeInUpShort p-md-5 p-3 pull-up-lg">
                <div id="filter-items" class="row masonry-container lightGallery">


                    @foreach ($campeonatos as $campeonato)
                        @if ($campeonato->Videos->count() == $campeonato->subs && $campeonato->Videos->count() > 0)
                            <div class="col-md-4 mb-2 masonry-post type1">
                                <figure class="card-img figure">
                                    <div class="img-wrapper">
                                        <div class="campeonatoGrid">
                                            @if ($campeonato->PortadaCam)
                                                <img class="r-3" src="{{ Storage::url($campeonato->PortadaCam) }}"
                                                    alt="Card image">
                                            @else
                                                <img class="r-3"
                                                    src="https://images.pexels.com/photos/4219812/pexels-photo-4219812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="Card image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-overlay text-white"
                                        style="margin-left:15px!important ;margin-right:15px!important">
                                        <div class="figcaption">
                                        </div>
                                    </div>
                                    <div class="has-bottom-gradient">
                                        <div class="d-flex">
                                            <div class="card-img-overlay">
                                                <div>
                                                    <div class="mr-3 float-left text-center">
                                                        <div class="s-36">
                                                            {{ Carbon\Carbon::parse($campeonato->FechaInicioCam)->format('d') }}
                                                        </div>

                                                        @php($fecha = Carbon\Carbon::parse($campeonato->FechaInicioCam)->month)
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
                                                                href="{{ route('cliente.campeonato.show', $campeonato->idCampeonato) }}">
                                                                <h4 class="text-primary">{{ $campeonato->NombreCam }}
                                                                </h4>
                                                            </a>
                                                        </div>

                                                        <div class="mt-2">
                                                            <a
                                                                href="{{ route('cliente.campeonato.show', $campeonato->idCampeonato) }}">
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
                        @else
                            <div class="col-md-4 mb-2 masonry-post type2">
                                <figure class="card-img figure">
                                    <div class="img-wrapper">
                                        <div class="campeonatoGrid">

                                            @if ($campeonato->PortadaCam)
                                                <img class="r-3" src="{{ Storage::url($campeonato->PortadaCam) }}"
                                                    alt="Card image">
                                            @else
                                                <img class="r-3"
                                                    src="https://images.pexels.com/photos/4219812/pexels-photo-4219812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="Card image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-overlay text-white"
                                        style="margin-left:15px!important ;margin-right:15px!important  ">
                                        <div class="figcaption">
                                        </div>
                                    </div>
                                    <div class="has-bottom-gradient">
                                        <div class="d-flex">
                                            <div class="card-img-overlay">
                                                <div>
                                                    <div class="mr-3 float-left text-center">
                                                        <div class="s-36">
                                                            {{ Carbon\Carbon::parse($campeonato->FechaInicioCam)->format('d') }}
                                                        </div>

                                                        @php($fecha = Carbon\Carbon::parse($campeonato->FechaInicioCam)->month)
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
                                                                href="{{ route('cliente.suscripcion.campeonato', $campeonato->idCampeonato) }}">
                                                                <h4 class="text-primary">{{ $campeonato->NombreCam }}
                                                                </h4>
                                                            </a>
                                                        </div>

                                                        <div class="mt-2">
                                                            <a
                                                                href="{{ route('cliente.suscripcion.campeonato', $campeonato->idCampeonato) }}">
                                                                <!-- Component Start -->
                                                                <small>
                                                                    <span
                                                                        class="inline-flex items-center rounded-full p-2 bg-blue-700 hover:bg-blue-800 text-white group transition-all duration-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none"
                                                                        role="alert" tabindex="0">
                                                                        <i class="fa-solid fa-cart-shopping"></i>

                                                                        <span
                                                                            class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 overflow-hidden transition-all duration-500 group-hover:px-2 group-focus:px-2">
                                                                            SUSCRIBETE
                                                                        </span>
                                                                    </span>
                                                                </small>
                                                                <!-- Component End -->
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="bottom-gradient" style="right: 20% !important"></div>
                            </div>
                        @endif
                    @endforeach


                </div>
                {{ $campeonatos->links('vendor.pagination.bootstrap-5') }}
            </div>


        </div>
    </main>




</div>
