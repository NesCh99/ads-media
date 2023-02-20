<!--Latest Posts-->
<section class="section">
    <div class="d-flex relative align-items-center justify-content-between">
        <div class="mb-4">
            <h4>Campeonatos</h4>
            <p>Revisa la lista de Campeonatos</p>
        </div>
        <a href="{{ route('cliente.campeonatos.index') }}">Ver todos los campeonatos<i
                class="icon-angle-right ml-3"></i></a>
    </div>
    <div class="lightSlider has-items-overlay" data-item="3" data-item-lg="2" data-item-md="1" data-item-sm="1"
        data-auto="false" data-pager="false" data-controls="true" data-loop="false">

        @foreach ($campeonatos as $campeonato)
            @if ($campeonato->Videos->count() == $campeonato->subs && $campeonato->Videos->count() > 0)
                <div class=" card">
                    <figure class="card-img figure">
                        <div class="img-wrapper">
                            <div class="campeonatoSlider">
                                 @if ($campeonato->PortadaCam)
                                 <img class="r-3" src="{{ Storage::url($campeonato->PortadaCam) }}" alt="Card image">
                                 @else
                                 <img class="r-3" src="https://images.pexels.com/photos/4219812/pexels-photo-4219812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Card image">
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
                                                    <h4 style="color:white">{{ $campeonato->NombreCam }}</h4>
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
                <div class=" card">
                    <figure class="card-img figure">
                        <div class="img-wrapper">
                            <div class="campeonatoSlider">

                                @if ($campeonato->PortadaCam)
                                <img class="r-3" src="{{ Storage::url($campeonato->PortadaCam) }}" alt="Card image">
                                @else
                                <img class="r-3" src="https://images.pexels.com/photos/4219812/pexels-photo-4219812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Card image">
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
                                            @php($fecha = Carbon\Carbon::parse($campeonato->FechaInicioCam)->month)
                                            <div class="s-36">
                                                {{ Carbon\Carbon::parse($campeonato->FechaInicioCam)->format('d') }}
                                            </div>

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
                                                    <h4 style="color:white">{{ $campeonato->NombreCam }}</h4>
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
                    <div class="bottom-gradient"></div>
                </div>
            @endif
        @endforeach




    </div>
</section>
<!--New Releases-->
