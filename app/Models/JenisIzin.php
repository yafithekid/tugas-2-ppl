<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisIzin extends Model {

	//nama tabel. nama variablenya harus $table
    protected $table = 'jenisizin';

    //bawaan laravel. kalo gak dikasih nilai harus ada created_at sama updated_at
    public $timestamps = false;

    //ini buat yang bisa di-fill pake $model->fill
    protected $fillable = ['nama','biaya'];
    //daftar validasi
    //ini variabelnya bikinan sendiri. tapi isi variabelnya tertentu
    //http://laravel.com/docs/5.0/validation 
    public static $rules = [
        'nama' => ['required'],
        'biaya' => ['numeric','required']
    ];
}
