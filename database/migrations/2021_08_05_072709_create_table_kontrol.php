<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKontrol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrol', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('jam');
            $table->string('server');
            $table->text('deskripsi_masalah');
            $table->enum('kategori', ['Spam', 'Server']);
            $table->text('deskripsi_penyelesaian');
            $table->string('koordinasi');
            $table->string('ket');
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
        Schema::dropIfExists('kontrol');
    }
}
