@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Documentos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-documento')
                        <a class="btn btn-warning" href="{{ route('documents.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">CodigoTramite</th>
                                    <th style="color:#fff;">Tipo Doc</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Tramite de:</th>

                                    <th style="color:#fff;">Derivado por:</th>
                                    <th style="color:#fff;">Oficina Actual:</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                        
                            @foreach ($docs as $doc)
                            <tr>
                                <td style="display: none;">{{ $doc->id }}</td>
                                <td>{{ $doc->codigo_tramite }}</td>
                                <td>
                                    @if(!empty($doc->tipo_id))
                                        {{-- @foreach($usuario->getRoleNames() as $rolName) --}}
                                            <h5><span class="badge badge-dark">{{ $doc->tipo->title }}</span></h5>
                                        {{-- @endforeach --}}
                                    @endif
                                </td>
                                @if (!empty($doc->estudiante))
                                    <td>{{ $doc->estudiante->nombre }}</td>
                                    <td>Estudiante</td>
                                @elseif (!empty($doc->docente))
                                    <td>{{ $doc->docente->nombre }}</td>
                                    <td>Docente</td>
                                @else
                                    <td>{{ $doc->externo->nombre }}</td>
                                    <td>Externo</td>
                                @endif
                                
                                <td>
                                    {{ $doc->seguimientos->last()->oficina_derivada }}
                                </td>
                                <td>
                                    {{ $doc->seguimientos->last()->oficina }},{{ $doc->seguimientos->last()->estado }} 
                                </td>
                                <td>
                                    {{-- {!! Form::open(array('route'=>'doc.update','method'=>'PUT')) !!}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="oficina">Tipo de oficina</label>
                                                {!! Form::select('oficina[]',$oficinas,[],array('class'=>'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>

                                    </div>
                                    {!! Form::close() !!} --}}
                                    {{-- {!! Form::open(array('route'=>'doc.update','method'=>'PUT')) !!} --}}
                                    



                                    <form action="{{ route('documents.destroy',$doc->id) }}" method="POST">
                                        {{-- <form action="{{ route('documents.update',$document->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>                                         --}}
                                        <!-- Default dropright button -->
                                        {{-- <div class="btn-group dropright">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Enviar
                                            </button>
                                            <div class="dropdown-menu">

                                                @foreach ($oficinas as $oficina)
                                                <form action="{{ route('doc.update',$oficina->id) }}" method="GET">
                                                    @csrf
                                                    @method('PUT')

                                                        <button type="submit" class="dropdown-item">{{ $oficina->name }}</button>

                                                </form>
                                                @endforeach
                                            </div>
                                        </div> --}}
                                        @can('editar-documento')
                                        <a class="btn btn-info" href="{{ route('documents.edit',$doc->id) }}">Editar</a>
                                        @endcan
                                        <a class="btn btn-outline-primary" href="{{ route('documents.show',$doc->id) }}">Ver</a>
                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-documento')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>

                                </td>
                                {{-- <td>
                                    @can('editar-documento')
                                    <a class="btn btn-primary" href="{{ route('documents.edit', $documento->id)  }}">Editar</a>
                                    @endcan
                                    @can('borrar-documento')
                                    {!! Form::open(['method'=>'DELETE','route'=>['documents.destroy',$documento->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endcan

                                </td> --}}
                            </tr>
                            @endforeach
                        
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $documents->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
