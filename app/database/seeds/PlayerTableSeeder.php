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
			'name' => 'Akshay Mahadevia ',
		]);

		Player::create([
			'name' => 'Balvant Patel',
		]);

		Player::create([
			'name' => 'Deepak Shah',
		]);

		Player::create([
			'name' => 'Geeta Mahadevia',
		]);

		Player::create([
			'name' => 'Harshad Patel',
		]);

		Player::create([
			'name' => 'Himansu Parikh',
		]);

		Player::create([
			'name' => 'Kusum Patel (Bettendorf)',
		]);

		Player::create([
			'name' => 'Kusum Patel (Galesburg)',
		]);

		Player::create([
			'name' => 'Lalit Patel',
		]);

		Player::create([
			'name' => 'Navin Dadhaniya',
		]);

		Player::create([
			'name' => 'Neela Shah',
		]);

		Player::create([
			'name' => 'Punita Parikh',
		]);

		Player::create([
			'name' => 'Rasila Dadhaniya',
		]);

		Player::create([
			'name' => 'Suddha Patel',
		]);
	
	
	}

}