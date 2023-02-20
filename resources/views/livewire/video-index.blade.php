<div>
    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce no-p">
            <!--Banner-->
            <section class="relative section text-white" data-bg-possition="top"
                style="
                              background-image:url('');">
                <div class="wrapper has-bottom-gradient p-md-5 p-3">

                    <div class="ml-3">
                        <ul class="project-filter nav nav-tabs card-header-tabs nav-material  mb-3" role="tablist">

                            <li class="nav-item" data-filter="*">
                                <a class="nav-link active show" href="#">TODOS LOS VIDEOS</a>
                            </li>
                            <li class="nav-item" data-filter=".type1">
                                <a class="nav-link" href="#">SUSCRITO</a>
                            </li>
                            <li class="nav-item" data-filter=".type2">
                                <a class="nav-link" href="#">SUSCRIBETE</a>
                            </li>
                            @livewire('search')

                        </ul>
                    </div>
                </div>
                <div class="bottom-gradient "></div>
            </section>
            <!--Banner-->
            <div class="wrapper animated fadeInUpShort p-md-5 p-3 pull-up-lg">
                <div id="filter-items" class="row masonry-container lightGallery">
                    @foreach ($videos as $video)
                        @if ($video->subs === 1 || $video->PrecioVid == 0)
                            <div class="col-md-4 mb-2 masonry-post type1">
                                <figure class="card-img figure">
                                    <div class="img-wrapper">
                                        <div class="videoGrid">
                                            @if ($video->PortadaVid)
                                                <img src="{{ Storage::url($video->PortadaVid) }}" alt="Card image">
                                            @else
                                                <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="Card image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-overlay"
                                        style="margin-left:15px!important ;margin-right:15px!important"></div>
                                    <div class="has-bottom-gradient">
                                        <div class="d-flex">
                                            <div class="card-img-overlay">
                                                <div class="pt-3 pb-3">
                                                    <a href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                        <figure class="float-left mr-3 mt-1">

                                                        </figure>
                                                        <div>
                                                            <h5>{{ $video->NombreVid }}</h5>
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

                                                            @if ($video->MetaDato)
                                                                <small style="float: right">
                                                                    {{ \FormatTime::LongTimeFilter($video->MetaDato->ModificacionMetaDato) }}</small>
                                                            @else
                                                                <small style="float: right">
                                                                    {{ $video->HoraInicioVid }}</small>
                                                            @endif

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
                            <div class="col-md-4 mb-2 masonry-post type2">
                                <figure class="card-img figure">
                                    <div class="img-wrapper">
                                        <div class="videoGrid">
                                            @if ($video->PortadaVid)
                                                <img src="{{ Storage::url($video->PortadaVid) }}" alt="Card image">
                                            @else
                                                <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="Card image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-overlay"
                                        style="margin-left:15px!important ;margin-right:15px!important"></div>
                                    <div class="has-bottom-gradient">
                                        <div class="d-flex">
                                            <div class="card-img-overlay">
                                                <div class="pt-3 pb-3">
                                                    <a href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                        <figure class="float-left mr-3 mt-1">

                                                        </figure>
                                                        <div>
                                                            <h5>{{ $video->NombreVid }}</h5>
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

                                                            @if ($video->MetaDato)
                                                                <small style="float: right">
                                                                    {{ \FormatTime::LongTimeFilter($video->MetaDato->ModificacionMetaDato) }}</small>
                                                            @else
                                                                <small style="float: right">
                                                                    {{ $video->HoraInicioVid }}</small>
                                                            @endif

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
                {{ $videos->links('vendor.pagination.bootstrap-5') }}
            </div>

            @include('client.componets.footer')


        </div>
    </main>




</div>
