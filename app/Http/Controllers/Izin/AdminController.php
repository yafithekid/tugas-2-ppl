<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StatusIzin;
use App\Models\Status;
use App\Models\Izin;
use App\Models\Dokumen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Session;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth.admin');
	}

	public function getIndex()
	{
		$listIzin = Izin::orderBy('tanggal_pengajuan','desc')->orderBy('updated_by_pengguna','desc')->get();
		return view('izin.admin.index',compact('listIzin'));
	}

	public function getRead($id)
	{
		$izin = Izin::findOrFail($id);
		
		$izin->readedByAdmin();
		return view('izin.admin.read',compact('izin'));
	}

	public function getUpdate($id)
	{
		$currentStatus = StatusIzin::where('izin_id',$id)->orderBy('timestamp','desc')->first();
		$listStatus = Status::all();
		$izin = Izin::findOrFail($id);
		$izin->readedByAdmin();
		return view('izin.admin.update',compact('currentStatus','listStatus','izin'));
	}

	public function postUpdate(Request $request,$id)
	{
		$izin = Izin::findOrFail($id);
		$izin->deskripsi = $request->input('deskripsi');
		$izin->biaya = $request->input('biaya');
		$izin->save();
		Event::fire('izin.updated_by_admin',[$izin]);


		$statusIzin = new StatusIzin;
		$statusIzin->izin_id = $id;
		$statusIzin->status_id = $request->input('status');
		$statusIzin->timestamp = date("Y-m-d H:i:s");
		$statusIzin->save();

		Session::flash('notif-success','Status izin berhasil diubah');
		return redirect()->route('izin.admin.read',['id'=>$izin->id]);
	}

	public function getAgreeDokumen($id,$dokumen_id)
	{
		$dokumen = Dokumen::findOrFail($dokumen_id);
		$dokumen->status = Dokumen::STATUS_OK;
		$dokumen->save();

		$izin = Izin::findOrFail($id);
		Event::fire('izin.updated_by_admin',[$izin]);

		Session::flash('notif-success','Dokumen berhasil di setujui');

		return redirect()->route('izin.admin.read',compact('izin'));
	}

	public function getDisagreeDokumen($id,$dokumen_id)
	{
		$dokumen = Dokumen::findOrFail($dokumen_id);
		$dokumen->status = Dokumen::STATUS_BERMASALAH;
		$dokumen->save();

		$izin = Izin::findOrFail($id);
		Event::fire('izin.updated_by_admin',[$izin]);

		Session::flash('notif-success','Dokumen berhasil ditolak');
		return redirect()->route('izin.admin.read',compact('izin'));
	}

	public function getMarkSpam($id)
	{
		$izin = Izin::findOrFail($id);
		$izin->spam = !$izin->spam;
		$izin->save();
		Event::fire('izin.updated_by_admin',[$izin]);
		return redirect()->route('izin.admin.index');
	}
}
