<?php

use Illuminate\Database\Seeder;

class JenisRecordersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\jenis_recorder::class, 3)->create();
    }
}
