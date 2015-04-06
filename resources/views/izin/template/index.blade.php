<?php
    use Carbon\Carbon;
    var_dump(Carbon::now());
?>
@extends('layouts.admin')

@section('content')
<div>
    {{-- bikin template baru --}}
    <form action='{{route("izin.template.create")}}' method='post'>
        @include('izin.template._form',['template'=>$template,'button'=>'Buat'])
    </form>
</div>
<br/>
@if (count($list_template) > 0)
    <table class='table'>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>

        @foreach($list_template as $template)
        <tr>
            <td>{{$template->nama}}</td>
            <td>
                <a href='{{URL::route("izin.template.update",["id"=>$template->id])}}'><i class='glyphicon glyphicon-pencil'></i></a> 
            </td>
        </tr>
        @endforeach

    </table>
@else
    Data kosong
@endif
@stop
