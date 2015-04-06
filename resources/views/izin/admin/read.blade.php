<?php use App\Models\Dokumen ?>
@extends('layouts.admin')
@section('content')
<div class ='row'>
	<h3>Detail Izin: {{$izin->jenisIzin->nama}}</h3>
</div>

<!-- Pemohon -->
<div class ='row'>
	<div class='col-md-12'>
        <div class='col-md-2'>Nama</div><div class='col-md-10'>{{$izin->pengguna->nama}}</div>
        <div class='col-md-2'>No KTP</div><div class='col-md-10'>{{$izin->pengguna->no_ktp}}</div>
        <div class='col-md-2'>Alamat</div><div class='col-md-10'>{{$izin->pengguna->alamat}}</div>
    </div>
    <div class='clearfix'></div>
</div><!-- end of Pemohon -->

<!-- Keterangan -->
<div class ='row'>
	<div class="alert alert-info" role="alert">
        <p>{{$izin->getCurrentNamaStatus()}}</p>
        <p>{{$izin->deskripsi}}</p>
	</div>
</div><!-- end of Keterangan -->

<!-- Tabel Dokumen -->
<div class='row'>
	<div class ='col-xs-12'>
		<div class="panel panel-primary">
		  <div class="panel-heading"><h7>Dokumen yang harus dipenuhi</h7></div>
		  	<table class='table table-hover' style='font-size:12px;'>
				<tr>
					<th>No. </th>
					<th>Nama </th>
					<th>Status </th>
					<th style="text-align:center;">Operasi </th>
				</tr>
                <?php $i = 0; ?>
                @foreach ($izin->dokumens as $dokumen)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$dokumen->nama}}</td>

                    <!--status Dokumen -->
                    <td>
                    	@if($dokumen->status == DOKUMEN::STATUS_BELUM)
                    		<span class = 'label label-default'>Belum Diupload</span>
                    	@elseif($dokumen->status == DOKUMEN::STATUS_PENDING)
                    		<span class = 'label label-primary'>Sedang Diperiksa</span>
                    	@elseif($dokumen->status == DOKUMEN::STATUS_OK)
                    		<span class = 'label label-success'>Sudah diterima</span>
                    	@elseif($dokumen->status == DOKUMEN::STATUS_BERMASALAH)
                    		<span class = 'label label-warning'>Bermasalah</span>
                    	@endif
                    </td>
                    <!-- end of status Dokumen -->

                    <!--tombol Download -->
                    @if($dokumen->url == '')
                    	<td><a href = {{asset($dokumen->template->url)}} class = 'btn btn-primary btn-sm' disabled>Unduh dokumen</a>
                    	<a href = {{route('izin.admin.dokumen.agree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-success btn-sm' disabled>Setujui</a>
                    	<a href = {{route('izin.admin.dokumen.disagree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-warning btn-sm' disabled>Tidak setujui</a></td>
                    @else
                    	<td><a href = {{asset($dokumen->template->url)}} class = 'btn btn-primary btn-sm'>Unduh dokumen</a>
                    	<a href = {{route('izin.admin.dokumen.agree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-success btn-sm'>Setujui</a>
                    	<a href = {{route('izin.admin.dokumen.disagree',['id'=>$izin->id,'dokumen_id'=>$dokumen->id])}} class = 'btn btn-warning btn-sm'>Tidak setujui</a></td>
                    @endif
                    <!-- end of tombol Download -->
                </tr>
                @endforeach
			</table>
		</div>
	</div>
<div><!-- end Tabel Dokumen -->

<div class='row'>
	<a href={{route('izin.admin.update',['id'=>$izin->id])}} class="btn btn-primary">Ubah Status</a>
</div>

<br>
@endsection
