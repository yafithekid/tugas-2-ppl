@extends('layouts.master')

@section('content')
    <h1>Buat Jenis Izin Baru</h1>
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <form action='{{URL::route("izin.jenis.create.submit")}}' method='post'>
        
        {{-- parameter kedua itu data yang bisa diakses di file form--}}
        @include('izin.jenis._form',['button'=>'Buat','errors'=>$errors,'jenis_izin'=>$jenis_izin])

    </form>

@stop
