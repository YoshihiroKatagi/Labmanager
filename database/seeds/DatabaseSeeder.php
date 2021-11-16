<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LabsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LabtasksTableSeeder::class);
        $this->call(MytasksTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
    }
}
