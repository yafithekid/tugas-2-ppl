<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

	const STATUS_MELENGKAPI_DOKUMEN = 7;

	protected $table = 'status';
    public $timestamps = false;

    protected $fillable = ['nama'];

    public static $rules = [
        'nama' => ['required']
    ];

}
