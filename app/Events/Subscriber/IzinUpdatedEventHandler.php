<?php namespace App\Events\Subscriber;


use App\Events\Event;
use App\Models\Izin;


//use Illuminate\Queue\SerializesModels;

class IzinUpdatedEventHandler {

	//use SerializesModels;

	public function onIzinUpdatedByAdmin($izin){
		$izin->updated_by_admin = 1;
        $izin->save();
	}

    public function onIzinUpdatedByPengguna($izin){
        $izin->updated_by_pengguna = 1;
        $izin->save();
    }

	public function subscribe($events){
		$events->listen('izin.updated_by_admin','App\Events\Subscriber\IzinUpdatedEventHandler@onIzinUpdatedByAdmin');
		$events->listen('izin.updated_by_pengguna','App\Events\Subscriber\IzinUpdatedEventHandler@onIzinUpdatedByPengguna');
	}
}
