@extends('layouts.formbase')

@include('formest.header')

@section('contenidoform')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-4">
        <div class="card border-dark">
            <div class="card-header">
                <center><h3>TRAMITE ESTUDIANTES</h3></center>
            </div>
            <div class="card-body">
                {!! Form::open(array('route'=>'forestudiante.store','method'=>'POST','class'=>'mt-2', 'name'=>'enviar' ,'files' => true)) !!}

        <div class="card border-dark">
            <h4 class="card-header border-dark">Datos Personales</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="apellido_paterno" class="form-label">
                        <i class="fa-regular fa-user"></i>
                            Apellido Paterno:
                        <span style="color: red;">*</span>
                        </label>
                        {{-- {!! Form::text('apellido_paterno',null,array('class'=>'form-control','placeholder'=>'Ingrese su apellido paterno')) !!} --}}
                        {!! Form::text('apellido_paterno',old('apellido_paterno'),array('class'=>'form-control '.($errors->has('apellido_paterno') ? 'is-invalid':''),'placeholder'=>'Ingrese su apellido paterno')) !!}
                        @error('apellido_paterno')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellido_materno" class="form-label">
                            <i class="fa-regular fa-user"></i>
                            Apellido Materno:
                            <span style="color: red;">*</span></label>
                        {{-- {!! Form::text('apellido_materno',null,array('class'=>'form-control','placeholder'=>'Ingrese su apellido materno')) !!} --}}
                        {!! Form::text('apellido_materno',old('apellido_materno'),array('class'=>'form-control '.($errors->has('apellido_materno') ? 'is-invalid':''),'placeholder'=>'Ingrese su apellido materno')) !!}
                        @error('apellido_materno')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">
                            <i class="fa-regular fa-user"></i>
                            Nombres:
                        <span style="color: red;">*</span></label>
                        {!! Form::text('nombre',old('nombre'),array('class'=>'form-control '.($errors->has('nombre') ? 'is-invalid':''), 'onkeyup'=>'validarNombres()','onblur'=>'validarNombres()', 'placeholder'=>'Ingrese sus nombres')) !!}
                        <div id="messageNombres" style="color:salmon" hidden>
                            Ingrese Caracteres validos.
                        </div>
                        @error('nombre')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dni" class="form-label">
                            <i class="fa-regular fa-id-card"></i>
                            DNI:
                        <span style="color: red;">*</span>
                        </label>
                        {{-- {!! Form::text('dni',null,array('class'=>'form-control','placeholder'=>'Número de DNI')) !!} --}}
                        {!! Form::text('dni',old('dni'),array('class'=>'form-control '.($errors->has('dni') ? 'is-invalid':''), 'onkeyup'=>'validarDni()','onblur'=>'validarDni()', 'placeholder'=>'Número de DNI')) !!}
                        <div id="messageDni" style="color:salmon" hidden>
                            Ingrese solo números.
                        </div>
                        @error('dni')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="celular" class="form-label">
                            <i class="fa fa-phone"></i>
                            Celular:
                            <span style="color: red;">*</span>
                        </label>
                        {{-- {!! Form::text('celular',null,array('class'=>'form-control','placeholder'=>'Ingrese su celular')) !!} --}}
                        {!! Form::text('celular',old('celular'),array('class'=>'form-control '.($errors->has('celular') ? 'is-invalid':''), 'onkeyup'=>'validarCel()','onblur'=>'validarCel()' ,'placeholder'=>'Ingrese su celular')) !!}
                        <div id="messageCel" style="color:salmon" hidden>
                            Ingrese solo números.
                        </div>
                        @error('celular')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="correo" class="form-label">
                        <i class="fa-regular fa-envelope"></i>
                        Correo Electrónico:
                            <span style="color: red;">*</span>
                        </label>
                        {{-- {!! Form::text('correo',null,array('class'=>'form-control','placeholder'=>'Ingrese su correo electronico')) !!} --}}
                        {!! Form::text('correo',old('correo'),array('class'=>'form-control '.($errors->has('correo') ? 'is-invalid':''),'placeholder'=>'Ingrese su corro electrónico')) !!}
                        @error('correo')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">
                        <i class="fa fa-house"></i>
                        Dirección:
                        <span style="color: red;">*</span>
                        </label>
                        {{-- {!! Form::text('direccion',null,array('class'=>'form-control','placeholder'=>'Ingrese su dirección')) !!} --}}
                        {!! Form::text('direccion',old('direccion'),array('class'=>'form-control '.($errors->has('direccion') ? 'is-invalid':''),'placeholder'=>'Ingrese su corro electrónico')) !!}
                        @error('direccion')
                        <span class="invalid-feedback">
                            <strong> {{$message}} </strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-dark mt-4">
            <h4 class="card-header border-dark">Datos del Documento</h4>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        {{-- <label for="titulo" class="form-label">Titulo: </label>
                        {!! Form::text('titulo','titulo',array('class'=>'form-control')) !!} --}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputGroupSelect01">

                        <i class="fa-regular fa-file"></i>
                        Tipo de Documento:
                        <span style="color: red;">*</span>
                        </label>
                        {!! Form::select('tipo_id[]',$tipos,[],array('class'=>'form-select')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">
                        <i class="fa-regular fa-file-lines"></i>
                        Detalle:

                        </label>
                        {!! Form::textarea('contenido',null,array('class'=>'form-control','placeholder'=>'OPCIONAL','rows'=>'3')) !!}
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                        <i class="fa-regular fa-file-pdf"></i>
                        Archivos Adjuntos:
                        </label>
                    </div>

                    <div class="col-md-10" id="masadjuntos">

                        {{-- {!! Form::file('adjunto1',null,array(['class'=>'form-control'])) !!} --}}
                        {{-- {!! Form::file('adjunto1') !!} --}}
                        <input type="file" class="form-control mb-2" aria-label="Upload" name="adjunto1">
                    </div>
                    <div id="mas" class="col-md-2">
                        <a  class="btn btn-warning" onclick="adjuntos()">Agregar Archivo</a>
                    </div>
                    <div class="col-md-10">
                        <span style="color: red;">Solo archivos no mayor a 15 MB de tamaño.</span>
                    </div>
                    <div id="max" class="col-md-2">
                        <span style="color: red;">Máximo 3 archivos.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <center class="">
                <input type="submit" value="Enviar" class="btn btn-primary" onclick="confirmarenvio()">
                <a href="#" class="btn btn-danger" onclick="cancelar()">Cancelar</a>
            </center>
        </div>
        {!! Form::close() !!}
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
