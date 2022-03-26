<?php

namespace App\Http\Controllers;

use App\Models\Adjunto;
use App\Models\Document;
use App\Models\Externo;
use App\Models\Seguimiento;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
class ExternoController extends Controller
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
        return view('formextern.index', compact('tipos'));
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

        $request->validate(
            [
            'ruc' => 'bail|required|digits_between:8,11',
            'tipo_id' => 'required',
            'titulo' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',

            'celular' => 'required|digits_between:9,13',
            'correo' => 'required|email:rfc,dns',//se puede verificar emails, por dominios xd
            ],
            [
                'ruc.required' => 'El campo DNI/RUC no puede estar vacío',
                'ruc.digits_between' => 'Ingrese un DNI/RUC válido',
                'tipo_id.required' => 'El tipo de documento no puede estar vacío',
                'nombre.required' => 'El campo NOMBRE no puede estar vacío',
                'apellido.required' => 'El campo APELLIDO no puede estar vacío',
                'celular.required' => 'El campo CELULAR no puede estar vacío',
                'celular.digits_between' => 'Ingrese un CELULAR válido',
                'correo.required' => 'El campo CORREO no puede estar vacío',
                'correo.email' => 'Ingrese un CORREO válido',
            ]
        );

        $input = $request->all();
        //dd($input);
        $tipod = $request->input('tipo_id');
        $titulo = $request->input('titulo');
        $detalle = $request->input('contenido');
        $nombres = $request->input('nombre');
        $apellidos = $request->input('apellido');
        $ruc = $request->input('ruc');
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


        $externo = new Externo;
        $externo->document_id=$document->id;
        $externo->nombre = $nombres;
        $externo->apellido = $apellidos;
        $externo->ruc = $ruc;
        $externo->celular = $celular;
        $externo->correo = $correo;

        // dd($estudiante);
        $externo->save();

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
        return view('enviado',compact('document','externo','i'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Externo  $externo
     * @return \Illuminate\Http\Response
     */
    public function show(Externo $externo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Externo  $externo
     * @return \Illuminate\Http\Response
     */
    public function edit(Externo $externo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Externo  $externo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Externo $externo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Externo  $externo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Externo $externo)
    {
        //
    }
}
