<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealPlayerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deal_player', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('deal_id')->unsigned();
			$table->integer('player_id')->unsigned();
			$table->boolean('caller')->default(false);
			$table->boolean('partner')->default(false);

			$table->foreign('deal_id')->references('id')->on('deals');
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
		Schema::drop('deal_player');
	}

}
