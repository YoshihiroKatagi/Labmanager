<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabtasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'title' => '画像処理',
            'description' => 'OpenCVを利用して超音波画像から手関節角度推定することで、新たな生体信号の可能性を模索する',
            'created_at' => '2021-11-11 00:00:00',
        ];
        DB::table('labtasks')->insert($param);
        
        $param = [
            'user_id' => 1,
            'title' => '進捗報告 準備',
            'description' => '次回の進捗報告に向けて背景の整理、結果の考察を行い、パワーポイントにまとめる',
            'created_at' => '2021-11-12 00:00:00',
        ];
        DB::table('labtasks')->insert($param);
        
        $param = [
            'user_id' => 2,
            'title' => '実験器具選定',
            'description' => '必要な実験器具を選定し、教授に報告する',
            'created_at' => '2021-11-13 00:00:00',
        ];
        DB::table('labtasks')->insert($param);
        
        $param = [
            'user_id' => 2,
            'title' => '画像解析',
            'description' => 'OpenCVを利用して・・・',
            'created_at' => '2021-11-14 00:00:00',
        ];
        DB::table('labtasks')->insert($param);
        
        $param = [
            'user_id' => 3,
            'title' => '論文調査',
            'description' => '関連のある論文を調査し読む',
            'created_at' => '2021-11-15 00:00:00',
        ];
        DB::table('labtasks')->insert($param);
        
        $param = [
            'user_id' => 3,
            'title' => '実験',
            'description' => '必要なデータを収集する',
            'created_at' => '2021-11-16 00:00:00',
        ];
        DB::table('labtasks')->insert($param);
        
    }
}
