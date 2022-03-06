@extends('layouts.formbase');

@section('contenidoform')
<div class="card">
    <div class="card-body">
    <h3>Documento <span class="badge bg-secondary" >{{ $document->titulo }}</span> estuvo en las siguientes oficinas: </h3>
    <table class="table table-striped mt-2">
        <thead style="background-color:#6777ef">                                     
            <th style="display: none;">ID</th>
            <th style="color:#fff;">Oficinas</th>                                                                 
        </thead>
        <tbody>
            @foreach ($document->roles as $registro)
            <tr>
                <td>{{ $registro->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ubicamos la paginacion a la derecha -->
    <div class="pagination justify-content-end">
        {{-- {!! $documents->links() !!} --}}
    </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
    <h3>Oficina <span class="badge bg-secondary" >{{ $role->name }}</span> tiene los siguientes documentos: </h3>
    <table class="table table-striped mt-2">
        <thead style="background-color:#6777ef">                                     
            <th style="display: none;">ID</th>
            <th style="color:#fff;">Documentos</th>                                                                 
        </thead>
        <tbody>
            @foreach ($role->documents as $registro)
            <tr>
                <td>{{ $registro->titulo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ubicamos la paginacion a la derecha -->
    <div class="pagination justify-content-end">
        {{-- {!! $documents->links() !!} --}}
    </div>
    </div>
</div>
<h1>Enviando con exito!</h1>
@endsection