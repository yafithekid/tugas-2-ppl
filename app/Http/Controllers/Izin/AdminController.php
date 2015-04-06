<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StatusIzin;
use App\Models\Status;
use App\Models\Izin;

use Illuminate\Http\Request;

class AdminController extends Controller {
	public function getIndex()
	{
		$listIzin = Izin::orderBy('tanggal_pengajuan','desc')->orderBy('updated_by_pengguna','desc')->get();
		return view('izin.admin.index',compact('listIzin'));
	}

	public function getRead($id)
	{
		$izin = Izin::findOrFail($id);
		$izin->updated_by_pengguna = 0;
		$izin->save();
		return view('izin.admin.read',compact('izin'));
	}

	public function getUpdate($id)
	{
		$currentStatus = StatusIzin::where('izin_id',$id)->orderBy('timestamp','desc')->first();
		$listStatus = Status::all();
		$izin = Izin::findOrFail($id);
		return view('izin.admin.update',compact('currentStatus','listStatus','izin'));
	}

	public function postUpdate(Request $request,$id)
	{
		$izin = Izin::findOrFail($id);
		$izin->deskripsi = $request->input('deskripsi');
		$izin->updated_by_admin = 1;
		$izin->save();

		$currentStatus = StatusIzin::where('izin_id',$id)->orderBy('timestamp','desc')->first();

		if ($currentStatus == $request->input('status')) {
			$statusIzin = new StatusIzin;
			$statusIzin->izin_id = $id;
			$statusIzin->status_id = $request->input('status');
			$statusIzin->tanggal = date("Y-m-d");
			$statusIzin->save();
		}

		return redirect()->route('izin.admin.read',['id'=>$izin->id]);
	}


}
