<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoicePortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voice_port', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voiceport_number');
            $table->string('central');
            $table->string('distribution');
            $table->string('voicepanel_number');
            $table->unsignedInteger('rack_id');
            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('cascade');
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
        Schema::dropIfExists('voice_port');
    }
}
