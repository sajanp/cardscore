@extends('layouts.master')

@section('body')
	<div class="alert alert-danger">
		<p>I added the ability to add/remove points during the game and the location, but there was a small bug so it will not be fixed and added until after the new year.  Sorry.</p>
	</div>

	<p>{{HTML::linkRoute('game.create', 'New Game', null, ['class' => 'btn btn-primary'])}}</p>
@stop