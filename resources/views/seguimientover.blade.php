@extends('layouts.formbase')

@include('formest.header')

@section('contenidoform')

<div class="card">
    <div class="card-body">
    <h3>Documento <span class="badge bg-secondary" >{{ $document->titulo }}</span> estuvo en las siguientes oficinas: </h3>
    <table class="table table-striped mt-2">
        <thead style="background-color:#6777ef">                                     
            <th style="display: none;">ID</th>
            <th style="color:#fff;">Oficinas</th>
            <th style="color:#fff;">Estado</th>  
            <th style="color:#fff;">Comentario</th>                                                                

        </thead>
        <tbody>
            @foreach ($document->seguimientos as $registro)
            <tr>
                <td>{{ $registro->oficina }}</td>
                <td>{{ $registro->estado }}</td>
                <td>{{ $registro->comentario }}</td>
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
@endsection
