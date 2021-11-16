<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
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
            'title' => 'ゴミ出し',
            'date' => '2021-11-18',
            'start_at' => '15:00:00',
            'end_at' => '15:15:00',
            'repeat' => 2,
        ];
        DB::table('events')->insert($param);
        
        $param = [
            'lab_id' => 1,
            'title' => '掃除',
            'date' => '2021-11-17',
            'start_at' => '11:00:00',
            'end_at' => '11:30:00',
            'repeat' => 2,
        ];
        DB::table('events')->insert($param);
        
        $param = [
            'lab_id' => 1,
            'title' => '進捗報告会',
            'date' => '2021-11-26',
            'start_at' => '13:00:00',
            'end_at' => '15:00:00',
            'repeat' => 3,
        ];
        DB::table('events')->insert($param);
        
    }
}
