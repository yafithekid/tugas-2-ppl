@extends('layouts.pengguna');

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
						<th>Upload</th>
					</tr>
                    <?php $i = 0; ?>
                    @foreach ($izin->dokumens as $dokumen)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$dokumen->nama}}</td>
                        <td>
                            <form class="form-inline" action={{route('izin.pengguna.upload_dokumen',['id'=>$izin->id])}} method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload"/>
                                </div>
                                <div class="form-group">
                                    <button class='btn btn-primary btn-sm' type="submit">Submit</input>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
				</table>
			</div>
		</div>
	<div><!-- end Tabel Dokumen -->

	<div class='row'>
		<a href='{{route("izin.pengguna.cancel",['id'=>$izin->id])}}' class="btn btn-primary">Batalkan Izin</a>
	</div>

	<br>

	<!-- Log Status -->
	<div class='row'>
		<div class='col-xs-6'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Log Status</h3>
				</div>
				<div class="panel-body">
					<ul>
                        @foreach($list_status as $status)
						<li>{{$status->nama}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection
