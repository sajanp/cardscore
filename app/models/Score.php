<?php

class Score extends Eloquent {

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function game()
	{
		return $this->belongsTo('Game');
	}

	public function deal()
	{
		return $this->belongsTo('Deal');
	}

	public function player()
	{
		return $this->belongsTo('Player');
	}

}