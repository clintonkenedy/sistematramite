@extends('layouts.formbase')

@section('contenidoform')

@include('formest.header')
<div class="container-fluid">
<div class="row">
    <div class="col-md-4" style="background-color: #5d4a5b; padding-bottom: 6em; padding-top: 7em;">
    <a href="/forexterno" class="-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none text-dark">
        <img alt="image" src="{{ asset('img/man.svg') }}" class="rounded mx-auto d-block">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card text-dark bg-light mt-4 text-center">
                        <div class="card-header"> <center>EXTERNO/EMPRESA</center> </div>
                        <div class="card-body">
                          <p class="card-text">Realize su trámite como: <strong>EXTERNO</strong>.</p>
                          <b class="btn btn-success">Tramite aquí</b>
                        </div>
                      </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </a>
    </div>
    <div class="col-md-4" style="background-color: #305f6b; padding-bottom: 8em; padding-top: 7em;">
        <a href="forestudiante" class="-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none text-dark">
            <img alt="image" src="{{ asset('img/student.svg') }}" class="rounded mx-auto d-block">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card text-dark bg-light mt-4 text-center">
                            <div class="card-header"> <center>ESTUDIANTE</center> </div>
                            <div class="card-body">
                              <p class="card-text">Realize su trámite como: <strong>ESTUDIANTE</strong>.</p>
                              <b class="btn btn-success">Tramite aquí</b>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4" style="background-color: #96b2af; padding-bottom: 8em; padding-top: 7em;">
        <a href="/fordocente" class="-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none text-dark">
            <img alt="image" src="{{ asset('img/teacher.svg') }}" class="rounded mx-auto d-block">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card text-dark bg-light mt-4 text-center">
                            <div class="card-header"> <center>DOCENTE</center> </div>
                            <div class="card-body">
                              <p class="card-text">Realize su trámite como: <strong>DOCENTE</strong>.</p>
                              <b class="btn btn-success">Tramite aquí</b>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

        </a>
    </div>
</div>
</div>
<footer class="bg-secondary" style="width: 100%;">
    <div class="bg-dark" style="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-white text-center"><small>Puno - Perú, 2020.</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-white text-center"><small>Oficina de Tecnología</small></p>

            </div>
        </div>
    </div>
</footer>
@endsection
