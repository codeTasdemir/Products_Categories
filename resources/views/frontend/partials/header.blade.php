<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('index')}}">Ana Sayfa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <div class="dropdown">
            <button onclick="window.location='{{ route("frontend.product.index") }}'"  class="btn btn-secondary dropdown-toggle dropdown-toggle1" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              Ürünler
            </button>
            
            <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2">
              @foreach($menuItems['products'] as $menuProducts)
                <li><a href="{{route('frontend.product.detail',['slug'=>$menuProducts->slug])}}" class="dropdown-item" type="button">{{$menuProducts->name}}</button></li>
              @endforeach
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle dropdown-toggle2" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              Kategoriler
            </button>
            
            <ul class="dropdown-menu dropdown-menu2" aria-labelledby="dropdownMenu2">
              @foreach($menuItems['categories'] as $menuCategory)
                  <li>
                      <a href="" class="dropdown-item" type="button">{{ $menuCategory->name }}</a>
                      
                      @if ($menuCategory->children->isNotEmpty())
                          <ul>
                              @foreach($menuCategory->children as $childCategory)
                                  <li>
                                      <a href="#" class="dropdown-item" type="button">{{ $childCategory->name }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      @endif
                  </li>
              @endforeach
          </ul>
          </div>
        
        </ul>
        <form class="d-flex" role="search" action="{{ route('frontend.product.search') }}" method="GET">
          @csrf
          <input class="form-control me-2" type="search" name="query" placeholder="Site İçinde Arama Yapınız" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Ara</button>
        </form>
      </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
$('document').ready(function() {
    $('.dropdown-toggle1').hover(
        function() {
            $('.dropdown-menu1').addClass('show');
        },
        function() {
            setTimeout(() => {
                if (!$('.dropdown-menu1:hover').length) {
                    $('.dropdown-menu1').removeClass('show');
                }
            }, 100);
        }
    );

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.dropdown-toggle1, .dropdown-menu1').length) {
            $('.dropdown-menu1').removeClass('show');
        }
    });

    $('.dropdown-toggle2').hover(
        function() {
            $('.dropdown-menu2').addClass('show');
        },
        function() {
            setTimeout(() => {
                if (!$('.dropdown-menu2:hover').length) {
                    $('.dropdown-menu2').removeClass('show');
                }
            }, 100); 
        }
    );

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.dropdown-toggle2, .dropdown-menu2').length) {
            $('.dropdown-menu2').removeClass('show');
        }
    });

});
  </script>