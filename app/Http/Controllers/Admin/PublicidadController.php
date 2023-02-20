<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Deporte;
use App\Models\Publicidad;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class PublicidadController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.publicidades.index')->only('index');
        $this->middleware('can:admin.publicidades.create')->only('create');
        $this->middleware('can:admin.publicidades.edit')->only('edit');
        $this->middleware('can:admin.publicidades.show')->only('show');
        $this->middleware('can:admin.publicidades.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicidades = Publicidad::all();
        return view('admin.publicidades.index', compact('publicidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posicion = count(Publicidad::all()) + 1;
        return view('admin.publicidades.create', compact('posicion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Imagen' => 'required|image|max:5000',
            'Descripcion'=>'required',
            'Url'=>'required',
        ]);
        $portada = Storage::disk('public')->put('publicidades', $request->file('Imagen'));//Guarda la imagen en public/deportes y devuelve el url
        $puclidad = Publicidad::create([
            'PortadaPub' =>$portada ,
            'DescripcionPub' => $request->input('Descripcion'),
            'UrlPub' => $request->input('Url'),
        ]);

        return redirect()->route('admin.publicidades.index', $puclidad)->with('info','la publicidad se  ha sido registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $publicidad = Publicidad::findOrFail($id);
   
        return view('admin.publicidades.edit', compact(['publicidad']));
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
   

        $publicidad = Publicidad::findOrFail($id);
        $request->validate([
            'Imagen' => 'image|max:5000',
            'Descripcion'=>'required',
            'Url'=>'required',
        ]);
    
        if($request->file('Imagen')){
            Storage::disk('public')->delete($publicidad->PortadaPub);
            $portada = Storage::disk('public')->put('publicidades', $request->file('Imagen'));
        }else{
            $portada = $publicidad->PortadaPub;
        }

        $publicidad->update([
            'PortadaPub' =>$portada ,
            'DescripcionPub' => $request->input('Descripcion'),
            'UrlPub' => $request->input('Url'),
        ]);


        return redirect()->route('admin.publicidades.index', $publicidad)->with('info','la publicidad se  ha sido registrado con éxito');


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
