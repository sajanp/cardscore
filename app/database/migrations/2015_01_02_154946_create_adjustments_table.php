<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('player_id')->unsigned();
			$table->integer('game_id')->unsigned();
			$table->integer('amount');
			$table->string('note')->nullable();
			$table->timestamps();

			$table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade');
			$table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adjustments');
	}

}
