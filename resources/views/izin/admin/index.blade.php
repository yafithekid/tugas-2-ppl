@extends('layouts.admin')
@section('content')
<div class='row'>
	<div class ='col-xs-8'>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h7>Izin</h7></div>
			  	<table class='table table-hover' style='font-size:12px;'>
					<tr>
						<th>No. </th>
						<th>Nama </th>
						<th>Jenis </th>
					</tr>
                    <?php $i = 0; ?>
                    @foreach ($listIzin as $izin)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>
                        <a href= {{route('izin.admin.read',['id'=>$izin->id])}}>{{'Izin #'.$izin->id}}</a>
                        @if($izin->updated_by_pengguna)
                        	<span class="label label-primary">Diperbahurui</span>
                        @endif
                    </td>
                        <td>{{$izin->jenisIzin->nama}}</td>
                    </tr>
                    @endforeach
				</table>
			</div>
		</div>
</div>
@endsection