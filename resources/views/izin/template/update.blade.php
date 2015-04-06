@extends('layouts.admin')
@section('content')
    <form action='{{route('izin.template.update',['id'=>$template->id])}}' method='post'>
        @include('izin.template._form',['template'=>$template,'button'=>'Ubah'])
    </form>
@endsection
