<?php

namespace App\Http\Controllers;

use App\Models\Adjunto;
use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Document;
use App\Models\Estudiante;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\DocumentRole;
use App\Models\Seguimiento;

use Illuminate\Support\Facades\Http;

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
        $role = Role::find(2);
        $tipos = Tipo::pluck('title','title')->all();
        // dd($tipos);
        // dd($document->seguimientos);
        return view('formest.index', compact('document', 'role','tipos'));
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

        $request->validate(
            [
            'dni' => 'bail|required|digits_between:8,11',
            'tipo_id' => 'required',
            'titulo' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'celular' => 'required|digits_between:9,13',
            'direccion' => 'required',
            'correo' => 'required|email:rfc,dns',//se puede verificar emails, por dominios xd
            ],
            [
                'dni.required' => 'El campo DNI no puede estar vacío',
                'ruc.digits_between' => 'Ingrese un DNI/RUC válido',
                'tipo_id.required' => 'El tipo de documento no puede estar vacío',
                'nombre.required' => 'El campo NOMBRE no puede estar vacío',
                'apellido_paterno.required' => 'El APELLIDO PATERNO no puede estar vacío',
                'apellido_materno.required' => 'El APELLIDO MATERNO no puede estar vacío',
                'celular.required' => 'El campo CELULAR no puede estar vacío',
                'celular.digits_between' => 'Ingrese un CELULAR válido',
                'direccion.required' => 'La dirección no puede estar vacía',
                'correo.required' => 'El campo CORREO no puede estar vacío',
                'correo.email' => 'Ingrese un CORREO válido',
            ]
        );

        $input = $request->all();



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
        $codigo3 = $document->id.$codigo2;
        $document->codigo_tramite = $codigo3;
        // dd($document);
        $document->save();


        $estudiante = new Estudiante;
        $estudiante->document_id=$document->id;
        $estudiante->nombre = $nombres;
        $estudiante->apellido_paterno = $apellidosp;
        $estudiante->apellido_materno = $apellidosm;
        $estudiante->dni = $dni;
        $estudiante->direccion = $direccion;
        $estudiante->celular = $celular;
        $estudiante->correo = $correo;

        // dd($estudiante);
        $estudiante->save();

        $seguimiento = new Seguimiento;
        $seguimiento->document_id = $document->id;
        $seguimiento->oficina = Role::find(2)->name;
        $seguimiento->oficina_derivada = Role::find(2)->name;
        // dd($seguimiento);
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



        $response = Http::withToken('EAAH30KVd70UBAJ9z6zC8yObWlgjZBk9p6f8WKboR4HLNb89Yddhrv75jw42xtkwnSU7yZBGUKWZArkZAAWa9w29wSlbuV0pgzBUmjZCx17FtJkUNxyXhfnJ9eFzqmlmGd6q1fjrobvLRvPURmtW9BqwPe7PUOzOygPcffEwTsYHUQOCHzKcjew3BDDZCoURqRiOZAqYd0CzQwZDZD')
            ->post('https://graph.facebook.com/v13.0/101298449318580/messages',[

                    "messaging_product"=> "whatsapp",
                    "to"=> "51".$celular,
                    "type"=> "template",
                    "template"=> [
                        "name" => "enviar_codigo",
                        "language" => [
                            "code"=> "es_MX"
                        ],

                        "components"=> [
                           [
                               "type"=> "body",
                               "parameters"=> [
                                   [
                                       "type"=> "text",
                                       "text"=> $nombres." ".$apellidosp." ".$apellidosm
                                   ],
                                   [
                                       "type"=> "text",
                                       "text"=> $codigo3
                                   ]
                               ]
                           ]


                       ]

                    ]

            ]);




        // $titulo = $request->input('titulo');
        // $contenido = $request->input('contenido');

        // $document= new Document;
        // $document->titulo = $titulo;
        // $document->contenido = $contenido;
        // $document->tipo_id = $tipo;
        // dd($document);
        // $document->save();
        return view('enviado',compact('document','estudiante','i'));
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
