<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveToPlayers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('players', function($table)
		{
			$table->boolean('active')->default(true)->after('name');
		});

		foreach (Player::all() as $player)
		{
			$player->active = true;
			$player->save();
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('players', function($table)
		{
			$table->dropColumn('active');
		});
	}

}
