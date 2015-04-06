@extends('layouts.admin')
@section('content')
    <form action='{{route('izin.template.update',['id'=>$template->id])}}' method='post'>
        <div class='form-header'>Ubah Template</div>
        @include('izin.template._form',['template'=>$template,'button'=>'Ubah'])
    </form>
@endsection
