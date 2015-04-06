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
					<th>URL </th>
				</tr>
                <?php $i = 0; ?>
                @foreach ($izin->dokumens as $dokumen)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$dokumen->nama}}</td>
                    <td>{{$dokumen->url}}</td>
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
