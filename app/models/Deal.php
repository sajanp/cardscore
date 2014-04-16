<?php

class Deal extends Eloquent {

	protected $guarded = ['id', 'created_at', 'updated_at'];
	protected $touches = ['game'];

	public function trump()
	{
		return $this->belongsTo('Trump');
	}

	public function game()
	{
		return $this->belongsTo('Game');
	}

	public function scores()
	{
		return $this->hasMany('Score');
	}

}