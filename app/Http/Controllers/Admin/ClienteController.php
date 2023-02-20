<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.show')->only('show');
        $this->middleware('can:admin.clientes.subscribeVideo')->only('subscribeVideo');
        $this->middleware('can:admin.clientes.unsubscribeVideo')->only('unsubscribeVideo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::where('type',User::CLIENT)->paginate(10);
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $cliente)
    {
        $suscripcionesVideos = $cliente->videos()->wherePivot('TipoSus',Video::GIFT)->get();  
        $videos = Video::whereNotIn('idVideo',$suscripcionesVideos->pluck('idVideo')->toArray())->get();
        return view('admin.clientes.show', compact(['cliente', 'videos', 'suscripcionesVideos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function subscribeVideo($idCliente, $idVideo)
    {
        $cliente = User::findOrFail($idCliente);
        $video = Video::find($idVideo);
        $cliente->videos()->attach($video,['TipoSus'=>Video::GIFT,'CreacionSus'=>Carbon::now()]);
        return redirect()->route('admin.clientes.show', $cliente)->with('info', 'Se entregó la suscripción a '.$video->NombreVid);
    }

    public function unsubscribeVideo($idCliente, $idVideo){
        $video = Video::find($idVideo);
        $video->suscripciones()->detach($idCliente);
        $cliente = User::find($idCliente);
        return redirect()->route('admin.clientes.show', $cliente)->with('info', 'Se quitó la suscripción a '.$video->NombreVid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
