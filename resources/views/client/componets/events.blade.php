 <!-- title -->
 <div class="col-12">
     <div class="main__title">
         <h2>Campeonatos</h2>

         <a href="{{ route('cliente.campeonatos.index') }}" class="main__link">Ver más <svg
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                 <path
                     d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" />
             </svg></a>
     </div>
 </div>
 <!-- end title -->

 <div class="col-12">
     <div class="main__carousel-wrap">
         <div class="main__carousel main__carousel--events owl-carousel" id="events">
             @foreach ($campeonatos as $campeonato)
                 <div class="event" data-bg="{{ $campeonato->PortadaCam }}"
                     style="background: url(&quot;{{ $campeonato->PortadaCam }}&quot;) center center / cover no-repeat;">

                     @if ($campeonato->Videos->count() == $campeonato->subs && $campeonato->Videos->count()>0)
                         <a href="{{ route('cliente.campeonato.show', $campeonato->idCampeonato) }}"
                             class="event__ticket ">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                 <path
                                     d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z">
                                 </path>
                             </svg>
                             SUSCRITO
                         </a>
                     @else
                         <a href="{{ route('cliente.suscripcion.campeonato', $campeonato->idCampeonato) }}"
                             class="event__ticket">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                 <path
                                     d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z">
                                 </path>
                             </svg>
                             SUSCRIBETE
                         </a>
                     @endif





                     <span class="event__date ">{{ $campeonato->FechaInicioCam }}</span>

                     <h3 class="event__title"><a
                             href="{{ route('cliente.suscripcion.campeonato', $campeonato->idCampeonato) }}">{{ $campeonato->NombreCam }}
                         </a></h3>
                 </div>
             @endforeach


         </div>

         <button class="main__nav main__nav--prev" data-nav="#events" type="button"><svg
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                 <path
                     d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z" />
             </svg></button>
         <button class="main__nav main__nav--next" data-nav="#events" type="button"><svg
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                 <path
                     d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" />
             </svg></button>
     </div>
 </div>
