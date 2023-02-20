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

                    <main class="page has-sidebar">
                        <div class="container-fluid relative animatedParent animateOnce no-p">
                            <!--Banner-->
                            <section class="relative section text-white" data-bg-possition="top"
                                style="
                                              background-image:url('');">
                                <div class="wrapper has-bottom-gradient p-md-5 p-3">

                                    <div class="ml-3">
                                        <ul class="project-filter nav nav-tabs card-header-tabs nav-material table-responsive mb-3"
                                            role="tablist">

                                            <li class="nav-item" data-filter="*">
                                                <a class="nav-link active show" href="#">Lista de
                                                    Suscripciones</a>
                                            </li>



                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-gradient "></div>
                            </section>
                            <!--Banner-->
                            <div class="wrapper animated fadeInUpShort p-md-5 p-3 pull-up-lg">
                                <div id="filter-items" class="row masonry-container lightGallery">
                                    @foreach ($listaVideos as $video)
                                        <div class="col-md-4 mb-2 masonry-post">
                                            <figure class="card-img figure">
                                                <div class="img-wrapper">
                                                    <div class="videoGrid">
                                                        @if ($video->PortadaVid)
                                                            <img src="{{ Storage::url($video->PortadaVid) }}"
                                                                alt="Card image">
                                                        @else
                                                            <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                                alt="Card image">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="img-overlay"
                                                    style="margin-left:15px!important ;margin-right:15px!important">
                                                </div>
                                                <div class="has-bottom-gradient">
                                                    <div class="d-flex">
                                                        <div class="card-img-overlay">
                                                            <div class="pt-3 pb-3">
                                                                <a
                                                                    href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                                    <figure class="float-left mr-3 mt-1">
                                                                        <i class="fa-solid fa-circle-play"
                                                                            style="font-size: 30px"></i>
                                                                    </figure>
                                                                    <div>
                                                                        <h5>{{ $video->NombreVid }}</h5>
                                                                        <small> SUSCRITO</small>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                            <div class="bottom-gradient bottom-gradient-thumbnail"></div>
                                        </div>
                                    @endforeach


                                </div>

                                @include('client.componets.footer')

                            </div>


                        </div>
                    </main>







                </div>

            </div>
        </div>


    </main>


</x-app-layout>
