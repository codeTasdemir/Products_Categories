@extends('backend.layouts.master')
@section('title')
    Ürün Listleleme Sayfası
@endsection
@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h5>Ürün Listeleme</h5>
    <a class="btn btn-info text-white" href="{{route('backend.product.create')}}">Yeni Oluştur</a>
  </div>
  <div class="card-body">
    <table class="table table-light table-hover">
      <thead>
        <tr>
          <th scope="col">İd</th>
          <th scope="col">Adı</th>
          <th scope="col">Fiyat</th>
          <th scope="col">Kategori</th>
          <th scope="col" colspan="2" class="text-center">İşlemler</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($products as $product)
          <tr>
              <th scope="row">{{$product->id}}</th>
              <td>{{$product->name}}</td>
              <td>{{$product->price}}</td>
              <td>
                @foreach($product->categories as $cat)
                 <li>{{$cat->name}}</li> 
                @endforeach
              </td>
              <td class="text-center">
                  <a class="btn btn-warning" href="{{route('backend.product.edit',['id'=>$product->id])}}">Düzenle</a>
                  <form class="d-inline-flex" action="{{route('backend.product.delete',['id'=>$product->id])}}" method="post">
                    @csrf
                      <button type="submit" class="btn btn-danger" href="">Sil</a>
                  </form>
              </td>
          
  
          </tr>
          @endforeach
          
      
      </tbody>
    </table>
  </div>
</div>
@endsection