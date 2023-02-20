<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Comentario;
use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
class VideoController extends Controller
{


    public function index(){

       
        $campeonatos= Campeonato::paginate(5);
        return  view('client.video.index',compact('campeonatos'));
        
    }

    public function comentario(Request $request,$idVideo){

        $this->validate($request,[
            'body' => 'required'
         ]);
 
       
           
 
         Comentario::create([
         'idCliente' => auth()->user()->id,
         'idVideo' =>$idVideo,
         'body'=> $request->input('body')
         ]);
           
         return redirect()->route('cliente.suscripcion.video',$idVideo)->with(array(
             'message' => 'Comentario Añadido Correctamente'
         ));



    }

    public function destroy (Comentario $comentario){
         
        $cliente = User::findOrFail(auth()->user()->id);
        
        $idVideo =  $comentario->idVideo;
        if($cliente->id === $comentario->idCliente){
            $comentario->delete();
        }

        
        return redirect()->route('cliente.suscripcion.video',$idVideo)->with(array(
            'message' => 'Comentario Añadido Correctamente'
        ));


    }


}
