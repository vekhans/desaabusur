<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            [
                'id'       => 1,
            	'name'     => 'secret',
                'posisi'   => 'Admin',
                'aturan'   => 'ijo',
                'lengkap'  => 'lengkap1',
            	'email'    => 'secret@gmail.com',
            	'password' => bcrypt('secret'),
            ],
            [
                'id'       => 2,
            	'name'     => 'desa',
                'posisi'   => 'Admin',
                'aturan'   => 'ijo',
                'lengkap'  => 'lengkap2',
            	'email'    => 'desa@gmail.com',
            	'password' => bcrypt('secret'),
            ],
            [
                'id'        => 3,
                'name'      => 'Redaksi penting',
                'posisi'    => 'Redaksi',
                'aturan'    => 'kuning',
                'lengkap'  => 'lengkap3',
                'email'     => 'redaksi@gmail.com',
                'password'  => bcrypt('secret'),
            ],
            [
                'id'        => 4,
                'name'      => 'Wartawan',
                'posisi'    => 'Wartawan',
                'aturan'    => 'mera',
                'lengkap'  => 'lengkap4',
                'email'     => 'wartawan@gmail.com',
                'password'  => bcrypt('secret'),
            ],
            [
                'id'        => 5,
                'posisi'    => 'Wartawan',
                'aturan'    => 'mera',
                'name'      => 'Wartawan askpd',
                'email'     => 'secret2@gmail.com',
                'lengkap'  => 'lengkap5',
                'password'  => bcrypt('secret'),
            ],
            [
                'id'        => 6,
                'posisi'    => 'Tamu',
                'aturan'    => 'itam',
                'name'      => 'Tamu6',
                'lengkap'   => 'lengkap6',
                'email'     => 'tamu@gmail.com',
                'password'  => bcrypt('secret'),
            ], 
            [
                'id'        => 7,
                'posisi'    => 'Redaksi',
                'aturan'    => 'mera',
                'name'      => 'Redaksi7',
                'lengkap'   => 'lengkap7',
                'email'     => 'redaksi2@gmail.com',
                'password'  => bcrypt('secret'),
            ], 
            [
                'id'        => 8,
                'posisi'    => 'Wartawan',
                'aturan'    => 'kuning',
                'name'      => 'Tamu8',
                'lengkap'   => 'lengkap8',
                'email'     => 'tamu1@gmail.com',
                'password'  => bcrypt('secret'),
            ], 
            [
                'id'        => 9,
                'posisi'    => 'Tamu',
                'aturan'    => 'itam',
                'name'      => 'Tamu9',
                'lengkap'   => 'lengkap9',
                'email'     => 'tamu2@gmail.com',
                'password'  => bcrypt('secret'),
            ],
            [
                'id'        => 10,
                'posisi'    => 'Tamu',
                'aturan'    => 'itam',
                'name'      => 'Tamasu10',
                'lengkap'   => 'lengkapsu10',
                'email'     => 'tamusu3@gmail.com',
                'password'  => bcrypt('secret'),
            ],
            [
                'id'        => 11,
                'posisi'    => 'Admin',
                'aturan'    => 'ijo',
                'name'      => 'Admin11',
                'lengkap'   => 'lengkap11',
                'email'     => 'belalang@gmail.com',
                'password'  => bcrypt('belalang'),
            ]
        ]);
    }
}
