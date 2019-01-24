<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePatchesTable.
 */
class CreatePatchesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patches', function(Blueprint $table) {
            $table->increments('id');
			$table->string('label');
			$table->integer('number');
			$table->unsignedInteger('switch_port')->nullable();
			$table->unsignedInteger('rack_id');
			$table->foreign('rack_id')->references('id')->on('racks');
			$table->unsignedInteger('local_id');
			$table->foreign('local_id')->references('id')->on('locals');
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
		Schema::drop('patches');
	}
}
