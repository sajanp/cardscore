@extends('layouts.master')

@section('body')
	<h1>New Deal In Game #{{$game->id}}</h1>

			{{Form::open(['route' => ['game.deal.store', $game->id]])}}

			<h3>The Call</h3>

			<div class="form-group">
				{{Form::label('caller_id', 'Player')}}
				{{Form::select('caller_id', $game->players->lists('name', 'id'), null, ['class' => 'form-control input-lg'])}}
			</div>

			<div class="form-group">
				@foreach($trumps as $trump)
					<div class="radio">
						<label>
							<input type="radio" name="trump_id" id="trump-{{$trump->id}}" value="{{$trump->id}}">
							{{$trump->name}}
						</label>
					</div>
				@endforeach
			</div>

			<div class="form-group">
				{{Form::label('point_value', 'Points Called')}}
				<input type="number" name="point_value" class="form-control input-lg">
			</div>

			<h3>The Partners</h3>

			<div class="form-group">
				@foreach($game->players as $player)
					<div class="checkbox">
						<label>
							<input type="checkbox" name="partners[]" value="{{$player->id}}">
							{{$player->name}}
						</label>
					</div>
				@endforeach
			</div>

			<div class="form-group">
				<h3>Points Acheived?</h3>
				<div class="radio">
					<label>
						<input type="radio" name="acheived" value="1">
						Yes
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="acheived" value="0">
						No
					</label>
				</div>
			</div>

			<div class="form-group">
				{{Form::submit('Complete Deal', ['class' => 'btn btn-success btn-lg'])}}
			</div>

		{{Form::close()}}
@stop