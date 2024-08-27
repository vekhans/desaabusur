<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KomentarBeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komentar_beritas')->insert([
            [
            	'id' => 1,
                'id_berita' => 1,
                'nama'      => 'berita id 1 ke 1',
                'email'   => 'berita1_1@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 1'
            ],
            [
                'id' => 2,
                'id_berita' => 1,
                'nama'      => 'berita id 1 ke 2',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 2'
            ],
            [
                'id' => 3,
                'id_berita' => 1,
                'nama'      => 'berita id 1 ke 3',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 3'
            ],
            [
                'id' => 4,
                'id_berita' => 1,
                'nama'      => 'berita id 1 ke 4',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 4'
            ],
            [
                'id' => 5,
                'id_berita' => 2,
                'nama'      => 'berita id 2 ke 1',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 2 ke 1'
            ],
            [
                'id' => 6,
                'id_berita' => 1,
                'nama'      => 'berita id 1 ke 5',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 5'
            ],
            [
                'id' => 7,
                'id_berita' => 2,
                'nama'      => 'berita id 2 ke 2',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 2 ke 2'
            ],
            [
                'id' => 8,
                'id_berita' => 3,
                'nama'      => 'berita id 3 ke 1',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 3 ke 1'
            ],
            [
                'id' => 9,
                'id_berita' => 4,
                'nama'      => 'berita id 4 ke 1',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 4 ke 1'
            ],
            [
                'id' => 10,
                'id_berita' => 3,
                'nama'      => 'berita id 3 ke 2',
                'email'   => 'berita2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 3 ke 2'
            ]
        ]);    
    }
}
