<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PenggunaController extends Controller {
	public function getIndex()
	{
		return view('izin.pengguna.index');
	}

	public function getRead($id)
	{
		return view('izin.pengguna.read');
	}

}
