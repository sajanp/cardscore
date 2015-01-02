<?php

class Game extends Eloquent {

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function players()
	{
		return $this->belongsToMany('Player');
	}

	public function deals()
	{
		return $this->hasMany('Deal');
	}

	public function scores()
	{
		return $this->hasMany('Score');
	}

	public function adjustments()
	{
		return $this->hasMany('Adjustment');
	}
}