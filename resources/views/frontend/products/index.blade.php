@extends('frontend.layouts.master')
@section('title')
Ürünler    
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-2">
                <h5>Kategoriler</h5>
                <ul class="list-group" id="categoryList">
                    
                    <select id="categories" class="form-control categories_select" name="categories[]" multiple>
                        <option value="">Tümü</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </ul>
    
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div id="productList" class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            getAllProducts();
            function getAllProducts(){
                $.ajax({
                url: "{{ route('frontend.product.getAllProducts') }}", 
                type: "GET",
                success: function (response) {
                    $('#productList').empty(); 
                    response.forEach(product => {
                        const productDetailUrl = "{{ route('frontend.product.detail', ['slug' => '__slug__']) }}";

                        const productHtml = `
                        <div class="col-md-3">
                            <div class="card rounded products-card">
                                <div class="card-image">
                                    <span class="card-notify-year">${product.created_at}</span>    
                                    <img src="{{ asset('storage') }}/${product.image}" style="width: 100%; height: auto;">
                                </div>
                                <div class="card-body text-center">
                                    <div class="ad-title m-auto">
                                        <h5>${product.name}</h5>
                                        <p>${product.description || ''}</p>
                                        <p class="card-text"><strong>Fiyat:</strong> ${product.price} TL</p>
                                    </div>
                                </div>
                                <a class="ad-btn" href="${productDetailUrl.replace('__slug__', product.slug)}">İncele</a>
                            </div>    
                        </div>
                        `;
                        $('#productList').append(productHtml);
                    });
                },
                error: function () {
                    alert('Hiç ürün eklenmedi!');
                }
                });
            }


            $('#categories').on('change', function () {
                const selectedCategories = $(this).val();  

                $.ajax({
                    url: "{{ route('frontend.product.category.order') }}",
                    type: "GET",
                    data: { categories: selectedCategories },
                    success: function (response) {
                        $('#productList').empty(); 
                        if (response.length > 0) {
                            response.forEach(product => {
                                const productDetailUrl = "{{ route('frontend.product.detail', ['slug' => '__slug__']) }}";
                                const productHtml = `
                                <div class="col-md-3">
                                    <div class="card rounded products-card">
                                        <div class="card-image">
                                            <span class="card-notify-year">${product.created_at}</span>    
                                            <img src="{{ asset('storage') }}/${product.image}" style="width: 100%; height: auto;">
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="ad-title m-auto">
                                                <h5>${product.name}</h5>
                                                <p>${product.description || ''}</p>
                                                <p class="card-text"><strong>Fiyat:</strong> ${product.price} TL</p>
                                            </div>
                                        </div>
                                        <a class="ad-btn" href="${productDetailUrl.replace('__slug__', product.slug)}">İncele</a>
                                    </div>    
                                </div>
                                `;
                                $('#productList').append(productHtml);
                            });
                        } else {
                            getAllProducts();
                        }
                    },
                    error: function () {
                        getAllProducts();
                    }
                });
            });
        });


    </script>

@endsection