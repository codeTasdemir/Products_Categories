@extends('frontend.layouts.master')
@section('title')
Ürünler    
@endsection
@section('content')
   <div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <h3>{{$product->name}}</h3>
            <div class="d-block">
                @if ($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="Ürün Resmi" style="width: auto; height: 400px;">
            @endif
            </div>
            <p> Tarih : {{$product->created_at}}</p>
            <p>
                {{$product->description}}
            </p>
            
        </div>
        <div class="col-md-3">
            <p>Bulunduğu Kategori</p>
            <p>
                @if($product->categories)
                    @foreach($product->categories as $cat)
                        {{$cat->name}} <br>
                    @endforeach
                @endif
            </p>

        </div>
    </div>
   </div>
@endsection