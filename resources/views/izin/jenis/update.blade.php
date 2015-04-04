@extends('layouts.admin')

@section('content')
    
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <div class='col-xs-6'>
        <div class='form-header'>Ubah Jenis Izin Baru</div>
        <form action='{{URL::route("izin.jenis.update.submit",["id"=>$jenis_izin->id])}}' method='post'>
            
            {{-- parameter kedua itu data yang bisa diakses di file form--}}
            @include('izin.jenis._form',['button'=>'Ubah','jenis_izin'=>$jenis_izin,'errors'=>$errors])

        </form>
    </div>
@stop
