<?php use App\Models\Dokumen;
	use App\Models\Status;
	use App\Models\Template; ?>
@extends('layouts.pengguna')


@section('content')
	<div class ='row'>
		<h3 style='margin-top:5px;'>Detail Izin: {{$izin->jenisIzin->nama}}</h3>
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
	<div class ='row' style='margin-top:10px;'>
		<div>
            <b>Status</b><br/>
            	<p>{{$izin->getCurrentNamaStatus()}}</p>

            <b>Keterangan</b><br/>
            	@if ($izin->deskripsi == '')
            		<p>---</p>
				@else
					<p>{{$izin->deskripsi}}</p>
				@endif
			<b>Biaya</b><br/>
			<p>
				@if ($izin->biaya == '')
					<p>Akan diberitahukan kemudian</p>
				@else
					<p><span class='currency'>{{$izin->biaya}}</span></p>
				@endif
			</p>
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
						<th>Status</th>
						<th>Upload</th>
					</tr>
                    <?php $i = 0; ?>
                    @foreach ($izin->dokumens as $dokumen)

                    @if (($dokumen->template_id != Template::TEMPLATE_SKRD) || ($izin->getCurrentStatusId() == Status::STATUS_PENYERAHAN_SKRD))
	                    <tr>
	                        <td>{{++$i}}</td>
	                        <td>
	                            {{$dokumen->nama}}<br/>
	                            @if ($dokumen->url == null)
	                            Belum upload file
	                            @else
	                            <a href="{{asset($dokumen->url)}}">Lihat hasil upload</a> 
	                            @endif
	                            |
	                            <a href="{{asset($dokumen->template->url)}}">Download template</a>
	                        </td>
	                        <td>
	                    	@if($dokumen->status == DOKUMEN::STATUS_BELUM)
	                    		<span class = 'label label-default'>Belum Diupload</span>
	                    	@elseif($dokumen->status == DOKUMEN::STATUS_PENDING)
	                    		<span class = 'label label-primary'>Sedang Diperiksa</span>
	                    	@elseif($dokumen->status == DOKUMEN::STATUS_OK)
	                    		<span class = 'label label-success'>Sudah diterima</span>
	                    	@elseif($dokumen->status == DOKUMEN::STATUS_BERMASALAH)
	                    		<span class = 'label label-error'>Bermasalah</span>
	                    	@endif
		                    </td>
	                        <td>
	                            <form class="form-inline" action={{route('izin.pengguna.upload_dokumen',['id'=>$izin->id,'template_id'=>$dokumen->template_id])}} method="post" enctype="multipart/form-data">
	                            	<div>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
	                                <div class="form-group">
	                                    <input type="file" name="file" id="fileToUpload"/>
	                                </div>
	                                <div class="form-group">
	                                    <button class='btn btn-primary btn-sm' type="submit">Submit</input>
	                                </div>
	                            </form>
	                        </td>
	                    </tr>
                    @endif
                    @endforeach
				</table>
			</div>
		</div>
	<div><!-- end Tabel Dokumen -->

	<div class='row'>
		<a href='{{route("izin.pengguna.cancel",['id'=>$izin->id])}}' class="btn btn-danger">Batalkan Izin</a>
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
						<li> {{$status->nama}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@parent
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.currency').formatCurrency({region: 'id-ID'});
    });
</script>
@endsection
