<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model {

	protected $table = 'izin';
    protected $fillable = ['deskripsi','jenisizin_id'];

    public $timestamps = false;
    public static $rules = [
    ];
}
