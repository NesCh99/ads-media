@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <div class="card-header bg-dark">
        <div class="row align-items-center">
            <h5><b>INICIO | </b> Videos próximos a iniciar</h5>
        </div>
        <!-- <form action="{{ route('admin.home') }}" method="get">
            <div class="row ">
                <div class="col-md-11 mt-2">
                    <input name="search" type="search" class="form-control" placeholder="Ingresa un nombre de video">
                </div>
                <div class="col-md-1 mt-2">
                    <button type="submit" class="btn btn-outline-light">Buscar</button>
                </div>
            </div>
        </form> -->
    </div>
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@stop

@section('content')

    <div class="row justify-content-center">
        @foreach ($videos as $video)
            <div class="card p-3 m-2" style="width: 15rem;">
                @if ($video->PortadaVid)
                    <img src="{{ Storage::url($video->PortadaVid) }}" class="card-img-top rounded" width="150px"
                        height="150px">
                @else
                    <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top rounded" width="150px" height="150px">
                @endif



                <div class="card-body">
                    <h5 class="card-title"><b>{{ $video->NombreVid }}</b></h5>
                    <p class="card-text">{{ $video->FechaInicioVid }}</p>
                </div>
                @can('admin.videos.show')
                    <a href="{{ route('admin.videos.show', $video) }}" class="btn btn-outline-primary">Ver</a>
                @endcan
            </div>
        @endforeach
    </div>
    {{ $videos->links() }}

    <div class="container mx-auto px-1 py-2 md:py-24">

        <div class="text-white ">

            <div class="relative mb-5">
                <h1 class="mb-2 text-primary">Calendario de Eventos</h1>

            </div>



        </div>

        <!-- <div class="font-bold text-gray-800 text-xl mb-4">
            Schedule Tasks
        </div> -->

        <div class="dark:bg-slate-800 rounded-lg shadow overflow-hidden">

            <div class="flex items-center justify-between py-2 px-1">


                <div id='calendar' class="w-full"></div>
            </div>
        </div>
    </div>



    <script>
        var videos = JSON.parse(`<?php echo $calendario; ?>`);
        console.log(videos);

        var iniciar = JSON.parse(`<?php echo $iniciar; ?>`);
        console.log(iniciar);


        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'

                },
                locale: 'es',
                timeZone: 'local',
                initialDate: iniciar,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: videos
            });

            calendar.render();
        });
    </script>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/main.min.css') }}">


@stop

@section('js')
    <script src="{{ asset('/js/main.min.js') }}"></script>
@stop
