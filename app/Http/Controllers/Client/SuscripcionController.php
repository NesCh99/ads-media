<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Video;
use App\Models\Pago;
use App\Models\Billing;
use Illuminate\Support\Facades\Auth;

class SuscripcionController extends Controller
{
    public function suscripcionCampeonato($idCampeonato)
    {
        $cliente = User::findOrFail(auth()->user()->id);
        $campeonato = Campeonato::findOrFail($idCampeonato);
        $idCampeonato = $campeonato->idCampeonato;
        $campenatoVideos =  $campeonato->Videos()->get();
        $campenatoComprar = Campeonato::where('idCampeonato', $idCampeonato)->get();
        $suscripciones = $cliente->Videos;
        $videoSuscripcion = array();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }
        $videoNoSuscripcion = array();
        $i = 0;
        foreach ($campenatoVideos as $video) {
            //obteniendo datos de la tabla pivot suscripcion
            if (in_array($video->idVideo, $videoSuscripcion)) {
            } else {
                $videoNoSuscripcion[$i] = $video;
                $i++;
            }
        }

        /*cuando se haya determinado los videos del campeonato que no posee subs, se anlaizara el descuento */

        foreach ($campenatoComprar as $campenato) {
            $nombreCampeonato = $campenato->NombreCam;
            $descuentoCampeonato = $campenato->DescuentoCam;
        }

        $videosCampeonato = Video::where('idCampeonato', $idCampeonato)->get();
        $aux1 = count($videosCampeonato); // numero de videos del campeonato
        $aux2 = count($videoNoSuscripcion); //  numero de videos suscritos 

        // cáclulo del subtotal del campeanato 
        $subtotal = 0;

        foreach ($videoNoSuscripcion as $video) {
            $subtotal =  $subtotal +  $video->PrecioVid;
        }

        $descuento = 0;
        if ($aux1 == $aux2) {   // si los videos del campeonato es igual a los videos de no suscripcion se aplica el desucuento  


            $descuento = ($descuentoCampeonato *  $subtotal) / 100;

            $monto =  $subtotal - $descuento;
            // cáclulo del descueto del campeanto
        } else {
            $monto = $subtotal;
        }


        if (Auth::user()->isAdminUser() || $subtotal == 0) {
            $campeonato =  Campeonato::findOrFail($idCampeonato);
            $videoSuscrito = $campeonato->videos;
           
            return  view('client.campeonato.show', compact('campeonato', 'videoSuscrito'));

        } else {

            return view('client.suscripcion.campeonato', compact('videoNoSuscripcion', 'aux1', 'aux2', 'nombreCampeonato', 'descuentoCampeonato', 'subtotal', 'descuento', 'monto', 'idCampeonato', 'cliente', 'campeonato'));
        }
    }


    public function suscripcionVideo($idVideo)
    {
        $video = Video::findOrFail($idVideo);
        $videoGratis = Video::findOrFail($idVideo);
        $aux = Video::latest()->get();
        if (count($aux) <= 6) {
            $videoRescientes = $aux;
        } else {
            $videoRescientes = $aux->take(10);
        }


        $cliente = User::findOrFail(auth()->user()->id);
        $billing = $cliente->billing;




        $suscripciones = $cliente->videos;
        $videoSuscripcion = array();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }



        if (in_array($video->idVideo, $videoSuscripcion)) {
            $video['subs'] = 1;
        } else {
            $video['subs'] = 0;
        }


        if (Auth::user()->isAdminUser() || $videoGratis->PrecioVid == 0) {

            $videosRecientes = $this->videos();
            return view('client.video.player', compact('video', 'videosRecientes'));
        } else {


            if ($video->subs == 1) {


                $videosRecientes = $this->videos();

                return view('client.video.player', compact('video', 'videosRecientes'));
            } else {

                return view('client.suscripcion.video', compact('video', 'cliente', 'billing'));
            }
        }
    }




    public function store(Request $request)
    {


        $idVideo  = $request->input('video');
        $idCampeonato  = $request->input('campeonato');
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Phone' => 'required|string|max:255',
            'Email' => 'required|string|max:255',


        ]);

        Billing::create([
            'name' => $request->input('Nombre'),
            'email' => $request->input('Email'),
            'direccion' => $request->input('Address'),
            'telefono' => $request->input('Phone'),
            'idCliente' => auth()->user()->id
        ]);



        if (!empty($idVideo)) {
            return redirect()->route('cliente.suscripcion.video', $idVideo)->with('info', ' se ha registrado exitosamente');
        } else {
            return redirect()->route('cliente.suscripcion.campeonato', $idCampeonato)->with('info', ' se ha registrado exitosamente');
        }
    }



    public function update(Request $request, $idBilling)
    {

        $billing = Billing::findOrFail($idBilling);
        $idVideo  = $request->input('video');
        $idCampeonato  = $request->input('campeonato');

        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Phone' => 'required|string|max:255',
            'Email' => 'required|string|max:255',


        ]);

        $billing->update([
            'name' => $request->input('Nombre'),
            'email' => $request->input('Email'),
            'direccion' => $request->input('Address'),
            'telefono' => $request->input('Phone'),

        ]);


        if (!empty($idVideo)) {
            return redirect()->route('cliente.suscripcion.video', $idVideo)->with('info', ' se ha registrado exitosamente');
        } else {

            return redirect()->route('cliente.suscripcion.campeonato', $idCampeonato)->with('info', ' se ha registrado exitosamente');
        }
    }










    public function videos()
    {
        $videos = Video::all();
        $cliente = User::findOrFail(auth()->user()->id);
        $suscripciones = $cliente->videos;
        $videoSuscripcion = array();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }
        $i = 0;
        foreach ($videos as $video) {

            if (in_array($video->idVideo, $videoSuscripcion)) {
                $videos[$i]['subs'] = 1;
            } else {
                $videos[$i]['subs'] = 0;
            }
            $i++;
        }

        if (count($videos) <= 10) {
            return $videos;
        } else {
            return $videos->take(10);
        }
    }





    public function pago()
    {

        $pagos = Pago::where('idCliente', auth()->user()->id)->get();

        $detalles = DB::table('detallespagos')->join('pagos', 'pagos.idPago', '=', 'detallespagos.idPago')->get();

        return view('client.suscripcion.pago', compact('pagos'));
    }


    public function suscripcion()
    {

        $cliente = User::findOrFail(auth()->user()->id);
        $suscripciones = $cliente->videos;
        $videoSuscripcion = array();
        $videos = Video::all();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }

        $i = 0;
        $listaVideos = collect([]);
        foreach ($videos as $video) {
            //obteniendo datos de la tabla pivot suscripcion
            if (in_array($video->idVideo, $videoSuscripcion)) {
                $listaVideos[$i] = $video;
            }

            $i++;
        }
        return view('client.suscripcion.index', compact('listaVideos'));
    }
}
