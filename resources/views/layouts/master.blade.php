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
        @yield('content')
    </div>
    
    @section('footer')
        @include('layouts.footer')
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>
