<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('deal_id')->unsigned();
			$table->integer('game_id')->unsigned();
			$table->integer('player_id')->unsigned();
			$table->integer('amount');
			$table->boolean('caller')->default(false);
			$table->boolean('partner')->default(false);
			$table->timestamps();

			$table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade');
			$table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scores');
	}

}
