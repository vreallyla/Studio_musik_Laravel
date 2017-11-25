<?php

use Illuminate\Database\Seeder;

class JenisAlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\jen_alat::class, 2)->create();
    }
}
