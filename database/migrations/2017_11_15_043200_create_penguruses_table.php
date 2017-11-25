<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengurusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penguruses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pengurus');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('gambar_pengurus')->nullable();
            $table->enum('status_pengurus',array('pegawai','owner'));
            $table->rememberToken();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penguruses');
    }
}
