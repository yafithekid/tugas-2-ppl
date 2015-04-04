<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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

	}

	public function getRead($id)
	{
		return view('izin.pengguna.read');
	}

}
