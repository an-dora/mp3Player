<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BangBaiNhac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_song', function (Blueprint $table) {
            $table->id();
            
            $table->string('tenbai')->nullable();
            $table->string('tacgia')->nullable();
            $table->string('tencasi')->nullable();
            $table->string('filehinh')->nullable();
            $table->string('filenhac')->nullable();
            
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
        Schema::dropIfExists('info_song');
    }
}
