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
            'image_path' => 'https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/labtask_images/gcFt5iANHM5pr16JyLaWatxGgckitvUAvjChDC5k.png',
            'description' => '画像処理でよく使われる画像です',
        ];
        DB::table('images')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'image_path' => 'https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/labtask_images/GmSeOOHu84OCKjPwXtOR6nHhr2Fu2fnB8p3FuwUu.jpg',
            'description' => 'その他参考画像',
        ];
        DB::table('images')->insert($param);
        
        $param = [
            'labtask_id' => 4,
            'image_path' => 'https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/labtask_images/experiment.jpg',
            'description' => '実験器具',
        ];
        DB::table('images')->insert($param);
        
        $param = [
            'labtask_id' => 6,
            'image_path' => 'https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/labtask_images/article.png',
            'description' => '論文の探し方',
        ];
        DB::table('images')->insert($param);
        
    }
}
