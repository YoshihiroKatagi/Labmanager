<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 2,
            'labtask_id' => 1,
            'content' => 'オプティカルフローとはどのような手法ですか？',
            'created_at' => '2021-11-12 12:00:00',
            'mention_to' => 1,
        ];
        DB::table('comments')->insert($param);
        
        $param = [
            'user_id' => 1,
            'labtask_id' => 1,
            'content' => 'コーナー検出と特徴点一致判定という2つのポイントによって画像にフローベクトルを表示する手法です。',
            'created_at' => '2021-11-13 12:00:00',
            'mention_to' => 2,
        ];
        DB::table('comments')->insert($param);
        
        $param = [
            'user_id' => 2,
            'labtask_id' => 1,
            'content' => 'なるほど、面白そうですね！',
            'created_at' => '2021-11-13 20:00:00',
            'mention_to' => 2,
        ];
        DB::table('comments')->insert($param);
        
        $param = [
            'user_id' => 1,
            'labtask_id' => 1,
            'content' => '研究室にあるものではだめなのですか？',
            'created_at' => '2021-11-13 12:00:00',
            'mention_to' => 2,
        ];
        DB::table('comments')->insert($param);
        
        $param = [
            'user_id' => 2,
            'labtask_id' => 1,
            'content' => 'VDI-HDMIケーブル、コンバータが必要なのですが、研究室にはないので選定して購入していただく予定です',
            'created_at' => '2021-11-13 21:00:00',
            'mention_to' => 1,
        ];
        DB::table('comments')->insert($param);
        
    }
}
