@extends('layouts.admin')
@section('content')
    <form action='{{route("izin.template.create")}}' method='post'>
        <div class='form-header'>Buat Template Baru</div>
        @include('izin.template._form',['template'=>$template,'button'=>'Buat'])
    </form>
@endsection
