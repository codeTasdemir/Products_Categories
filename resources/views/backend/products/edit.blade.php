@extends('backend.layouts.master')
@section('title')
    Ürün Düzenleme Sayfası
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Ürün Düzenleme
        </div>
        <div class="card-body">
            <form action="{{route('backend.product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="mb-3">
                      <label for="name" class="form-label">Ürün Adı</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" >
                    </div>
                
                    <div class="mb-3">
                        <label for="description" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{!! $product->description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat</label>
                        <input  type="number" step="0.01"  class="form-control" id="price" name="price" value="{{$product->price}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="categories">Kategoriler</label>
                        <select id="categories" name="categories[]" multiple class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
   
                    @if ($product->image)
                        <div class="mb-3">
                            <label for="currentImage" class="form-label">Mevcut Resim:</label>
                            <div>
                                <img src="{{ asset('storage/'.$product->image) }}" alt="Ürün Resmi" style="width: 150px; height: auto;">
                            </div>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="image" class="form-label">Yeni Resim:</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>


                    <button type="submit" class="btn btn-primary">Düzenle</button>
                  </form>
            
                </form>
        </div>
    </div>
@endsection