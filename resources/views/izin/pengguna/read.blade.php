@extends('layouts.pengguna');

@section('content')

	<div class ='row'>
		<h2>Detail Izin</h2>
	</div>

	<!-- Pemohon -->
	<div class ='row'>
		<p>Pemohon : Muhammad Yafi</p>
	</div><!-- end of Pemohon -->

	<!-- Keterangan -->
	<div class ='row'>
		<div class="alert alert-info" role="alert">
			<ul>
				<li><p>Keterangan berdasarkan status</p></li>
				<li><p>Keterangan berdasarkan admin</p></li>
			</ul>
		</div>
	</div><!-- end of Keterangan -->

	<!-- Tabel Dokumen -->
	<div class='row'>
		<div class ='col-xs-12'>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h7>Dokumen yang harus dipenuhi</h7></div>
			  	<table class='table table-hover'>
					<tr>
						<th>No. </th>
						<th>Nama </th>
						<th>Status </th>
						<th>Upload </th>
					</tr>

					<tr>
						<td>1. </td>
						<td>Dokumen 1</td>
						<td>Belum diupload</td>
						<td>
							<form class="form-inline" action="#" method="post" enctype="multipart/form-data">
								<div class="form-group">
							    	<input type="file" name="fileToUpload" id="fileToUpload"/>
							   	</div>
							   	<div class="form-group">
							    	<button class='btn btn-primary btn-sm' type="submit">Submit</input>
							    </div>
							</form>
						</td>
					</tr>

					<tr class='warning'>
						<td>2. </td>
						<td>Dokumen 2</td>
						<td>Revisi</td>
						<td>
							<form class="form-inline" action="#" method="post" enctype="multipart/form-data">
								<div class="form-group">
							    	<input type="file" name="fileToUpload" id="fileToUpload"/>
							   	</div>
							   	<div class="form-group">
							    	<button class='btn btn-primary btn-sm' type="submit">Submit</input>
							    </div>
							</form>
						</td>
					</td>

					<tr class='success'>
						<td>2. </td>
						<td>Dokumen 2</td>
						<td>Diterima</td>
						<td>
							<form class="form-inline" action="#" method="post" enctype="multipart/form-data">
								<div class="form-group">
							    	<input type="file" name="fileToUpload" id="fileToUpload"/>
							   	</div>
							   	<div class="form-group">
							    	<button class='btn btn-primary btn-sm' type="submit">Submit</input>
							    </div>
							</form>
						</td>
					</tr>
				</table>
			</div>
		</div>
	<div><!-- end Tabel Dokumen -->

	<div class='row'>
		<a href='#' class="btn btn-primary">Batalkan Izin</a>
		<a href='#' class="btn btn-primary">Ubah Status</a>
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
						<li>27-12-12 Dokumen diterima</li>
						<li>27-13-12 Dokumen disetujui</li>
					</ul>
				</div>
			</div>
		</div>
	</div><!-- Log Status -->

@endsection