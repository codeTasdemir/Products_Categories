@extends('backend.layouts.master')
@section('title')
    Ürün Ekleme Sayfası
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Ürün Düzenleme
        </div>
        <div class="card-body">
            <form action="{{route('backend.product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="mb-3">
                      <label for="name" class="form-label">Ürün Adı</label>
                      <input type="text" class="form-control" id="name" name="name" value="" >
                    </div>
                
                    <div class="mb-3">
                        <label for="description" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat</label>
                        <input  type="number" step="0.01"  class="form-control" id="price" name="price" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="categories">Kategoriler</label>
                        <select id="categories" name="categories[]" multiple class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
   
                    <div class="mb-3">
                        <label for="image" class="form-label">Resim:</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>


                    <button type="submit" class="btn btn-primary">Ekle</button>
                  </form>
            
                </form>
        </div>
    </div>
@endsection