@extends('layouts.master')

@section('body')
	<h1>Start New Meeting</h1>
	<p>Choose the players and hit start to start playing.</p>

	{{Form::open(['route' => 'meeting.create'])}}
		@foreach($players as $player)
			<div class="form-group">
				{{}}
			</div>
		@endforeach
	{{Form::close()}}
@stop