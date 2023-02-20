<!--Latest Posts-->
<section class="section">
    <div class="d-flex relative align-items-center justify-content-between">
        <div class="mb-4">
            <h4>Últimas Transmisiones</h4>
            <p>Revisa la lista de transmisiones</p>
        </div>
        <a href="{{ route('cliente.videos.index') }}">Ver todas las Transmisiones<i class="icon-angle-right ml-3"></i></a>
    </div>
    <div class="lightSlider has-items-overlay" data-item="3" data-item-lg="2" data-item-md="1" data-item-sm="1"
        data-auto="false" data-pager="false" data-controls="true" data-loop="false">

        @foreach ($videosEstado as $video)
            @if ($video->subs === 1 || $video->PrecioVid == 0)
                <div class="card">
                    <figure class="card-img figure">
                        <div class="img-wrapper">

                            <div class="videoSlider">

                                @if ($video->PortadaVid)
                                    <img src="{{ Storage::url($video->PortadaVid) }}" alt="Card image">
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
                                        <a href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">

                                            <div>
                                                <h5 style="color:white">{{ $video->NombreVid }}</h5>

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
                                    <img src="{{ Storage::url($video->PortadaVid) }}" alt="Card image">
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
                                        <a href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">

                                            <div>
                                                <h5 style="color:white">{{ $video->NombreVid }}</h5>
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
                                                            <i class="fa-solid fa-cart-shopping"></i>

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
