@extends('layouts.master')

@section('body')
	<h1>New Deal In Game #{{$game->id}}</h1>

	<div class="row">
		<div class="col-md-9">
			<h3>The Call</h3>
			{{Form::open(['route' => ['game.deal.store', $game->id], 'id' => 'new-deal-form'])}}

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						{{Form::label('caller_id', 'Calling Player')}}
						{{Form::select('caller_id', $game->players->lists('name', 'id'), null, ['class' => 'form-control input-lg'])}}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{{Form::label('trump_id', 'Trump Suit')}}
						{{Form::select('trump_id', Trump::lists('name', 'id'), null, ['class' => 'form-control input-lg'])}}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{{Form::label('point_value', 'Points Called')}}
						<input type="number" name="point_value" class="form-control input-lg">
					</div>
				</div>
			</div>

			

			<div class="row">
				<div class="col-md-6">
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
				</div>
				<div class="col-md-6">
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
				</div>
			</div>

			<hr>

			<div class="form-group">
				{{Form::submit('Post Deal', ['class' => 'btn btn-success btn-lg'])}}
			</div>

			{{Form::close()}}
		</div>
		<div class="col-md-3">
			<h3>Game Score</h3>
			<ul>
				@foreach($game->players->all() as $player)
					<li>
						{{$player->name}} - {{$player->scores()->where('game_id', $game->id)->sum('amount')}}
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@stop

@section('footer-scripts')
	<script>
		$('#new-deal-form').submit(function(){
		    $(this).children('input[type=submit]').prop('disabled', true);
		});

		$('#new-deal-form').bind("keyup keypress", function(e) {
			var code = e.keyCode || e.which; 
			if (code  == 13) {               
				e.preventDefault();
				return false;
			}
		});
	</script>
@stop