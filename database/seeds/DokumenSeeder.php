<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DokumenSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumen')->delete();

        DB::table('dokumen')->insert([
            [
            'id'=>1,
            'nama'=>'Fotocopy Surat Izin Tempat Usaha (SITU)',
            'izin_id'=>1,
            'template_id'=>1,
            'status'=>1
            ],
            [
            'id'=> 2,
            'nama'=> 'Fotocopy KTP Pemohon',
            'izin_id'=>1,
            'template_id'=>2,
            'status'=>1
            ],
            [
            'id'=> 3,
            'nama'=> 'Fotokopi NPWP',
            'izin_id'=> 1,
            'template_id'=> 3,
            'status'=> 1
            ],
            [
            'id'=> 4,
            'nama'=> 'Surat Permohonan Izin Usaha Angkutan',
            'izin_id'=> 1,
            'template_id'=> 4,
            'status'=> 1
            ],
            [
            'id'=> 5,
            'nama'=> 'Surat Izin Usaha Perdagangan',
            'izin_id'=> 1,
            'template_id'=> 5,
            'status'=> 1
            ],
            [
            'id'=> 6,
            'nama'=> 'Foto Garasi/Tempat Penyimpanan Kendaraan',
            'izin_id'=> 1,
            'template_id'=> 6,
            'status'=> 1
            ],
            [
            'id'=> 7,
            'nama'=> 'Fotocopy SK Izin Trayek',
            'izin_id'=> 1,
            'template_id'=> 7,
            'status'=> 1
            ],
            [
            'id'=> 8,
            'nama'=> 'Surat Pernyataan Tidak Melakukan Pengeteman dengan',
            'izin_id'=> 1,
            'template_id'=> 8, 
            'status'=>  1
            ],
            [
            'id'=> 9,
            'nama'=> 'Surat Pernyataan tidak keberatan dari tetangga.',
            'izin_id'=> 1,
            'template_id'=> 11,
            'status'=> 1
            ],
            [
            'id'=>10,
            'nama'=>'Fotocopy Surat Izin Tempat Usaha (SITU)',
            'izin_id'=>2,
            'template_id'=>1,
            'status'=>1
            ],
            [
            'id'=> 11,
            'nama'=> 'Fotocopy KTP Pemohon',
            'izin_id'=>2,
            'template_id'=>2,
            'status'=>1
            ],
            [
            'id'=> 12,
            'nama'=> 'Fotokopi NPWP',
            'izin_id'=> 2,
            'template_id'=> 3,
            'status'=> 1
            ],
            [
            'id'=> 13,
            'nama'=> 'Surat Permohonan Izin Usaha Angkutan',
            'izin_id'=> 2,
            'template_id'=> 4,
            'status'=> 1
            ],
            [
            'id'=> 14,
            'nama'=> 'Surat Izin Usaha Perdagangan',
            'izin_id'=> 2,
            'template_id'=> 5,
            'status'=> 1
            ],
            [
            'id'=> 15,
            'nama'=> 'Foto Garasi/Tempat Penyimpanan Kendaraan',
            'izin_id'=> 2,
            'template_id'=> 6,
            'status'=> 1
            ],
            [
            'id'=> 16,
            'nama'=> 'Fotocopy SK Izin Trayek',
            'izin_id'=> 2,
            'template_id'=> 7,
            'status'=> 1
            ],
            [
            'id'=> 17,
            'nama'=> 'Surat Pernyataan Tidak Melakukan Pengeteman dengan',
            'izin_id'=> 2,
            'template_id'=> 8,
            'status'=>  1
            ],
            [
            'id'=> 18,
            'nama'=> 'Surat Pernyataan tidak keberatan dari tetangga.',
            'izin_id'=> 2,
            'template_id'=> 11, 
            'status'=> 1
            ],
        ]);
    }

}