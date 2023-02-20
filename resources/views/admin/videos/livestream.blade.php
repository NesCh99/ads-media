@extends('adminlte::page')

@section('title', 'Videos')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/2.5.12/controls.css">
@livewireStyles
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/2.5.12/shaka-player.ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/3.0.0/shaka-player.compiled.js"></script>
<script defer src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@livewireScripts
<script>
  function copyText(input) {
    if (input == 1) {
        var copyText = document.getElementById("copy-input-1");
    } else {
        var copyText = document.getElementById("copy-input-2");
    }
    copyText.select();
    document.execCommand("copy");
  }
</script>
<script>
    setTimeout(function(){ 
        document.getElementById("alert").remove();
    }, 10000);

</script>
<script>
    document.addEventListener('shaka-ui-loaded', init);
    document.addEventListener('shaka-ui-load-failed', initFailed);

    async function init() {
    const video = document.getElementById('video');
    if (video && video.ui) { // Check if the UI has been set up, first.
        const player = video.ui.getControls().getPlayer();
        const stats = player.getStats();
        console.log(
        setTimeout(function(){
            console.log(stats);
        },5500));
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
@endsection
@section('content_header')
<div class="card bg-dark">
    <div class="card-body">
        <h5><b>TRANSMISIÓN EN VIVO</b></h5>
    </div>
</div>
@stop
@if(session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@section('content')
    <livewire:admin.videos.livestream-module :idVideo="$idVideo"/>
@stop
