<!--New Releases-->
<section class="section">
    <div class="d-flex relative align-items-center justify-content-between">
        <div class="mb-4">
            <h4>Deportes</h4>
            <p>Disfruta de tus deportes favoritos</p>
        </div>
        <a href="{{ route('cliente.deportes.index') }}">Ver todos los deportes<i class="icon-angle-right ml-3"></i></a>
    </div>
    <div class="lightSlider has-items-overlay playlist" data-item="6" data-item-lg="3" data-item-md="3" data-item-sm="2"
        data-auto="false" data-pager="false" data-controls="true" data-loop="false">
        @foreach ($deportes as $deporte)
            <div>
                <figure>
                    <div class="img-wrapper">
                        <div class="deportes">
                            @if ($deporte->PortadaDep)
                            <img src="{{ Storage::url($deporte->PortadaDep) }}" alt="/" class="deportes" > 
                            @else
                            <img src="https://images.pexels.com/photos/159698/soccer-football-sport-ball-159698.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="/" class="deportes" > 
                            @endif
                           
                        </div>
                        <div class="img-overlay text-white">
                            <div class="figcaption">
                                <ul class="list-inline d-flex align-items-center justify-content-between">
                                    <li class="list-inline-item">

                                    </li>
                                    <li class="list-inline-item ">
                                        <a
                                            class="no-ajaxy media-url"href="{{ route('cliente.deporte.show', $deporte->idDeporte) }}">
                                            <i class="icon-view-2 s-48"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">

                                    </li>
                                </ul>
                                <div class="text-center mt-5">
                                    <h5>{{ $deporte->NombreDep }}</h5>

                                </div>
                            </div>
                        </div>
                        <div class="figure-title text-center p-2">
                            <h5>{{ $deporte->NombreDep }}</h5>

                        </div>
                    </div>
                </figure>
            </div>
        @endforeach

    </div>
</section>
<!--New Releases-->
