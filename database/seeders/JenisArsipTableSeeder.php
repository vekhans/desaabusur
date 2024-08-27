<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class JenisArsipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_arsips')->insert([
        	[
        		'id'        => 1,
                'jenis'     => 'Jurnal', 
                'id_admin'  => 1,  
            ],
            [ 
            	'id'        => 2,
            	'jenis'     => 'Pengumuman', 
                'id_admin'  => 2, 
            ],
            [ 
                'id'        => 3,
                'jenis'     => 'Peraturan', 
                'id_admin'  => 2, 
            ],    
        ]);
    }
}
