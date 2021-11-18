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
            'image_path' => 'https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/chelseaIcon.jpg',
            'description' => 'チェルシーのロゴです',
        ];
        DB::table('images')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'image_path' => 'https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/opticalflow.jpg',
            'description' => 'オプティカルフローのフローベクトル',
        ];
        DB::table('images')->insert($param);
        
    }
}
