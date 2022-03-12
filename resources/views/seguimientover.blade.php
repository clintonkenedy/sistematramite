@extends('layouts.formbase')

@include('formest.header')

@section('contenidoform')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-4">
            <div class="card">
                <div class="card-header">
                    <center><h4>Seguimiento de Tramite</h4></center>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>El documento N° <span class="badge bg-danger" >{{ $document->codigo_tramite }}</span>:</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped mt-2">
                            <thead class="table-dark">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Oficinas</th>
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Comentario</th>
                                <th style="color:#fff;">Hora</th>

                            </thead>
                            <tbody>
                                @foreach ($document->seguimientos as $registro)
                                <tr>
                                    <td>{{ $registro->oficina }}</td>
                                    @if ($registro->estado==="Finalizado")
                                        <td><span class="badge bg-success" >{{ $registro->estado }}</span></td>
                                    @else
                                        @if ($registro->estado==="Rechazado")
                                        <td><span class="badge bg-danger" >{{ $registro->estado }}</span></td>
                                        @else
                                        <td><span class="badge bg-primary" >{{ $registro->estado }}</span></td>
                                        @endif
                                    @endif
                                    <td>{{ $registro->comentario }}</td>
                                    <td>{{ $registro->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ubicamos la paginacion a la derecha -->
                <div class="pagination justify-content-end">
                    {{-- {!! $documents->links() !!} --}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
