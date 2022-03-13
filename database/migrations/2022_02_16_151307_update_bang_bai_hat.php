<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBangBaiHat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_song', function (Blueprint $table) {
            $table->unsignedBigInteger("id_theloai")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_song', function (Blueprint $table) {
            $table->dropColumn("id_theloai");
            $table->dropColumn('theloai');
        });
    }
}
