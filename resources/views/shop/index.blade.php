@extends('layouts.master')

@section('title')
    Shopping Cart
@stop

@section('content')
 @foreach ($products->chunk(3) as $productChunk)
    <div class = "row">
        @foreach ($productChunk as $product)
            <div class = "col-sm-6 col-md-3">
                <div class = "thumbnail">
                    <img src = "{{ $product->imagePath}}" alt = "Generic placeholder thumbnail" class="img-thumbnail">
                </div>
                <div class = "caption">
                    <h3>{{ $product->title}}</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Fusce ut purus vel urna aliquam lobortis ac consectetur felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae metus eleifend, imperdiet ipsum id, iaculis elit. Nullam a nunc vitae orci faucibus porttitor. 
                        Ut tempor, enim ut ornare posuere, lacus erat tempor orci, at pretium eros augue quis orci. Integer sit amet facilisis lorem. </p>
                    <div>
                        <div class="pull-left price">${{ $product->price}}</div>
                        <a href = "#" class = "btn btn-success pull-right" role = "button">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
 @endforeach
    
@stop