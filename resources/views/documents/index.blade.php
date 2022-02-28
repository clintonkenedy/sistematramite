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
                
            
                        @can('documento-blog')
                        <a class="btn btn-warning" href="{{ route('documents.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($documents as $doc)
                            <tr>
                                <td style="display: none;">{{ $doc->id }}</td>                                
                                <td>{{ $doc->titulo }}</td>
                                <td>{{ $doc->contenido }}</td>
                                <td>
                                    <form action="{{ route('documents.destroy',$doc->id) }}" method="POST">                                        
                                        @can('editar-documento')
                                        <a class="btn btn-info" href="{{ route('documents.edit',$doc->id) }}">Editar</a>
                                        @endcan

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