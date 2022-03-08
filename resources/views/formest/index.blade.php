@extends('layouts.formbase')

@section('contenidoform')
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
          </ul>
        </div>
      </div>
    </div>
  </header>
<div class="container">
    <div class="row">
    
                    
        {!! Form::open(array('route'=>'forestudiante.store','method'=>'POST','class'=>'mt-4')) !!}
        <h2>FORMULARIO ESTUDIANTES</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos Personales</h1>    
        
        
        

                <div class="row">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombres: </label>
                        {!! Form::text('nombre',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="apellido_paterno class="form-label">Apellido Paterno: </label>
                        {!! Form::text('apellido_paterno',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="apellido_materno" class="form-label">Apellido Materno: </label>
                        {!! Form::text('apellido_materno',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI: </label>
                        {!! Form::text('dni',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección: </label>
                        {!! Form::text('direccion',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="celular" class="form-label">Celular: </label>
                        {!! Form::text('celular',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electronico: </label>
                        {!! Form::text('correo',null,array('class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="tipo_id">Tipo de documento</label>
                            {!! Form::select('tipo_id[]',$tipos,[],array('class'=>'form-control')) !!}
                        </div>
                    </div> --}}
                    


                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Datos del Tramite</h1>
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo: </label>
                                {!! Form::text('titulo',null,array('class'=>'form-control')) !!}
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Asunto: </label>
                                {!! Form::select('tipo_id[]',$tipos,[],array('class'=>'form-control')) !!}
                            </div>
                            <div class="mb-3">
                                <label for="contenido" class="form-label">Detalle: </label>
                                {!! Form::textarea('contenido',null,array('class'=>'form-control','placeholder'=>'OPCIONAL','rows'=>'3')) !!}
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Archivos Adjuntos: </label>
                                <input type="file" class="form-control" aria-label="Upload">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Enviar Tramite</button>
                            <a href="/" class="btn btn-danger">Cancelar</a>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div> --}}
                
            

        {!! Form::close() !!}
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
