<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\JenisIzin;

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
		echo date("Y-m-d");
		exit();
	}

	public function getRead($id)
	{
		return view('izin.pengguna.read');
	}

}
