<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRacksTable.
 */
class CreateRacksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('racks', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('size');
			$table->foreign('local')->references('id')->on('locals')->onDelete('cascade');
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
		Schema::drop('racks');
	}
}
