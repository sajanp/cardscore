@extends('layouts.master')

@section('body')
	<h1>New Deal In Game #{{$game->id}}</h1>

	{{Form::open(['route' => ['game.deal.store', $game->id]])}}
		<h2>The Call</h2>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{Form::label('calling_player_id', 'Player')}}
					{{Form::select('calling_player_id', $game->players->lists('name', 'id'), null, ['class' => 'form-control input-lg'])}}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{{Form::label('points_called', 'Points Called')}}
					<input type="number" name="points_called" class="form-control input-lg">
				</div>
			</div>
		</div>
	{{Form::close()}}
@stop