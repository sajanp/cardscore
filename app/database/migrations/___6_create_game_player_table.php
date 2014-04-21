<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamePlayerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_player', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('game_id')->unsigned();
			$table->integer('player_id')->unsigned();

			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('player_id')->references('id')->on('players');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('game_player');
	}

}
