<?php

namespace App\Http\Controllers;

use App\Models\Adjunto;
use App\Models\Docente;
use App\Models\Document;
use App\Models\Seguimiento;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tipos = Tipo::pluck('title','title')->all();
        // dd($tipos);
        // dd($document->seguimientos);
        // return view('formdocent.index', compact('tipos'));
        return view('formdocent.index', compact('tipos'));

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //  dd($input);
        $tipod = $request->input('tipo_id');
        $titulo = $request->input('titulo');
        $detalle = $request->input('contenido');
        $nombres = $request->input('nombre');
        $apellidosp = $request->input('apellido_paterno');
        $apellidosm = $request->input('apellido_materno');
        $dni = $request->input('dni');
        $direccion = $request->input('direccion');
        $celular = $request->input('celular');
        $correo = $request->input('correo');

        $tipo = Tipo::where('title',$tipod)->value('id');
        $codigo1 = Str::random(4);

        $codigo2 = now()->format('dmY');
        $document = new Document;
        $document->tipo_id=$tipo;
        // $document->codigo_tramite=Str::uuid()->toString();
        // $document->codigo_tramite=now()->format('mY');
        $document->codigo_tramite=$codigo1;

        $document->titulo = $titulo;
        $document->contenido = $detalle;
        $document->save();

        $document->codigo_tramite = $document->id.$codigo2;
        // dd($document);
        $document->save();


        $docente = new Docente;
        $docente->document_id=$document->id;
        $docente->nombre = $nombres;
        $docente->apellido_paterno = $apellidosp;
        $docente->apellido_materno = $apellidosm;
        $docente->dni = $dni;
        $docente->direccion = $direccion;
        $docente->celular = $celular;
        $docente->correo = $correo;

        // dd($estudiante);
        $docente->save();

        $seguimiento = new Seguimiento;
        $seguimiento->document_id = $document->id;
        $seguimiento->oficina = Role::find(2)->name;
        $seguimiento->oficina_derivada = Role::find(2)->name;
        //dd($seguimiento);
        $seguimiento->save();

        $i=1;
        if($request->file()!=[]){
            $adjuntoss=$request->file();
            foreach ($adjuntoss as $adjuntou){
                $adjuntou = new Adjunto;
                $adjuntou->document_id = $document->id;
                $adjuntou->contenido = $request->file('adjunto'.$i)->store('adjuntos','public');
                $adjuntou->save();
                $i++;
            }
        }
        return view('enviado',compact('document','docente','i'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
