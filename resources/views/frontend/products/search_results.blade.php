@extends('frontend.layouts.master')
@section('title')
Arama Sayfası    
@endsection
@section('content')
<div class="container mt-5">
    <h3>"{{ $query }}" için arama sonuçları</h3>
    
    @if ($products->isEmpty())
        <p>Ürün bulunamadı.</p>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card rounded products-card">
                        <div class="card-image">
                            <span class="card-notify-year">{{ $product->created_at }}</span>    
                            <img src="{{ asset('storage/' . $product->image) }}" style="width: 100%; height: auto;">
                        </div>
                        <div class="card-body text-center">
                            <div class="ad-title m-auto">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                                <p class="card-text"><strong>Fiyat:</strong> {{ $product->price }} TL</p>
                            </div>
                        </div>
                        <a class="ad-btn" href="{{ route('frontend.product.detail', ['slug' => $product->slug]) }}">İncele</a>
                    </div>    
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection