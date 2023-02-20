<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Term;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:admin.company.index')->only('index');
        $this->middleware('can:admin.company.create')->only('create','store');
        $this->middleware('can:admin.company.edit')->only('edit');
        $this->middleware('can:admin.company.update')->only('update');
        $this->middleware('can:admin.company.destroy')->only('destroy');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  
     $company = Company::find(1);
     return view('admin.company.index', compact('company'));
    
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
     * @param  int  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.index', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {


        $request->validate([
            'name' => 'required',
            'slogan' => 'required',
            'information' => 'required',
            'image' => 'image|max:5000'

        ]);


        if($request->file('image')){
            Storage::disk('public')->delete($company->image);
            $image = Storage::disk('public')->put('empresa', $request->file('image'));
        }else{
            $image = $company->image;
        }




        $company->update([
        'name' => $request->name,
        'slogan' => $request->slogan,
        'information' => $request->information,
        'image' => $image]);

        return redirect()->route('admin.company.index', $company)->with('info','La información de la empresa  se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
