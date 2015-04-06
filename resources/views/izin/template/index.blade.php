@extends('layouts.admin')

@section('content')
<div>
    {{-- bikin template baru --}}
    <a href='{{route('izin.template.create')}}' class='btn btn-primary'>Tambah Template Dokumen</a>
</div>
<br/>
@if (count($list_template) > 0)
    <table class='table'>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
            <th>Upload</th>
        </tr>

        @foreach($list_template as $template)
        <tr>
            @if ($template->url == '')
                <td>{{$template->nama}}</td>
            @else
                <td><a href='{{asset($template->url)}}'>{{$template->nama}}</a></td>
            @endif
            <td>
                <a href='{{URL::route("izin.template.update",["id"=>$template->id])}}'><i class='glyphicon glyphicon-pencil'></i></a> 
            </td>
            <td>
                <form action='{{route('izin.template.upload.submit',['id'=>$template->id])}}' method='post' enctype='multipart/form-data'>
                    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                    <input type='file' name='file'/>
                    <input type='submit' class='btn btn-primary' value='Upload'/>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
@else
    Data kosong
@endif
@stop
