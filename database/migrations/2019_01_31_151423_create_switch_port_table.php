<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwitchPortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switch_port', function (Blueprint $table) {
            $table->increments('id');
            $table->string('port_number');
            $table->boolean('poe')->default(0);
            $table->boolean('poe_status')->default(0);
            $table->string('vlan')->nullable();
            $table->string('switch_name');
            $table->string('switch_brand');
            $table->string('switch_code');
            $table->string('stack_name');
            $table->string('stack_ip');
            $table->integer('rack_id')->unsigned();
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
        Schema::dropIfExists('switch_port');
    }
}
