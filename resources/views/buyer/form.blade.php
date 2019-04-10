@extends('layouts.master')

@section('title')
    Checkout
@stop

@section('content')
    <h1>Checkout</h1>
    <p>Llena la información del formulario y da en el boton pagar para proceder con el pago.</p>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    {{ Form::open(['route' => 'buyers.save'] )}}
        <div class="form-group {{ $errors->has('documentType') ? 'has-error' : '' }}">
            {{ Form::label('Tipo Documento: ') }}
            {{ Form::select('documentType', array('CC' => 'Cédula de ciudadanía', 'CE' => 'Cédula de extranjería'), ['class'=>'form-control', 'placeholder'=>'Ingrese el Número']) }}
            <span class="text-danger">
                {{ $errors->first('documentType') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
            {{ Form::label('Número Documento: ')}}
            {{ Form::number('document', old('document'), ['class'=>'form-control', 'placeholder'=>'Ingrese el Número']) }}
            <span class="text-danger">
                {{ $errors->first('document') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{ Form::label('Nombre: ')}}
            {{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre']) }}
            <span class="text-danger">
                {{ $errors->first('name') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
            {{ Form::label('Apellido: ')}}
            {{ Form::text('lastname', old('lastname'), ['class'=>'form-control', 'placeholder'=>'Apellido']) }}
            <span class="text-danger">
                {{ $errors->first('lastname') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{ Form::label('Email: ')}}
            {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Ingrese el correo']) }}
            <span class="text-danger">
                {{ $errors->first('email') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            {{ Form::label('Telefono: ')}}
            {{ Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Ingrese el telefono']) }}
            <span class="text-danger">
                {{ $errors->first('phone') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
            {{ Form::label('Dirección: ')}}
            {{ Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>'Dirección']) }}
            <span class="text-danger">
                {{ $errors->first('address') }}
            </span>
        </div>

        <div class="form-group {{ $errors->has('totalValue') ? 'has-error' : '' }}">
            {{ Form::label('Total compra: '.$totalPrice)}}
        </div>

        <div class="form-group {{ $errors->has('totalValue') ? 'has-error' : '' }}">
            {{ Form::label('IVA: 0')}}
        </div>
        
        <div class="form-group">
            <button class="btn btn-success">Pagar</button>
        </div>
    {{ Form::close() }}

@stop