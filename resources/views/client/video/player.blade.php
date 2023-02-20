<x-app-layout>
    @include('client.componets.sidebar')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/2.5.12/controls.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/2.5.12/shaka-player.ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/3.0.0/shaka-player.compiled.js"></script>
    <script defer src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('shaka-ui-loaded', init);
        document.addEventListener('shaka-ui-load-failed', initFailed);

        async function init() {
            const video = document.getElementById('video');
            if (video && video.ui) { // Check if the UI has been set up, first.
                const player = video.ui.getControls().getPlayer();
                const stats = player.getStats();
                console.log(
                    setTimeout(function() {
                        console.log(stats);
                    }, 5500));
                console.log(stats); // Or format this into DOM, etc.
            }

            controls.addEventListener('error', onPlayerErrorEvent);


            player.addEventListener('error', onPlayerErrorEvent);

            player.configure(playerConfig);
            ui.configure(config);

            //ui.configure('addSeekBar', false);
            // ui.configure('addBigPlayButton', false);

            //  try {
            //     await player.load(manifestUri);
            //     console.log('The video has now been loaded!');
            //   } catch (error) {
            //     onPlayerError(error);
            //   }

        }

        function onPlayerErrorEvent(event) {
            onPlayerError(event.detail);
        }

        function onPlayerError(error) {
            console.error('Error code', error.code, 'object', error);
        }

        function initFailed() {
            console.error('Unable to load the Shaka Player UI library!');
        }

        function onUIErrorEvent(errorEvent) {
            // Extract the shaka.util.Error object from the event.
            onPlayerError(event.detail);
        }
    </script>
    @if (session('status'))
        <h5 class="title" {{ session('status') }}>
        </h5>
    @endif
    <br>
    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce">
            <div class="wrapper animated fadeInUpShort p-4 mt-2">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="video-responsive">
                            <div class="card no-b r-0">
                                <div class="card-body p-4">
                                    <div class="d-lg-flex align-items-center">
                                        <h1 class="my-3 h4">{{ $video->NombreVid }} |
                                            {{ $video->Campeonato->NombreCam }}
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            @if ($video->MetaDato)
                                <video data-shaka-player class="teste" id="video" width="100%" height="100%"
                                    poster="{{ asset('/img/logo.png') }}">
                                    <source src="{{ $video->MetaDato->StreamHlsMetaDato }}" />
                                </video>
                            @else
                                <div class="bg-red-500 text-white text-center py-4 px-6 rounded-lg">
                                    Transmisión aún no disponible, vuelve más tarde
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="lightSlider has-items-overlay playlist" data-item="3" data-item-xl="3"
                                    data-item-lg="3" data-item-md="3" data-item-sm="1" data-auto="false"
                                    data-pager="false" data-controls="true" data-loop="false">
                                    <div>
                                        <div class="p-5 bg-primary text-white">
                                            <h5 class="font-weight-normal s-14">Descripción</h5>
                                            <small>
                                                <p>
                                                    {{ $video->DescripcionVid }}

                                                </p>
                                            </small>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-5">
                                            <h5 class="font-weight-normal s-14">Transmitido</h5>
                                            @if ($video->MetaDato)
                                                <span
                                                    class="s-24 font-weight-lighter amber-text">{{ \FormatTime::LongTimeFilter(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->MetaDato->StartedAtMetaDato)) }}
                                                </span>
                                            @else
                                                <span class="s-24 font-weight-lighter amber-text">--
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-5 light">
                                            <h5 class="font-weight-normal s-14">Comentarios</h5>
                                            <span
                                                class="s-48 font-weight-lighter text-indigo">{{ $video->comentarios->count() }}</span>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-5">
                                            <h5 class="font-weight-normal s-14">Hora de Inicio</h5>
                                            <span
                                                class="s-24 font-weight-lighter pink-text">{{ $video->HoraInicioVid }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @php($id = $video->idVideo)
                        @php($videoComentado = $video)
                        <br>

                        <form action="{{ route('cliente.comentario.video', $id) }}" method="POST"
                            class="w-full  dark:bg-slate-800 rounded-lg px-4 pt-2">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 dark:text-white text-lg">Añadir un nuevo comentario</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea
                                        class="dark:bg-slate-900 rounded  border-[#243c5a] leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 "
                                        name="body" placeholder='Escriba su comentario' required></textarea>
                                </div>
                                <div class="w-full  flex items-start md:w-full px-3">
                                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">

                                    </div>
                                    <div class="-mr-1" style="padding: 5px">
                                        <input type='submit'
                                            class="dark:bg-slate-800 dark:text-white font-medium py-1 px-4 rounded-lg tracking-wide mr-1 hover:bg-slate-900"
                                            value='Publicar comentario'>
                                    </div>

                                </div>
                        </form>




                    </div>

                    <div class="card mt-1 mb-5">
                        <div class="card-body">




                            @if (isset($videoComentado->comentarios))
                                @foreach ($videoComentado->comentarios as $comentario)
                                    <!-- component -->
                                    <div class="flex justify-center relative top-1/3">
                                        <!-- This is an example component -->
                                        <div class="relative grid grid-cols-1 gap-4 p-4 mb-8    w-full">
                                            <div class="relative flex gap-4">
                                                <div class="avatar avatar-md mr-3 mt-1 ">
                                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                        <button
                                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                            <img class="h-8 w-8 rounded-full object-cover comments__avatar"
                                                                src="{{ $comentario->cliente->profile_photo_url }}"
                                                                alt="{{ $comentario->cliente->name }}" />
                                                        </button>
                                                    @else
                                                        <span class="inline-flex rounded-md">
                                                            <button type="button"
                                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:bg-slate-800 hover:text-gray-700 focus:outline-none transition">
                                                                {{ $comentario->cliente->name }}
                                                                <svg class="ml-2 -mr-0.5 h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col w-full">
                                                    <div class="flex flex-row justify-between">
                                                        <p
                                                            class="relative text-xl whitespace-nowrap truncate overflow-hidden">
                                                            {{ $comentario->cliente->name }}
                                                        </p>
                                                        @if (Auth::user()->id == $comentario->idCliente)
                                                            @php($idComentario = $comentario->idComentario)
                                                            <form
                                                                action="{{ route('client.comentarios.destroy', $comentario) }}"
                                                                method="POST" class="delete-comment">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="text-gray-500 text-xl ">
                                                                    <i class="fa-solid fa-trash"></i </button>
                                                            </form>

                                                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                            <script>
                                                                $('.delete-comment').submit(function(e) {
                                                                    e.preventDefault();
                                                                    Swal.fire({
                                                                        title: '¿Está segur@?',
                                                                        text: "Su comentario será eliminado de forma permanente ",
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#3085d6',
                                                                        cancelButtonColor: '#d33',
                                                                        confirmButtonText: 'Si, eliminar!',
                                                                        cancelButtonText: 'cancelar'
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            this.submit();
                                                                        }
                                                                    })

                                                                });
                                                            </script>
                                                        @endif
                                                    </div>
                                                    <p class="text-gray-400 text-sm">
                                                        {{ \FormatTime::LongTimeFilter($comentario->CreacionComment) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="-mt-4 text-gray-500">{{ $comentario->body }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- component -->
                        <!-- comment form -->



                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card pt-3">
                        <div class="card-header">
                            <h6>También te puede interesar</h6>
                        </div>
                        <div class="card-body">
                            @foreach ($videosRecientes as $video)
                                @if ($video->subs === 1 || $video->PrecioVid == 0)
                                    <div class="d-flex align-items-center mb-4 ">
                                        <div class="col-5">
                                            @if ($video->PortadaVid)
                                                <img src="{{ Storage::url($video->PortadaVid) }}" alt="Card image">
                                            @else
                                                <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="Card image">
                                            @endif
                                        </div>
                                        <div class="ml-3">
                                            <a href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                <h6>{{ $video->NombreVid }}</h6>
                                            </a>
                                            <small class="mt-1">SUSCRITO</small>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center mb-4 ">
                                        <div class="col-5">
                                            @if ($video->PortadaVid)
                                                <img src="{{ Storage::url($video->PortadaVid) }}" alt="Card image">
                                            @else
                                                <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                    alt="Card image">
                                            @endif
                                        </div>
                                        <div class="ml-3">
                                            <a href="{{ route('cliente.suscripcion.video', $video->idVideo) }}">
                                                <h6>{{ $video->NombreVid }}</h6>
                                            </a>
                                            <small class="mt-1">SUSCRIBETE</small>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('client.componets.footer')
        </div>

    </main>


</x-app-layout>
