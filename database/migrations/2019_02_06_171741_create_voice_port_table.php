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
        Schema::create('voice_ports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voiceport_number');
            $table->integer('central');
            $table->integer('distribution');
            $table->unsignedInteger('rack_id');
            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('cascade');
            $table->unsignedInteger('patch_id')->nullable();
            $table->foreign('patch_id')->references('id')->on('patches')->onDelete('set null');
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
        Schema::dropIfExists('voice_ports');
    }
}
