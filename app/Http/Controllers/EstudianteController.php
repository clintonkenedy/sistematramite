<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Document;
use App\Models\Estudiante;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\DocumentRole;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $document = Document::find(1);
        $role = Role::find(1);
        return view('formest.index', compact('document', 'role'));
        // return redirect()->route('forestudiante.create',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipos = Tipo::pluck('title','title')->all();
        return view('formest.crear', compact('tipos'));
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
        $input = $request->all();
        // dd($input);
        $tipod = $request->input('tipo_id');
        $titulo = $request->input('titulo');
        $detalle = $request->input('detalle');
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $dni = $request->input('dni');

        $tipo = Tipo::where('title',$tipod)->value('id');
        $codigo1 = Str::random(4);
        $codigo2 = now()->format('mY');
        $document = new Document;
        $document->tipo_id=$tipo;
        // $document->codigo_tramite=Str::uuid()->toString();
        // $document->codigo_tramite=now()->format('mY');
        $document->codigo_tramite=$codigo1.$codigo2;

        $document->titulo = $titulo;
        $document->contenido = $detalle;
        // dd($document);
        $document->save();
        $estudiante = new Estudiante;
        $estudiante->documento_id=$document->id;
        $estudiante->nombre = $nombres;
        $estudiante->apellidos = $apellidos;
        $estudiante->dni = $dni;
        // dd($estudiante);
        $estudiante->save();

        $document_role = new DocumentRole;
        $document_role->document_id = $document->id;
        $document_role->role_id = 2;
        // dd($document_role);
        $document_role->save();

        // $titulo = $request->input('titulo');
        // $contenido = $request->input('contenido');

        // $document= new Document;
        // $document->titulo = $titulo;
        // $document->contenido = $contenido;
        // $document->tipo_id = $tipo;
        // dd($document);
        // $document->save();
        return redirect()->route('forestudiante.index');
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
        //
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
        //
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
