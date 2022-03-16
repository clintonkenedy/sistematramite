<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentRole;
use App\Models\Seguimiento;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Shmop;
use Spatie\Permission\Models\Role;

class DocumentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-documento|crear-documento|editar-documento|borrar-documento',['only'=>['index']]);
        $this->middleware('permission:crear-documento',['only'=>['create','store']]);
        $this->middleware('permission:editar-documento',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-documento',['only'=>['destroy']]);
        $this->middleware('permission:enviar-documento',['only'=>['update']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $usuario = User::find($usuario);
        $usuariorol = $usuario->roles->first();
        
        if($usuariorol->id==1){
            // $docs = Document::paginate(5);
            $docs = Document::all();
            // $usuarioroldocs = $usuariorol->documentos;
            $docs = $docs->filter(function ($doc) {
                return $doc->seguimientos->last()->estado == 'Pendiente';
            });
            // dd($docs);
        }else{
            $usuarioroldocs = $usuariorol->documentos;
            $docs = $usuarioroldocs->filter(function ($doc) {
                return $doc->seguimientos->last()->estado == 'Pendiente';
            });
        }

        $documents = Document::paginate(5);
        //dd($usuariorol->documentos->first()->seguimientos->last()->estado);
        $tipos = Tipo::all();
        $oficinas = Role::all();    
        return view('documents.index', compact('documents','tipos','oficinas','usuariorol','docs'));
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
        return view('documents.crear',compact('tipos'));
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
            'tipo_id'=>'required',
            'titulo' => 'required',
            'contenido' => 'required',
            
        ]);
        $nametipo= $request->input('tipo_id');
        $tipo = Tipo::where('title',$nametipo)->value('id');
        $request->merge(['tipo_id' => $tipo]);


        // $titulo = $request->input('titulo');
        // $contenido = $request->input('contenido');

        // $document= new Document;
        // $document->titulo = $titulo;
        // $document->contenido = $contenido;
        // $document->tipo_id = $tipo;
        // dd($document);
        // $document->save();
        Document::create($request->all());
        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
       // dd($document->adjuntos->first()->get_contenido);

        $oficinas = Role::all(); 
        if($document->estudiante){
            $cliente=$document->estudiante;
        }
        elseif($document->docente){
            $cliente=$document->docente;
        }
        else{
            $cliente=$document->externo;
        }
        return view('documents.ver', compact('document','oficinas','cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.editar', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $document->update($request->all());
        return redirect()->route('documents.index');
    }

    public function enviar(Request $request ,Document $doc)
    {
        //
        // request()->validate([
        //     'titulo' => 'required',
        //     'contenido' => 'required',
        // ]);
        $segaprobar =$doc->seguimientos->last();
        $segaprobar->estado = "Aprobado";
        $segaprobar->save();
        // $documentid->request;
        $seguimiento = new Seguimiento;
        $seguimiento->document_id = $doc->id;
        $seguimiento->oficina = $request->oficina;
        $seguimiento->oficina_derivada = $doc->seguimientos->last()->oficina;
        
        //dd($doc->seguimientos->last()->oficina);
        $seguimiento->save();
        
        $doc->role_id = Role::where('name',$request->oficina)->value('id');
        $doc->save();
            

        // $documentrole->role_id=$request->oficina;
        // dd($documentrole);
        // $documentrole->save();

        // $document->update($request->all());
        return redirect()->route('documents.index');
    }
    public function rechazar(Request $request ,Document $doc)
    {
        //
        // request()->validate([
        //     'titulo' => 'required',
        //     'contenido' => 'required',
        // ]);
       
        // $documentid->request;
        $seguimiento = $doc->seguimientos->last();
        
        // $documentrole->document_id=$doc->id;
        // $documentrole->role_id=$request->oficina;
        $seguimiento->estado = "Rechazado";
        if($request->comentario){
            $seguimiento->comentario = $request->comentario;
        }
        


        //  dd($seguimiento);
        $seguimiento->save();
        // $documentrole->estado = "Rechazado";
        // dd($documentrole);
        // $documentrole->save();

        // $document->update($request->all());
        return redirect()->route('documents.index');
    }
    public function finalizado(Document $doc)
    {
 
        $seguimiento = $doc->seguimientos->last();
        $seguimiento->comentario = "Su tramite esta listo";
        $seguimiento->estado = "Finalizado";//finalizado
        $seguimiento->save();
        return redirect()->route('documents.index');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function seguimiento(Request $request){
        
        $document = Document::firstWhere('codigo_tramite', $request->codseguimiento);
        //dd($document);

        return view('seguimientover', compact('document'));

    }
    public function rechazados(){

        $usuario = Auth::user()->id;
        $usuario = User::find($usuario);
        $usuariorol = $usuario->roles->first();
        if($usuariorol->id==1){
            $docs = Document::all();
            // $usuarioroldocs = $usuariorol->documentos;
            $docs = $docs->filter(function ($doc) {
                return $doc->seguimientos->last()->estado == 'Rechazado';
            });
        }else{
            $usuarioroldocs = $usuariorol->documentos;
            $docs = $usuarioroldocs->filter(function ($doc) {
                return $doc->seguimientos->last()->estado == 'Rechazado';
            });
        }
        
        
        $documents = Document::paginate(5);
        // dd($usuariorol->documentos->first()->seguimientos->last()->estado);
        // $plucked = $usuarioroldocs->pluck('speakers.first_day');
        // $filtered = $usuarioroldocs->where('deleted_at', '!=', null);
        
        // $docs = $docspaginate(5);
        // dd($docs);
        $tipos = Tipo::all();
        $oficinas = Role::all();    
        return view('documents.rechazados', compact('docs','tipos','oficinas','usuariorol'));

    }

    public function finalizados(){
        $usuario = Auth::user()->id;
        $usuario = User::find($usuario);
        $usuariorol = $usuario->roles->first();
        if($usuariorol->id==1){
            $docs = Document::all();
            // $usuarioroldocs = $usuariorol->documentos;
            $docs = $docs->filter(function ($doc) {
                return $doc->seguimientos->last()->estado == 'Finalizado';
            });
        }else{
            $usuarioroldocs = $usuariorol->documentos;
            $docs = $usuarioroldocs->filter(function ($doc) {
                return $doc->seguimientos->last()->estado == 'Finalizado';
            });
        }
   
        return view('documents.finalizados', compact('docs'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index');
    }



}
