@extends('layouts.master')

@section('content')
<div>
    {{-- generate url berdasarkan route --}}
    <a href='{{URL::route("izin.jenis.create")}}'>Tambah Jenis Izin</a>
</div>
@if (count($list_jenis_izin) > 0)
    <table>
        <tr>
            <th>Nama</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </tr>

        @foreach($list_jenis_izin as $jenis_izin)
        <tr>
            <td>{{$jenis_izin->nama}}</td>
            <td>{{$jenis_izin->biaya}}</td>
            <td>
                <a href='{{URL::route("izin.jenis.read",["id"=>$jenis_izin->id])}}'>Lihat</a> |
                <a href='{{URL::route("izin.jenis.update",["id"=>$jenis_izin->id])}}'>Ubah</a> | 
                <a href='{{URL::route("izin.jenis.delete",["id"=>$jenis_izin->id])}}' onclick='return confirm("Hapus?")'>Hapus</a>
            </td>
        </tr>
        @endforeach

    </table>
@else
    Data kosong
@endif
@stop
