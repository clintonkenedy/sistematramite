@extends('layouts.formbase')

@section('contenidoform')

@include('formest.header')
<div class="container">
    <div ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/355948/pexels-photo-355948.jpeg?" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://images.pexels.com/photos/256417/pexels-photo-256417.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://images.pexels.com/photos/355948/pexels-photo-355948.jpeg?" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        {{-- Carr --}}
    </div>
</div>

<div class="col align-self-center">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="">
                <img src="https://computacioninteractiva.com/wp-content/uploads/2020/04/GERENCIA3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">EXTERNO</h5>
                  <p class="card-text">Realize su tramite como <strong>EXTERNO/EMPRESA</strong>.</p>
                  <div class="col-auto text-center">
                    <a href="#" class="row btn btn-success">Tramite aquí</a>
                </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://computacioninteractiva.com/wp-content/uploads/2020/04/GERENCIA3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">ESTUDIANTES</h5>
                  <p class="card-text">Realize su tramite como <strong>ESTUDIANTE</strong>.</p>
                  <div class="col-auto text-center">
                    <a href="/forestudiante" class="row btn btn-success">Tramite aquí</a>
                </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://computacioninteractiva.com/wp-content/uploads/2020/04/GERENCIA3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">DOCENTES</h5>
                  <p class="card-text">Realize su tramite como <strong>DOCENTE</strong>.</p>
                  <div class="col-auto text-center">
                      <a href="#" class="row btn btn-success">Tramite aquí</a>
                  </div>

                </div>
              </div>
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
                <p class="text-white text-center"><small>Oficina de Tecnologías de Información</small></p>

            </div>
        </div>
    </div>
</footer>
@endsection
