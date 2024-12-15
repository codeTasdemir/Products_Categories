@extends('backend.layouts.master')
@section('title')
    Kategori Listleleme Sayfası
@endsection
@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h5>Kategori Listeleme</h4>
    <a class="btn btn-info text-white" href="{{route('backend.category.create')}}">Yeni Oluştur</a>
  </div>
  <div class="card-body">
    <table class="table table-light table-hover">
      <thead>
        <tr>
          <th scope="col">İd</th>
          <th scope="col">Adı</th>
          <th scope="col">Sub Kategori</th>
          <th scope="col" colspan="2" class="text-center">İşlemler</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
          <tr>
              <th scope="row">{{$category->id}}</th>
              <td>{{$category->name}}</td>
              <td>
              @if ($category->children->isNotEmpty())
                  
                      @foreach ($category->children as $child)
                          <li>{{ $child->name }}</li>
                      @endforeach
                  
              @endif
            </td>
            <td class="text-center">
              <a class="btn btn-warning" href="{{route('backend.category.edit',['id'=>$category->id])}}">Düzenle</a>
              <form class="d-inline-flex" action="{{route('backend.category.delete',['id'=>$category->id])}}" method="post">
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