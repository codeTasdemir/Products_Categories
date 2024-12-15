<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
   
</head>
<body>
   <div class="row">
    <div class="col-md-2">
        @include('backend.partials.header')
    </div>
    <div class="col-md-10">
        @yield('content')

    </div>
   </div>
    
    {{-- Bu projede footer a gerek yoktu yapmadım :D --}}
    {{-- @include('partials.footer') --}}
    @vite('resources/js/app.js')
</body>
</html>