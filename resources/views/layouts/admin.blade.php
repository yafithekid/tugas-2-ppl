@extends('layouts.master')
<!-- sidebar -->
<div class='col-xs-4'>
    @include('layouts.sidebar.admin')
</div>
<div class='col-xs-8'>
    @yield('content')
</div>