@extends('layouts.master')

@section('body')
	<h1>Start New Game</h1>
	<p>Choose the players to start playing.</p>

	{{Form::open(['route' => 'game.store'])}}
		@foreach($players as $player)
			<div class="form-group">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="players[]" value="{{$player->id}}">
						{{$player->name}}
					</label>
				</div>
			</div>
		@endforeach

		{{Form::submit('Start Game', ['class' => 'btn btn-success btn-lg'])}}
	{{Form::close()}}
@stop