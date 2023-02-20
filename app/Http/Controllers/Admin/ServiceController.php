<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{





    
    public function __construct()
    {
        $this->middleware('can:admin.services.index')->only('index');
        $this->middleware('can:admin.services.create')->only('create','store');
        $this->middleware('can:admin.services.edit')->only('edit','update');
        $this->middleware('can:admin.services.update')->only('update');
        $this->middleware('can:admin.services.destroy')->only('destroy');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $icons = collect([
            ['id' => 1, 'icon' => 'fa-solid fa-video'],
            ['id' => 2, 'icon' => 'fa-solid fa-play'],
            ['id' => 3, 'icon' => 'fa-solid fa-circle-play'],
            ['id' => 4, 'icon' => 'fa-solid fa-headphones'],
            ['id' => 5, 'icon' => 'fa-solid fa-podcast'],
            ['id' => 6, 'icon' => 'fa-solid fa-tv'],
            ['id' => 7, 'icon' => 'fa-solid fa-image'],
            ['id' => 8, 'icon' => 'fa-solid fa-location-dot'],
            ['id' => 9, 'icon' => 'fa-solid fa-music'],
            ['id' => 10, 'icon' => 'fa-regular fa-clipboard'],
            ['id' => 11, 'icon' => 'fa-solid fa-pen'],
            ['id' => 12, 'icon' => 'fa-solid fa-gear'],
            ['id' => 13, 'icon' => 'fa-solid fa-tag'],
            ['id' => 14, 'icon' => 'fa-solid fa-camera'],
            ['id' => 15, 'icon' => 'fa-solid fa-pen-to-square'],
            ['id' => 16, 'icon' => 'fa-regular fa-comments'],
            ['id' => 17, 'icon' => 'fa-solid fa-code'],
            ['id' => 18, 'icon' => 'fa-solid fa-earth-americas'],
            ['id' => 19, 'icon' => 'fa-solid fa-palette'],
            ['id' => 20, 'icon' => 'fa-solid fa-puzzle-piece'],

        ]);


        $company = Company::find(1);
        return view('admin.company.service', compact('company', 'icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $icons = collect([
            ['id' => 1, 'icon' => 'fa-solid fa-video'],
            ['id' => 2, 'icon' => 'fa-solid fa-play'],
            ['id' => 3, 'icon' => 'fa-solid fa-circle-play'],
            ['id' => 4, 'icon' => 'fa-solid fa-headphones'],
            ['id' => 5, 'icon' => 'fa-solid fa-podcast'],
            ['id' => 6, 'icon' => 'fa-solid fa-tv'],
            ['id' => 7, 'icon' => 'fa-solid fa-image'],
            ['id' => 8, 'icon' => 'fa-solid fa-location-dot'],
            ['id' => 9, 'icon' => 'fa-solid fa-music'],
            ['id' => 10, 'icon' => 'fa-regular fa-clipboard'],
            ['id' => 11, 'icon' => 'fa-solid fa-pen'],
            ['id' => 12, 'icon' => 'fa-solid fa-gear'],
            ['id' => 13, 'icon' => 'fa-solid fa-tag'],
            ['id' => 14, 'icon' => 'fa-solid fa-camera'],
            ['id' => 15, 'icon' => 'fa-solid fa-pen-to-square'],
            ['id' => 16, 'icon' => 'fa-regular fa-comments'],
            ['id' => 17, 'icon' => 'fa-solid fa-code'],
            ['id' => 18, 'icon' => 'fa-solid fa-earth-americas'],
            ['id' => 19, 'icon' => 'fa-solid fa-palette'],
            ['id' => 20, 'icon' => 'fa-solid fa-puzzle-piece'],

        ]);


        return view('admin.company.create', compact('icons'));
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
            'name' => 'required',
            'body' => 'required',


        ]);

        $service = Service::create([
            'name' => $request->name,
            'body' => $request->body,
            'icon' => $request->icon,
            'company_id' => 1,
        ]);



        $company = Company::find(1);




        return redirect()->route('admin.services.index', $company)->with('info', 'El servicio: ' . $service->name . ', se ha registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {








        $request->validate([
            'name' => 'required',
            'body' => 'required',


        ]);


        $service->update([
            'name' => $request->name,
            'body' => $request->body,
            'icon' => $request->icon,
            'company_id' => 1,
        ]);

        $name = $service->name;


        $company = Company::find(1);




        return redirect()->route('admin.services.index', $company)->with('info', 'El servicio: ' . $name . ', se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
