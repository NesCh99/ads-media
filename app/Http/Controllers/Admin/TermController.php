<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Company;

use function PHPUnit\Framework\isNull;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  Term $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Term $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Term $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Term $term)
    {;

        if ($request->body == null) {
            $request->validate([
                'body1' => 'required',

            ]);

            $body = $request->body1;
            $message = "Las políticas de seguridad se actualizó con éxito";
        }


        if ($request->body1==null) {
            $request->validate([
                'body' => 'required',

            ]);

            $body = $request->body;
            $message = "Las Condiciones de use se actualizó con éxito";
        }



        $term->update([
            'body' => $body,
            'company_id' => 1,
        ]);


        $company = Company::find(1);

        return redirect()->route('admin.company.index', $company)->with('info', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Term $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        //
    }
}
