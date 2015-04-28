<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @section('header')
        @include('layouts.pengguna.header')
    @show
    
    @include('layouts.sidebar.pengguna')
    <section id="main-content">
          <section class="wrapper">
            @include('layouts.notification')<br/>
            @yield('content')
          </section>
    </section>
    
    @section('footer')
        @include('layouts.footer')
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>