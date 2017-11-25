<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
        $this->call(JenisRecordersTableSeeder::class);
        $this->call(JenisAlatsTableSeeder::class);
        $this->call(PengurusesTableSeeder::class);
    }
}
