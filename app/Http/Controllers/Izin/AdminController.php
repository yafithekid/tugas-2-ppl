<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

}
