<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('game_id')->unsigned();
			$table->integer('trump_id')->unsigned();
			$table->integer('point_value');
			$table->boolean('acheived');
			$table->timestamps();

			$table->foreign('game_id')->references('id')->on('games');
			$table->foreign('trump_id')->references('id')->on('trumps');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deals');
	}

}
