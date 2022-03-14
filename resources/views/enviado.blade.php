@extends('layouts.formbase')

@include('formest.header')

@section('contenidoform')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-4">
            <div class="card">
                <div class="card-header bg-success">
                    <center>
                        <h4 class="mt-2 text-white">TRAMITE ENVIADO</h4>
                    </center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('img/code.svg') }}" class="img-fluid rounded-start" alt="...">
                          </div>
                        <div class="col-md-7">
                                <h3>Su código de seguimiento para su tramite es: <span id="p1" class="badge bg-primary">{{ $document->codigo_tramite }}</span> <button class="btn" onclick="copiar('p1')"> <span class="badge bg-warning">Copiar</span></button> </h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped mt-2">
                                        <thead class="table-dark">
                                            <th style="color:#fff;">Tipo de Tramite</th>
                                            <th style="color:#fff;">Remitente</th>
                                            <th style="color:#fff;">Detalle</th>
                                            <th style="color:#fff;"># de Documentos Adjuntos</th>
                                            <th style="color:#fff;">Fecha - Hora</th>
                                        </thead>
                                        <tbody>
                                            <td>
                                                {{ $document->tipo_id}}
                                            </td>
                                            <td>{{ $estudiante->nombre }}</td>
                                            <td>{{ $document->contenido }}</td>
                                            <td>{{ $i - 1 }}</td>
                                            <td>{{ $document->created_at }}</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
