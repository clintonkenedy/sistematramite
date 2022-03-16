<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-tipo|crear-tipo|editar-tipo|borrar-tipo',['only'=>['index']]);
        $this->middleware('permission:crear-tipo',['only'=>['create','store']]);
        $this->middleware('permission:editar-tipo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-tipo',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::paginate(5);
        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipos.crear');
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
        request()->validate([
            'title'=>'required',
        ]);
        Tipo::create($request->all());
        // $hola=Tipo::create($request->all());
        // $hola->id;
        // dd($hola->id);
        return redirect()->route('tipos.index');
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
    public function edit(Tipo $tipo)
    {
        return view('tipos.editar',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        // request()->validate([
        //     'title'=>'required',
        // ]);
        //dd($request);
        $tipo->title=$request->title;
        $tipo->save();
        return redirect()->route('tipos.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
