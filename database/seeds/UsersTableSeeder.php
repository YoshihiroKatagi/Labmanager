<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'lab_id' => 1,
            'name' => '片木良洋',
            'email' => 'katagiyoshihiro@gmail.com',
            'password' => 'katagi111',
            'student_or_not' => 0,
            'thema' => '筋隆起を用いた関節角度推定',
            'background' => '関節角度推定には従来主に筋電を用いられており、その他の生体信号である筋隆起を用いて研究を行うことは有益であり、義手技術へ応用できる可能性がある',
            'motivation' => '義手技術への応用に向けて研究をすることで、よりバリアフリーな社会の実現に貢献したいと考えた',
            'object' => '筋隆起を用いた関節角度推定法を確立し、その精度を評価する',
            'github_account' => 'https://github.com/YoshihiroKatagi',
            'timer_mode' => 1,
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'lab_id' => 1,
            'name' => '田中',
            'email' => 'kkk@gmail.com',
            'password' => 'tanakai111',
            'student_or_not' => 0,
            'thema' => '位相最適化・トポロジー最適化',
            'background' => 'ものの位相を最適化することで理想的な密度の構成を構築できる',
            'motivation' => '形状最適化の前段階として・・・',
            'object' => '～のテスト問題を解き、・・・の位相最適化を考える',
            'timer_mode' => 0,
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'lab_id' => 1,
            'name' => '内田',
            'email' => 'uuu@gmail.com',
            'password' => 'uchidai111',
            'student_or_not' => 0,
            'thema' => 'エクソスーツの開発',
            'background' => '人の動きをサポートするエクソスーツの研究開発が多く行われている。そして・・・',
            'motivation' => '人の肘関節の動きをサポートすることで・・・',
            'object' => '～部分に特化したエクソスーツを開発する',
            'timer_mode' => 0,
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'lab_id' => 1,
            'name' => '小林',
            'email' => 'koba@gmail.com',
            'password' => 'koba111',
            'student_or_not' => 1,
            'timer_mode' => 0,
        ];
        DB::table('users')->insert($param);
        
    }
}
