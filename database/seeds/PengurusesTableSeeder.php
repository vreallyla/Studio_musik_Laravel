<?php

use Illuminate\Database\Seeder;

class PengurusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\pengurus::class, 2)->create();
    }
}
