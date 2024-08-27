<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('slides')->insert([
            [ 
                'id_admin'     => 1, 
                'file'      => 'media/slide/slider1.jpg',
                'caption'   => 'ini caption foto slider 1',
                'sumber'   => 'sumber foto slider 1',
                'status'     => 1, 

            ],
            [ 
                'status'     => 1, 
                'id_admin'     => 2, 
                'file'      => 'media/slide/slider2.jpg',
                'caption'   => 'foto slider 2',
                'sumber'   => 'sumber foto slider 2',
            ],
            [ 
                'status'     => 1, 
                'id_admin'     => 2, 
                'file'      => 'media/slide/dem.jpg',
                'caption'   => 'foto dem',
                'sumber'   => 'sumber foto slider dem',
            ],
            [ 
                'status'     => 0, 
                'id_admin'     => 2, 
                'file'      => 'media/slide/slider3.jpg',
                'caption'   => 'foto slider 3',
                'sumber'   => 'sumber foto slider 3',
            ],
            [ 
                'status'     => 1, 
                'id_admin'     => 2, 
                'file'      => 'media/slide/slider4.jpg',
                'caption'   => 'foto slider 4',
                'sumber'   => 'sumber foto slider 4',
            ],
            [ 
                'status'     => 1, 
                'id_admin'     => 2, 
                'file'      => 'media/slide/slider5.jpg',
                'caption'   => 'foto slider 5',
                'sumber'   => 'sumber foto slider 5',
            ],
        ]);
    }
}
