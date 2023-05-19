<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        $datenow = date("Y-m-d");
        if($request->input('search')){
            $search = '%'.$request->input('search').'%';
            $videos = Video::where('FechaInicioVid', '>=', $datenow)
            ->where('NombreVid', 'like', $search)
            ->orderBy('FechaInicioVid', 'asc')->paginate(4);
        }else{
            $videos = Video::where('FechaInicioVid', '>=', $datenow)
            ->orderBy('FechaInicioVid', 'asc')->paginate(4);
        }   
        
        
        $eventos = Video::all();
        $i = 0;
    
        $calendario = [];
        foreach ($eventos as $video) {
    
          $calendario[$i] = ['title' => 'Evento : ' . $video->NombreVid, "start" => $video->FechaInicioVid, "url" => 'admin/videos/' . $video->idVideo];
    
          $i++;
        }
    
        $iniciar = json_encode($datenow);
        $calendario = json_encode($calendario);

        return view('admin.index', compact('videos','iniciar','calendario'));
    }

}
