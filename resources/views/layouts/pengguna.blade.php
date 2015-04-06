<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @section('header')
        @include('layouts.header')
    @show

    <div class='container'>
        <div class='col-sm-3'>@include('layouts.sidebar.pengguna')</div>
        <div class='col-sm-9'>@yield('content')</div>
        
    </div>
    
    @section('footer')
        @include('layouts.footer')
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>
