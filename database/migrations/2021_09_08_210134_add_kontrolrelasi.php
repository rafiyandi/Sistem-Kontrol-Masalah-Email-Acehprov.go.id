<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKontrolrelasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontrol', function (Blueprint $table) { /**uNTUK MENAMBAH DATA KE DATABASE */
            $table->integer('skpa_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontrol', function (Blueprint $table) { /**uNTUK  */
            $table->dropColumn(['skpa_id']);
            //
        });
    }
}
