<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TemplateSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template')->delete();

        DB::table('template')->insert([
            ['id'=>1, 'nama'=>'Fotocopy Surat Izin Tempat Usaha (SITU)', 'url'=>NULL],
            ['id'=>2, 'nama'=>'Fotocopy KTP Pemohon', 'url'=>NULL],
            ['id'=>3, 'nama'=>'Fotokopi NPWP', 'url'=>NULL],
            ['id'=>4, 'nama'=>'Surat Permohonan Izin Usaha Angkutan', 'url'=>NULL],
            ['id'=>5, 'nama'=>'Surat Izin Usaha Perdagangan', 'url'=>NULL],
            ['id'=>6, 'nama'=>'Foto Garasi/Tempat Penyimpanan Kendaraan', 'url'=>NULL],
            ['id'=>7, 'nama'=>'Fotocopy SK Izin Trayek', 'url'=>NULL],
            ['id'=>8, 'nama'=>'Surat Pernyataan Tidak Melakukan Pengeteman dengan Materai Rp6000', 'url'=>NULL],
            ['id'=>9, 'nama'=>'Fotocopy Buku Uji', 'url'=>NULL],
            ['id'=>10, 'nama'=>'Fotocopy STNK', 'url'=>NULL],
            ['id'=>11, 'nama'=>'Surat Pernyataan tidak keberatan dari tetangga.', 'url'=>NULL],
            ['id'=>12, 'nama' => 'Bukti Pelunasan SKRD','url'=>NULL]
        ]);
    }

}