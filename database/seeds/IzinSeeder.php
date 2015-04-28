<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class IzinSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        Model::unguard();
        DB::table('izin')->delete();

        DB::table('izin')->insert([
            [
                'id' => 1,
                'tanggal_pengajuan' => date('Y-m-d'),
                'status_pembayaran' => 0,
                'pengguna_id' => 1,
                'jenisizin_id' => 1,
                'nama_perusahaan' => 'Kobanter',
                'alamat_perusahaan' => 'Jalan Sadang Serang 10 Bandung',
                'alamat_garasi' => 'Jalan Sadang Serang 10 Bandung',
                'npwp' => '1234567891011',
                'tanggal_perpanjangan' => null,
                'spam' => 0,
            ],
            [
                'id' => 2,
                'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 * (365 * 5)),
                'status_pembayaran' => 1,
                'pengguna_id' => 1,
                'jenisizin_id' => 1,
                'nama_perusahaan' => 'Kobanter',
                'alamat_perusahaan' => 'Jalan Sadang Serang 10 Bandung',
                'alamat_garasi' => 'Jalan Sadang Serang 10 Bandung',
                'npwp' => '1234567891011',
                'tanggal_perpanjangan' => date('Y-m-d'),
                'spam' => 0
            ]
        ]);
        
    }

}