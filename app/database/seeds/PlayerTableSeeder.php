<?php

class PlayerTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Player::create([
			'name' => 'Himansu Parikh',
		]);

		Player::create([
			'name' => 'Navin Dadhaniya',
		]);

		Player::create([
			'name' => 'Rasila Dadhaniya',
		]);

		Player::create([
			'name' => 'Punita Parikh',
		]);

		Player::create([
			'name' => 'Harshad Patel',
		]);

		Player::create([
			'name' => 'Suddha Patel',
		]);

		Player::create([
			'name' => 'Neela Patel',
		]);

		Player::create([
			'name' => 'Deepak Patel',
		]);
	
	}

}