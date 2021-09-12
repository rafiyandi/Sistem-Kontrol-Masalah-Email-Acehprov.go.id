<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDataEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_email', function (Blueprint $table) {
            $table->id();
            $table->string('ni', 18);
            $table->string('gd', 10);
            $table->string('nama_p', 36);
            $table->string('gb', 30);
            $table->string('jabatan', 90);
            $table->string('hp', 12);
            $table->string('nama_e', 35);
            $table->string('kd_dinas', 2);
            $table->date('tanggal');
            $table->string('jenis');
            $table->string('gol', 5);
            $table->string('status', 10);
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
        Schema::dropIfExists('data_email');
    }
}
