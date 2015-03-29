<?php

class TrumpTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		Trump::create([
			'name' => 'Spades',
			'short_name' => 'S'
		]);

		Trump::create([
			'name' => 'Clubs',
			'short_name' => 'C'
		]);

		Trump::create([
			'name' => 'Hearts',
			'short_name' => 'H'
		]);

		Trump::create([
			'name' => 'Diamonds',
			'short_name' => 'D'
		]);

		Trump::create([
			'name' => 'No Trump',
			'short_name' => 'N/A'
		]);
	
	}

}