@extends('layouts.formbase')

@include('formest.header')

@section('contenidoform')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4 p-5">
                <div class="card p-3">
                    <div class="row g-0">
                      <div class="col-md-5">
                        <img src="{{ asset('img/code.svg') }}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                          <h5 class="card-title">SEGUIMIENTO DE TRAMITE DOCUMENTARIO</h5>
                          <p class="card-text">A continuación ingrese su código de tramite:</p>
                          {!! Form::open(array('route'=>'forestudiante.store','method'=>'POST')) !!}
                          <div class="row">
                              <div class="col-md-4">
                                  <strong>Código de tramite:</strong>
                              </div>
                              <div class="col-md-4"><input type="text" class="form-control"></div>
                              <div class="col-md-4"></div>
                          </div>
                          <div class="row mt-4">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4"><button type="submit" class="btn btn-success">Consultar</button></div>
                            <div class="col-md-4"></div>
                        </div>

                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

    </div>
@endsection
