<?php

class Game extends Eloquent {

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function players()
	{
		return $this->belongsToMany('Player');
	}
}