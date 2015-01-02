<?php

class Adjustment extends Eloquent
{
	public function game()
	{
		return $this->belongsTo('Game');
	}

	public function player()
	{
		return $this->belongsTo('Player');
	}
}