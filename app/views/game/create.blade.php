@extends('layouts.master')

@section('body')
	<h1>Start New Game</h1>
	<p>Choose the players to start playing.</p>

	{{Form::open(['route' => 'game.store', 'id' => 'new-game-form'])}}
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

@section('footer-scripts')
	<script>
		$('#new-game-form').submit(function(){
		    $('input[type=submit]').prop('disabled', true);
		    $('input[type=submit]').prop('value', 'Working...');
		});

		$('#new-game-form').bind("keyup keypress", function(e) {
			var code = e.keyCode || e.which; 
			if (code  == 13) {               
				e.preventDefault();
				return false;
			}
		});
	</script>
@stop