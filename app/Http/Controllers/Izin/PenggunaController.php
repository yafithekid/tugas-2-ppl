<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use App\Models\Izin;
use App\Models\JenisIzin;
use App\Models\Dokumen;
use Auth;

class PenggunaController extends Controller {
	public function __construct(){
		$this->middleware('auth');
	}

	//daftar izin dari pengguna
	public function getIndex()
	{
		return view('izin.pengguna.index');
	}

	//bikin izin baru
	public function getCreate()
	{
		$list_jenisizin = JenisIzin::with('templates')->get();
		return view('izin.pengguna.create',[
			'izin'=>new Izin(),
			'list_jenisizin' => $list_jenisizin,
		]);
	}

	public function postCreate()
	{
		$izin = new Izin();
		$izin->jenisizin_id = Request::input('jenisizin_id');
		$izin->pengguna_id = Auth::user()->id;
		$izin->tanggal_pengajuan = date("Y-m-d");
		$izin->save();
		
		return redirect()->route('izin.pengguna.read',['id'=>$izin->id]);
	}

	public function getRead($id)
	{
		$izin = Izin::findOrFail($id);
		$templates = $izin->jenisIzin->templates;
		//generate dokumen
		foreach ($templates as $template) {
			if (Dokumen::where('izin_id','=',$id)->where('template_id','=',$template->id)->first()==null){
				$dokumen = new Dokumen();
				$dokumen->nama = $template->nama;
				$dokumen->izin_id = $id;
				$dokumen->template_id = $template->id;
				$dokumen->save();
			}
		}
		$izin = Izin::where('id','=',$id)->with('dokumens')->first();
		$list_status = $izin->status()->orderBy('tanggal','desc')->get();
		return view('izin.pengguna.read',['izin'=>$izin,'list_status'=>$list_status]);
	}

}
