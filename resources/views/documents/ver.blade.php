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
                            <h3 class="text-center">Dashboard Content</h3>
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                
                                <p>{{ $document->contenido }}</p>
                                </div>
                            </div>
                            <form  action="{{ route('doc.updaterecha',$document->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <button type="submit" class="btn btn-danger">Rechazar</button>                            
                                </div>
                            </form>

                            <form action="{{ route('doc.updatefnlzdo',$document->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <button  type="submit" class="btn btn-success" >Finalizar</button>                            
                                </div>
                            </form>

                        

                            
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

