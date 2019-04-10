@extends('layouts.master')

@section('title')
    Shopping Cart
@stop

@section('content')
    @if (Session::has('cart'))
       <div class="row">
           <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3 text-center" style="margin:0 auto;" >
               <ul class="list-group">
                   @foreach ($products as $product)
                   <br>
                       <li class="list-group-item">
                           <span class="badge"> {{ $product['qty']}}</span>
                           <strong>{{ $product['item']['title'] }}</strong>
                           <span class="label label-success">{{ $product['price']}}</span>
                           <div class="btn-group">
                               <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="collapse" data-target="#collapseExample{{$product['item']['id']}}" aria-expanded="false" aria-controls="collapseExample">
                                   Accion <span class="caret"></span>
                               </button>
                               <ul class="collapse" id="collapseExample{{$product['item']['id']}}">
                                  <li> <a href="{{ route('product.deleteOne', ['id' => $product['item']['id']])}}">Eliminar 1</a></li>
                                  <li> <a href="">Eliminar todo</a></li>
                               </ul>
                           </div>
                       </li>
                   @endforeach
               </ul>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-6" style="margin:0 auto;">
            <br>
               <strong>Precio total: {{ $totalPrice}}</strong>
           </div>
       </div>
       <hr>
       <div class="row">
           <div class="col-sm-6">
              <button type="button" class="btn btn-success"> Ir a pagar</button>
           </div>
       </div>
    @else
        <div class="row">
            <div class="col-sm-6">
                <h2>No Existen Productos en el carrito</h2>
            </div>
        </div>
    @endif
@stop