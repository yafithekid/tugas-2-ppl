<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PenggunaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->delete();

        DB::table('pengguna')->insert([
            ['id'=>'1','password'=>'kevin','nama'=>'Kevin Yudi Utama','alamat'=>'Ciumbuleuit','no_ktp'=>'3471070102940001','email'=>'kevin@gmail.com','is_admin'=>0],
            ['id'=>'2','password'=>'admin','nama'=>'Agirato','alamat'=>'Plesiran','no_ktp'=>'3471070102930001','email'=>'admin@gmail.com','is_admin'=>1]
        ]);
    }

}