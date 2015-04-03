@extends('layouts.master')

@section('content')
    <h1>Ubah Jenis Izin</h1>
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <form action='{{URL::route("izin.jenis.update.submit",["id"=>$jenis_izin->id])}}' method='post'>
        
        {{-- parameter kedua itu data yang bisa diakses di file form--}}
        @include('izin.jenis._form',['button'=>'Ubah','jenis_izin'=>$jenis_izin,'errors'=>$errors])

    </form>
@stop
