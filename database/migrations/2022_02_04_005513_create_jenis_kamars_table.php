<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_kamar');
            $table->integer('tarif_per_malam');
            $table->text('fasilitas');
            $table->string('foto')->default('foto.jpeg');
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
        Schema::dropIfExists('jenis_kamars');
    }
}
