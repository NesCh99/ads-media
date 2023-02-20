<div>
    <div class="card">
        @if (session('info'))
        <div id="alert" class="alert alert-success alert-dismissible fade show mb-2" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-body">  
            <div class="form-group">
                <label for="nombre">Nombre de la Transmisión en Vivo</label>
                <input class="form-control" type="text" value="{{$video->NombreVid}}" readonly>
            </div>
            @if($hasLivestream)
            <div class="form-group">
                <label for="nombre">Servidor RTMP</label>
                <div class="input-group">
                    <input type="text" id="copy-input-1" class="form-control" readonly value="{{$metadato->StreamServerMetaDato}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="copyText(1)">
                        <i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Clave de Transmisión</label>
                <div class="input-group">
                    <input type="text" id="copy-input-2" class="form-control" readonly value="{{$metadato->StreamKeyMetaDato}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="copyText(2)">
                        <i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div id="alert" class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-exclamation-circle"></i> Inicia primero la transmisión para iniciar en OBS (u otra herramienta)
                </div>
                <label for="nombre">Transmisión: <span class="badge {{$metadato->getStateClass()}} d-inline-block">{{$livestreamState}}</span></label>
                <div class="row">
                    <div class="col-lg-8"> 
                        <video data-shaka-player class="teste" id="video" width="100%" height="100%"
                            poster="{{asset('/img/logo.png')}}">
                            <source src="{{$metadato->StreamHlsMetaDato}}" />
                        </video>
                    </div>
                        
                    @if($metadato->StreamStatusMetaDato == 'starting' || $metadato->StreamStatusMetaDato == 'started')
                    <div class="col-sm-4">
                        <button 
                        wire:click.prevent="stopLivestream()" 
                        type="submit" 
                        class="btn btn-danger" 
                        wire:loading.attr="disabled"
                        >
                            <span wire:loading.remove wire:target="stopLivestream">Detener Transmisión</span>
                            <span wire:loading wire:target="stopLivestream">Deteniendo...</span>
                        </button>
                    </div>
                    @else
                    <div class="col-sm-4">
                        <button 
                        wire:click.prevent="startLivestream()" 
                        type="submit" 
                        class="btn btn-success" 
                        wire:loading.attr="disabled"
                        >
                            <span wire:loading.remove wire:target="startLivestream">Iniciar Transmisión</span>
                            <span wire:loading wire:target="startLivestream">Iniciando...</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @else
            <button 
            wire:click.prevent="createLivestream()" 
            type="submit" 
            class="btn btn-primary" 
            wire:loading.attr="disabled"
            >
                <span wire:loading.remove wire:target="createLivestream">Crear Transmisión en Vivo</span>
                <span wire:loading wire:target="createLivestream">Creando...</span>
            </button>
            @endif
        </div>
    </div>
</div>