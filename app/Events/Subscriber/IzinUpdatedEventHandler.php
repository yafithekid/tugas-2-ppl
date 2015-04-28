<?php namespace App\Events\Subscriber;


use App\Events\Event;
use App\Models\Izin;
use App\Models\Pengguna;
use \Mail;
use \Session;

//use Illuminate\Queue\SerializesModels;

class IzinUpdatedEventHandler {

	//use SerializesModels;

	public function onIzinUpdatedByAdmin($izin){
		$izin->updated_by_admin = 1;
        $izin->save();
        $pengguna = $izin->pengguna;
        $data = [
            'izin' => $izin,
        ];
        try {
            Mail::send('izin.pengguna.email_notifikasi', $data, function($message) use ($pengguna)
            {
              $message->from('if3250.p1.kel1@gmail.com', 'Admin Tamanku');
              $message->to($pengguna['email'], $pengguna['name'])->subject('Perubahan status izin angkutan');
            });
        } catch (\Exception $e) {
            Session::set('notif-danger','Email gagal dikirim');
        }
        
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
