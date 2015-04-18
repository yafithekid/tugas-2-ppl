<?php namespace App\Events\Subscriber;


use App\Events\Event;
use App\Models\Izin;


//use Illuminate\Queue\SerializesModels;

class IzinUpdatedEventHandler {

	//use SerializesModels;

	public function onIzinUpdatedByAdmin($izin){
		\Log::info($izin->biaya);
	}

	public function subscribe($events){
		$events->listen('izin.updated_by_admin','App\Events\Subscriber\IzinUpdatedEventHandler@onIzinUpdatedByAdmin');
		$events->listen('izin.updated_by_pengguna','App\Events\Subscriber\IzinUpdatedEventHandler@onIzinUpdatedByPengguna');
	}
}
