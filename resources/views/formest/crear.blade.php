@extends('layouts.formbase');

@section('contenidoform')
<div class="container">
    @if ($errors->any())                                                
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
    <strong>¡Revise los campos!</strong>                        
        @foreach ($errors->all() as $error)                                    
            <span class="badge badge-danger">{{ $error }}</span>
        @endforeach                        
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
{!! Form::open(array('route'=>'forestudiante.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="tipo_id">Tipo de documento</label>
            {!! Form::select('tipo_id[]',$tipos,[],array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            {!! Form::text('titulo',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="detalle">Detalle</label>
            {!! Form::text('detalle',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <h3>Datos Personales: </h3>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="nombres">Nombres</label>
            {!! Form::text('nombres',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            {!! Form::text('apellidos',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="dni">DNI</label>
            {!! Form::text('dni',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
{!! Form::close() !!}



</div>
@endsection