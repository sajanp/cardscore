@extends('layouts.master')

@section('body')
	<h1>New Deal In Game #{{$game->id}} {{HTML::linkRoute('game.show', 'Back To Game Summary', $game->id, ['class' => 'pull-right btn btn btn-danger'])}}</h1>

	@foreach($errors->all() as $error)
		<p class="alert alert-danger">{{$error}}</p>
	@endforeach

	<div class="row">
		<div class="col-md-9">
			<h2>The Call</h2>
			{{Form::open(['route' => ['game.deal.store', $game->id], 'id' => 'new-deal-form'])}}

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						{{Form::label('caller_id', 'Calling Player')}}
						{{Form::select('caller_id', ['default' => 'Select Player'] + $game->players->lists('name', 'id'), null, ['class' => 'form-control input-lg'])}}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{{Form::label('trump_id', 'Trump Suit')}}
						{{Form::select('trump_id', ['default' => 'Select Trump'] + Trump::lists('name', 'id'), null, ['class' => 'form-control input-lg'])}}
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
					<h2>The Partners</h2>
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
						<h2>High or Low</h2>
						<div class="radio">
							<label>
								<input type="radio" name="high" value="1">
								High
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="high" value="0">
								Low
							</label>
						</div>
					</div>
					<div class="form-group">
						<h2>Points Acheived?</h2>
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
			@include('partials.scoreboard')
		</div>
	</div>
@stop

@section('footer-scripts')
	<script>
		$('#new-deal-form').submit(function(){
		    $('input[type=submit]').prop('disabled', true);
		    $('input[type=submit]').prop('value', 'Working...');
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