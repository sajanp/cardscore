<?php

class Player extends Eloquent {

	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function deals()
	{
		return $this->belongsToMany('Deal')->withPivot('caller', 'partner');
	}
}