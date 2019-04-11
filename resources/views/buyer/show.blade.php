@extends('layouts.master')

@section('title')
    Compradores
@stop

@section('content')
<div class = "row">
    <div class = "col-sm-6 col-md-6">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Referencia</th>
                <th scope="col">Estado Transacción</th>
                <th scope="col">Total Compra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buyers as $buyer)
                    <tr>
                    <th scope="row">{{ $buyer->id}}</th>
                        <td>{{ $buyer->document}}</td>
                        <td>{{ $buyer->name}}</td>
                        <td>{{ $buyer->lastname}}</td>
                        <td>{{ $buyer->ref}}</td>
                        <td>{{ $buyer->status}}</td>
                        <td>{{ $buyer->totalValue}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop