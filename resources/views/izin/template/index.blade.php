@extends('layouts.admin')

@section('content')
<div>
    {{-- generate url berdasarkan route --}}
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
            <td></td>
        </tr>
        @endforeach

    </table>
@else
    Data kosong
@endif
@stop
