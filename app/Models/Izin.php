<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Status;
class Izin extends Model {

	protected $table = 'izin';
    protected $fillable = ['deskripsi','jenisizin_id'];

    public $timestamps = false;
    public static $rules = [
    ];

    public function pengguna(){
        return $this->belongsTo('App\Models\Pengguna','pengguna_id','id');
    }

    public function jenisIzin(){
        return $this->belongsTo('App\Models\JenisIzin','jenisizin_id','id');
    }

    public function dokumens(){
        return $this->hasMany('App\Models\Dokumen','izin_id','id');
    }

    public function status(){
        return $this->belongsToMany('App\Models\Status','status_izin','izin_id','status_id');
    }

    public function  getCurrentNamaStatus(){
        $current_status = $this->status()->orderBy('timestamp','desc')->first();
        if ($current_status == null){
            return '';
        } else {
            return $current_status->nama;
        }
    }
}
