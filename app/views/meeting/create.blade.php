@extends('layouts.master')

@section('body')
	<h1>Start New Meeting</h1>
	<p>Choose the players and hit start to start playing.</p>

	{{Form::open(['route' => 'meeting.store'])}}
		@foreach($players as $player)
			<div class="checkbox">
				<label>
					<input type="checkbox" name="players[]" value="{{$player->id}}">
					{{$player->name}}
				</label>
			</div>
		@endforeach

		{{Form::submit('Start Meeting', ['class' => 'btn btn-success btn-lg'])}}
	{{Form::close()}}
@stop