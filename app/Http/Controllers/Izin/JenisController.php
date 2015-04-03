<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// !!! PENTING!!!
// jangan salah import ya
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Models\JenisIzin;
use Validator;
use DB;

class JenisController extends Controller {

	public function getIndex()
	{
		//query pake eloquent
		$list_jenis_izin = JenisIzin::paginate(10);
		//query pake database
		$listdb_jenis_izin = DB::table('jenisizin')->select('*')->get();
		return view('izin.jenis.index',[
			'list_jenis_izin'=>$list_jenis_izin,
			'listdb_jenis_izin'=>$listdb_jenis_izin,
		]);
	}

	//tampilkan form create
	public function getCreate()
	{
		//standarnya bikin objek baru aja trus render
		$jenis_izin = new JenisIzin;
		return view('izin.jenis.create',['jenis_izin'=>$jenis_izin]);
	}

	//handle hasil form create
	//kalo gagal, pergi ke form trus tampilkan pesan kesalahan
	//kalo berhasil, pergi ke index
	public function postCreate()
	{
		//ambil data dari input
		//kalo yang postUpdate, ambil datanya otomatis.
		$data = [
			'nama' => Request::input('nama'),
			'biaya' => Request::input('biaya')
		];
		$validator = Validator::make($data,JenisIzin::$rules);
		
		$jenis_izin = new JenisIzin();
		$jenis_izin->nama = $data['nama'];
		$jenis_izin->biaya = $data['biaya'];

		//gagal
		if ($validator->fails()){
			//tampilin form login sama errornya
			return view('izin.jenis.create',['jenis_izin'=>$jenis_izin,'errors'=>$validator->errors()]);
		} else { //berhasil
			//simpen data
			
			//bawaan Eloquent ORM
			$jenis_izin->save();
			return redirect()->route('izin.jenis.index');
		}
	}

	public function getUpdate($id)
	{
		$jenis_izin = JenisIzin::findOrFail($id);
		return view('izin.jenis.update',['jenis_izin'=>$jenis_izin]);
	}

	public function postUpdate($id)
	{
		//cara lebih males
		$data = Request::except('_token');
		$validator = Validator::make($data,JenisIzin::$rules);
		$jenis_izin = JenisIzin::findOrFail($id);
		$jenis_izin->fill($data);
		if ($validator->fails()){
			return view('izin.jenis.update',['jenis_izin'=>$jenis_izin,'errors'=>$validator->errors()]);
		} else {
			$jenis_izin->save();
			return redirect()->route('izin.jenis.index');
		}
		
	}

	public function getRead($id)
	{
		$jenis_izin = JenisIzin::findOrFail($id);
		return view('izin.jenis.read',['jenis_izin'=>$jenis_izin]);
	}

	public function getDelete($id)
	{
		$jenis_izin = JenisIzin::findOrFail($id);
		$jenis_izin->delete();
		return redirect()->route('izin.jenis.index');
	}

}
