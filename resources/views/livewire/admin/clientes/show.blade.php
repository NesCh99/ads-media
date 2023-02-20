<div>
    <div class="row justify-content-start">
        <div class="col-1 mr-4">
            <button wire:click='changeSus(1)' class="{{$available == 1 ? 'btn btn-dark' : 'btn btn-outline-secondary' }}" id="disponibles">Disponibles</button>
        </div>
        <div class="col-1">
            <button wire:click='changeSus(0)' class="{{$available == 0 ? 'btn btn-dark' : 'btn btn-outline-secondary' }}" id="suscritros">Suscritos</button>
        </div>
    </div>
    <div class="card-body">
        @if(is_null($videos))
            <div class="card-body">
                <p>No existen registros</p>
            </div>
        @else
            <table class="table table-stripe" id="videos">
                <thead class="thead">
                    <tr>
                        <th>VIDEO</th>    
                        <th>CAMPEONATO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <td>{{$video->NombreVid}}</td>
                            <td>{{$video->campeonato->NombreCam}}</td>
                            @if($available == 1)
                                @can('admin.clientes.subscribeVideo')
                                    <td>
                                    {!! Form::model($video, ['route' => ['admin.clientes.subscribeVideo', $cliente, $video], 'method'=>'put']) !!}
                                    <button type="submit" class="btn btn-outline-success">Suscribir</button>
                                    {!! Form::close() !!}
                                    </td>
                                @endcan
                            @else
                                @can('admin.clientes.unsubscribeVideo')
                                    <td>
                                    {!! Form::model($video, ['route' => ['admin.clientes.unsubscribeVideo', $cliente, $video], 'method'=>'put']) !!}
                                        <button type="submit"  class="btn btn-outline-danger">Desuscribir</button>
                                    {!! Form::close() !!}
                                    </td>
                                @endcan
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


