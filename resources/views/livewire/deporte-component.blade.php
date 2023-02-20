<div>
    <!--Page Content-->

    <main class="page has-sidebar">
        <div class="wrapper">
            <div class="container-fluid relative animatedParent animateOnce">
                <div class="animated fadeInUpShort p-5 ml-lg-5 mr-lg-5">
                    <section>
                        <div class="relative my-5">
                           
                            
                        </div>
                        <div class="wrapper">
                            <div class="row has-items-overlay">
                                @foreach ($deportes as $deporte)
                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                                        <figure>
                                            <div class="img-wrapper">
                                                <div class="deportes">
                                                    @if ($deporte->PortadaDep)
                                                        <img src="{{ Storage::url($deporte->PortadaDep) }}"
                                                            alt="/" class="deportes">
                                                    @else
                                                        <img src="https://images.pexels.com/photos/159698/soccer-football-sport-ball-159698.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                            alt="/" class="deportes">
                                                    @endif
                                                </div>
                                                <div class="img-overlay text-white text-center">
                                                    <a href="{{ route('cliente.deporte.show', $deporte->idDeporte) }}">
                                                        <div class="figcaption mt-3">
                                                            <i class="icon-link s-48"></i>
                                                            <h5 class="mt-5">{{ $deporte->NombreDep }}</h5>

                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="figure-title text-center p-2">
                                                    <h5>{{ $deporte->NombreDep }}</h5>

                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{ $deportes->links('vendor.pagination.bootstrap-5') }}
                        <br>
                        <br>
                        @include('client.componets.footer')
                    </section>
                </div>
            </div>
        </div>


    </main>
    <!--Page Content-->
</div>
