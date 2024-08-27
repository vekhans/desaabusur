<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('profils')->insert([
            'nama'     => 'SKPD VEKY',
            'id_admin'     => 2,
            'lg'     => 123.595460,
            'lt'     => -10.182533,
            'tlpn'     => '085237099522',
            'alamat'     => 'Jl. H. R. Koroh, No. 14 Oepura, Kec. Maulafa, Kota Kupang, Nusa Tenggara Timur, Indonesia',
            'email'     => 'kaka.veky@gmail.com',
            'deskripsi'    => 'Kami adalah  perusahaan di Kupang Yang mengurus Kebutuhan Software (Perangkat Lunak)',
            'keterangan'    => 'santai', 
        ]);
    }
}
