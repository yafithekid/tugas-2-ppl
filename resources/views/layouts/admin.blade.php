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
        <div class='col-xs-3'>@include('layouts.sidebar.admin')</div>
        <div class='col-xs-8'>@yield('content')</div>
    </div>
    @section('footer')
        @include('layouts.footer')
    @stop

    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>
