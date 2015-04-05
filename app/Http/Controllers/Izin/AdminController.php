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
		return view('izin.admin.index');
	}

	public function getRead($id)
	{
		return view('izin.pengguna.read');
	}

	public function getUpdate($id)
	{
		$currentStatus = StatusIzin::where('izin_id',$id)->orderBy('tanggal','desc')->first();
		$listStatus = Status::all();
		$izin = Izin::findOrFail($id);
		return view('izin.admin.update',compact('currentStatus','listStatus','izin'));
	}

	public function postUpdate(Request $request,$id)
	{
		$izin = Izin::findOrFail($id);
		$izin->deskripsi = $request->input('deskripsi');
		$izin->save();

		$statusIzin = new StatusIzin;
		$statusIzin->izin_id = $id;
		$statusIzin->status_id = $request->input('status');
		$statusIzin->tanggal = date("Y-m-d");
		$statusIzin->save();


		return redirect()->route('izin.admin.read',['id'=>$izin->id]);
	}

}
