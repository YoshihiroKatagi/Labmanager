<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MytasksTableSeeder extends Seeder
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
            'title' => 'OpenCV学習',
            'description' => 'OpenCVの使い方を学ぶ',
            'created_at' => '2021-11-12 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'title' => 'オプティカルフローを学ぶ',
            'description' => 'オプティカルフローについて理解を深める',
            'created_at' => '2021-11-13 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'title' => 'オプティカルフロー実装',
            'description' => '超音波画像にオプティカルフローを実装する',
            'created_at' => '2021-11-14 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
        $param = [
            'labtask_id' => 2,
            'title' => '背景整理',
            'description' => '参考文献をまとめて、背景を固める',
            'created_at' => '2021-11-11 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
        $param = [
            'labtask_id' => 2,
            'title' => 'パワポ作成',
            'description' => '整理したデータをもとに発表資料を作成する',
            'created_at' => '2021-11-15 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'title' => '調査',
            'description' => '必要な機材を調査する',
            'created_at' => '2021-11-16 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
        $param = [
            'labtask_id' => 1,
            'title' => '報告',
            'description' => '必要経費をまとめて報告する',
            'created_at' => '2021-11-17 09:00:00',
            'task_state' => 0,
        ];
        DB::table('mytasks')->insert($param);
        
    }
}
