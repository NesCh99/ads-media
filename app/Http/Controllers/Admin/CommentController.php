<?php

namespace App\Http\Controllers\Admin;

use ApiVideo\Client\Model\Video as ModelVideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Video;

class CommentController extends Controller
{





    public function __construct()
    {
        $this->middleware('can:admin.comments.index')->only('index');
        $this->middleware('can:admin.comments.create')->only('create','store');
        $this->middleware('can:admin.comments.edit')->only('edit','update');
        $this->middleware('can:admin.comments.update')->only('update');
        $this->middleware('can:admin.comments.destroy')->only('destroy');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        $comments = Comentario::all();
        return view('admin.comments.index',compact('comments','videos'));

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
     * @param  int  Comentario $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Comentario $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Comentario $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Comentario $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comment)
    {
        $comment->delete();
        $comments = Comentario::all();
        $videos = Video::all();
        return redirect()->route('admin.comments.index',compact('comments','videos'))->with('info','El comentario se ha eliminado con éxito');
    }
}
