<?php

use Illuminate\Database\Seeder;

class LabsTableSeeder extends Seeder
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
            'name' => '田中研究室',
            'password' => 'tanaka1234',
            'description' => '生体工学領域の研究室です。',
            'join_id' => 'OsakaUniv_tanakalab',
        ];
        DB::table('labs')->insert($param);
    }
}
