<?php

class Player extends Eloquent {

	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function games()
	{
		return $this->belongsToMany('Game');
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