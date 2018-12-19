<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('token_secret')->nullable();
            $table->string('codpes');
            $table->string('email_usp')->nullable();
            $table->string('email_alternatvo')->nullable();
            $table->string('telefone')->nullable();
            $table->json('vinculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 
    }
}
