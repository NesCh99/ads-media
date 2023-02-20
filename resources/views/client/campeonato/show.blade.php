<x-app-layout>


    @php($suma = 0)
    @foreach ($videoSuscrito as $video)
        @php($suma = $suma + 1)
    @endforeach



    @include('client.componets.sidebar')

    <main class="page has-sidebar">


        <div class="container-fluid relative animatedParent animateOnce no-p">
            <div class="animated fadeInUpShorts">
                <!--Banner-->
                <div class="relative xv-slide" data-bg-possition="top"
                    style="background-image:url(@if ($campeonato->PortadaCam) {{ Storage::url($campeonato->PortadaCam) }} @else https://images.pexels.com/photos/7383469/pexels-photo-7383469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1 @endif);">
                    <div class="bottom-gradient "></div>
                </div>

                <div class="row p-3">
                    <div class="col-lg-8 offset-lg-2 p-3">
                        <div class="my-5 d-lg-flex align-items-center">
                            <div class="flex justify-between flex-wrap mb-9">
                                <div class="flex items-center mb-4 mr-4">
                                    <div
                                        class="bg-gray-200 dark:bg-gray-800 mr-3 w-9 h-9 rounded-full flex-shrink-0 flex justify-center items-center">
                                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" width="17"
                                            height="18" viewBox="0 0 17 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.1235 17V15.2222C15.1235 14.2793 14.7515 13.3749 14.0893 12.7081C13.4271 12.0413 12.5291 11.6667 11.5926 11.6667H4.53087C3.59443 11.6667 2.69633 12.0413 2.03417 12.7081C1.372 13.3749 1 14.2793 1 15.2222L1 17"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M8.06174 8.11111C10.0118 8.11111 11.5926 6.51923 11.5926 4.55556C11.5926 2.59188 10.0118 1 8.06174 1C6.11169 1 4.53087 2.59188 4.53087 4.55556C4.53087 6.51923 6.11169 8.11111 8.06174 8.11111Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-gray-500 font-normal dark:text-gray-400 text-sm">
                                            Transmitido Por
                                        </h6>
                                        <p class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                            Ads Sports
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4 mr-4">
                                    <div
                                        class="bg-gray-200 dark:bg-gray-800 mr-3 w-9 h-9 rounded-full flex-shrink-0 flex justify-center items-center">
                                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" width="15"
                                            height="16" viewBox="0 0 15 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.08334 2H9.58334V0.75C9.58334 0.335938 9.91772 0 10.3333 0C10.749 0 11.0833 0.335938 11.0833 0.75V2H12.3333C13.4365 2 14.3333 2.89531 14.3333 4V14C14.3333 15.1031 13.4365 16 12.3333 16H2.33334C1.22866 16 0.333344 15.1031 0.333344 14V4C0.333344 2.89531 1.22866 2 2.33334 2H3.58334V0.75C3.58334 0.335938 3.91772 0 4.33334 0C4.74897 0 5.08334 0.335938 5.08334 0.75V2ZM1.83334 14C1.83334 14.275 2.05709 14.5 2.33334 14.5H12.3333C12.6083 14.5 12.8333 14.275 12.8333 14V6H1.83334V14Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-gray-500 dark:text-gray-400 text-sm">
                                            Publicado en
                                        </h6>
                                        <p class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                            {{ $campeonato->FechaInicioCam }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4 mr-4">
                                    <div
                                        class="bg-gray-200 dark:bg-gray-800 mr-3 w-9 h-9 rounded-full flex-shrink-0 flex justify-center items-center">
                                        <i class="fa-solid fa-play" style="color: #7D8491"></i>
                                    </div>

                                    <div>
                                        <h6 class="text-gray-500 dark:text-gray-400 text-sm">
                                            Transmisiones
                                        </h6>
                                        <p class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                            {{ $suma }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="ml-auto pt-3 p-lg-0">
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
                                    <span style="color: #FCFCFC;padding-left:5px;padding-right:5px">Comparte si te ha
                                        gustado</span>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->
                                </div>
                            </div>
                        </div>

                        <article>
                            <h1 class="">{{ $campeonato->DescripcionCam }}</h1>





                        </article>





                    </div>
                </div>


                <div class=" my-5 p-4">
                    <div class=" mb-3">
                        <div class="card-header transparent b-b">
                            <strong>Lista de Reproducciones</strong>
                        </div>

                        <div class="lightSlider has-items-overlay" data-item="3" data-item-lg="2" data-item-md="1"
                            data-item-sm="1" data-auto="false" data-pager="false" data-controls="true"
                            data-loop="false">

                            @foreach ($videoSuscrito as $video)
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
                                                        <a
                                                            href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">

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
                                                                    <span
                                                                        class="inline-flex items-center rounded-full p-2 bg-blue-700 hover:bg-blue-800 text-white group transition-all duration-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none"
                                                                        role="alert" tabindex="0">
                                                                        <i class="fa-solid fa-circle-play"></i>

                                                                        <span
                                                                            class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 overflow-hidden transition-all duration-500 group-hover:px-2 group-focus:px-2">
                                                                            SUSCRITO
                                                                        </span>
                                                                    </span>
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
                            @endforeach

                        </div>









                    </div>

                </div>

            </div>
        </div>
        @include('client.componets.footer')
    </main>



</x-app-layout>
