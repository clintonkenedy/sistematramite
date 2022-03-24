@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $document->titulo }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">TRAMITE</h3>
                            <div class="row">

                                        <div class="card-header">
                                            <h3>CODIGO DE TRAMITE: {{ $document->codigo_tramite }}</h3>
                                        </div>
                                        <div class="card-body">

                                            <div class="card border-dark">
                                                <h4 class="card-header border-dark">Datos Personales</h4>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="apellido_paterno" class="form-label">
                                                            <i class="fa-regular fa-user"></i>
                                                            <b>Apellido Paterno:</b>
                                                            </label>
                                                            <p>{{ $cliente->apellido_paterno }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="apellido_materno" class="form-label">
                                                                <i class="fa-regular fa-user"></i>
                                                                <b>Apellido Materno:</b>
                                                            </label>
                                                            <p>{{ $cliente->apellido_materno }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="nombre" class="form-label">
                                                                <i class="fa-regular fa-user"></i>
                                                                <b>Nombres:</b>
                                                            </label>
                                                            <p>{{ $cliente->nombre }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="dni" class="form-label">
                                                                <i class="fa-regular fa-id-card"></i>
                                                                <b>DNI:</b>

                                                            </label>
                                                            <p>{{ $cliente->dni }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="celular" class="form-label">
                                                                <i class="fa fa-phone"></i>
                                                                <b>Celular:</b>

                                                            </label>
                                                            <p>{{ $cliente->celular }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="correo" class="form-label">
                                                            <i class="fa-regular fa-envelope"></i>
                                                                <b>Correo Electronico:</b>

                                                            </label>
                                                            <p>{{ $cliente->correo }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="direccion" class="form-label">
                                                            <i class="fa fa-house"></i>
                                                                <b>Dirección:</b>

                                                            </label>
                                                            <p>{{ $cliente->direccion }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-dark mt-4">
                                                <h4 class="card-header border-dark">Datos del Documento</h4>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <label for="titulo" class="form-label">
                                                                <b>Titulo:</b>
                                                            </label>
                                                            <p>{{ $document->titulo }}</p>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label" for="inputGroupSelect01">

                                                            <i class="fa-regular fa-file"></i>
                                                            <b>Tipo de Documento:</b>
                                                            </label>
                                                            <p>{{ $document->tipo->title }}</p>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="contenido" class="form-label">
                                                            <i class="fa-regular fa-file-lines"></i>
                                                            Detalle:

                                                            </label>
                                                            <p>{{ $document->contenido }}</p>
                                                        </div>
                                                        <div class="col-12 mb-3">

                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="" class="form-label">
                                                            <i class="fa-regular fa-file-pdf"></i>
                                                            Archivos Adjuntos:
                                                            </label>


                                                            @foreach ( $document->adjuntos as $adj )
                                                            {{-- <p>{{ $adj->get_contenido  }}</p>  --}}
                                                            <p></p>
                                                            <a target="_blank" href="{{ $adj->get_contenido }}">Ajunto descargar</a>
                                                            {{-- <iframe height="1000" width="1000" src="{{ $adj->get_contenido }}"> --}}

                                                            {{-- </iframe> --}}
                                                            {{-- <div class='embed embed-responsive' style='padding-bottom:90%'>
                                                                <embed src="{{ $adj->get_contenido }}" type="application/pdf" width="100%" height="100%" />
                                                            </div> --}}
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4 mb-4 d-flex justify-content-between">
                                                {{-- <form  action="{{ route('doc.updaterecha',$document->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                        <button type="submit" class="btn btn-danger">Rechazar</button>
                                                </form> --}}
                                                @if ($document->seguimientos->last()->estado=='Pendiente')
                                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#rechazarr">Rechazar</button>


                                                @can('enviar-documento')
                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#enviarr">Derivar</button>

                                                @endcan


                                                <form name="finalizar" action="{{ route('doc.updatefnlzdo',$document->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                        {{-- <button  type="submit" class="btn btn-success" data-toggle="modal" data-target="#enviarr">Finalizar</button>  --}}
                                                        <input type="submit" value="Finalizar" onclick="findocument()" class="btn btn-success" >


                                                </form>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<!-- The Modal -->
<div class="modal" id="enviarr">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Derivar a:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

        {!! Form::model($document,['name'=>'derivar', 'method' => 'PUT','route' => ['doc.update',$document->id]]) !!}

            <select name="oficina" class="custom-select" id="inputGroupSelect01">
            <option selected>Elegir...</option>
            @foreach ($oficinas as $oficina)
                <option value="{{ $oficina->name }}">{{ $oficina->name }}</option>
            @endforeach
            </select>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" value="Enviar" onclick="derivardocumento()"  class="btn btn-primary">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

       {!! Form::close() !!}


      </div>
    </div>
  </div>


  <div class="modal" id="rechazarr">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Rechazar:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         Escriba el motivo:
        {!! Form::model($document,[ 'name'=>'rechazar', 'method' => 'PUT','route' => ['doc.updaterecha',$document->id]]) !!}
            <div class="form-group">

                <textarea name="comentario" class="form-control" rows="5" id="message-text"  ></textarea>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" value="Enviar" onclick="recharzardocument()" class="btn btn-primary">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
       {!! Form::close() !!}


      </div>
    </div>
  </div>
@endsection

