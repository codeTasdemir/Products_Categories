@extends('backend.layouts.master')
@section('title')
    Kategori Ekleme Sayfası
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Kategori Düzenleme
        </div>
        <div class="card-body">
            <form action="{{route('backend.category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="mb-3">
                      <label for="name" class="form-label">Kategori Adı</label>
                      <input type="text" class="form-control" id="name" name="name" value="" >
                    </div>
                
                    <div class="mb-3">
                        <label for="description" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="parents">Kategoriler</label>
                        <select class="form-control" id="parents" name="parents[]" multiple>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </div>
                  </form>
            
                </form>
        </div>
    </div>
@endsection