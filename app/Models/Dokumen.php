<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model {

	const STATUS_PENDING = 1;
	const STATUS_OK = 2;
	const STATUS_BERMASALAH = 3;

	protected $table = 'dokumen';
    public $timestamps = false;

}
