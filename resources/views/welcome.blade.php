@extends('layouts.formbase')

@section('contenidoform')
<div class="col-lg-12 col-md-12 text-md-right text-center">
    <div class="">
      <a href="/">
          <img src="https://iestphuancane.edu.pe/wp-content/uploads/2021/07/logo3.png" alt="Back Home" class="" width="1520" height="490" style="max-width:250px;max-height:100px" data-no-retina="">
      </a>
    </div>
  </div>
<header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <h2>SISTEMA DE TRAMITES</h2>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg>
                Home
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg>
                Dashboard
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg>
                Orders
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"></use></svg>
                Products
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg>
                Customers
              </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg>
                  Login
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

<div class="container-fluid" style="">
    <section class="" style="position: absolute">

    </section>
    <div class="container-fluid mt-3" style="" >
        <img src="https://iestphuancane.edu.pe/wp-content/uploads/2021/06/apsti-1200x500.jpg" class="img-fluid" width="100%" />
        <div class="row" style="position: relative; top: -150px">
            <div class="col-md-2"></div>
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
                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://computacioninteractiva.com/wp-content/uploads/2020/04/GERENCIA3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">ESTUDIANTES</h5>
                              <p class="card-text">Realize su tramite como <strong>ESTUDIANTE</strong>.</p>
                              <div class="col-auto text-center">
                                <a href="/formestd" class="row btn btn-success">Tramite aquí</a>
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
            <div class="col-md-2"></div>
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
