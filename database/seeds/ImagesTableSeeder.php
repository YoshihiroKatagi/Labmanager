<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'labtask_id' => 1,
            'image_path' => 's3://labmanager-backet/chelseaIcon.jpg',
            'description' => 'チェルシーのロゴです',
        ];
        DB::table('images')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'image_path' => 's3://labmanager-backet/opticalflow.jpg',
            'description' => 'オプティカルフローのフローベクトル',
        ];
        DB::table('images')->insert($param);
        
    }
}
