<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPelapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontrol', function (Blueprint $table) {
            $table->string('pelapor', 20);
            $table->string('no_hp', 13);
            $table->string('email', 35);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontrol', function (Blueprint $table) {
            $table->dropColumn(['pelapor','no_hp','email']);
            //
        });
    }
}
