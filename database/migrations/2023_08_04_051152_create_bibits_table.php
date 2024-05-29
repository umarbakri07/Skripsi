<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggur')->unique();
            $table->string('nama_latin');
            $table->string('karakteristik');
            $table->string('waktu_berbuah');
            $table->string('asal');
            $table->string('harga');
            $table->string('gambar')->nullable();
            $table->string('keterangan');
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
        Schema::dropIfExists('bibits');
    }
};