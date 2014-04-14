<?php

class Player extends Eloquent {

	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function meetings()
	{
		return $this->belongsToMany('Meeting');
	}
}