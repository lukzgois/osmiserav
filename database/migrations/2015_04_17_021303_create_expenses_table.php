<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table) {
            $table->increments('id');
            $table->double('value')->unsigned();
            $table->string('description');
            $table->integer('user_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->foreign('user_id')->references('users')->on('id');
            $table->foreign('owner_id')->references('users')->on('id');
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
		Schema::drop('expenses');
	}

}
