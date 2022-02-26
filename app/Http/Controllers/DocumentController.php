<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-documento|crear-documento|editar-documento|borrar-documento',['only'=>['index']]);
        $this->middleware('permission:crear-documento',['only'=>['create','store']]);
        $this->middleware('permission:editar-documento',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-documento',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::paginate(5);
        return view('documentos.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('documetos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        Document::create($request->all());
        return redirect()->route('documentos.index');
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
    public function edit(Document $documento)
    {
        return view('documentos.editar', compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documento)
    {
        //
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $documento->update($request->all());
        return redirect()->route('documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $documento)
    {
        $documento->delete();
        return redirect()->route('documentos.index');
    }
}
