@extends('layouts.master')

@section('body')
	<h1>Make Scoring Adjustment</h1>

	{{Form::open(['route' => ['game.adjustment.store', $game->id], 'id' => 'new-adjustment-form'])}}

		<div class="form-group">
			{{Form::label('player_id', 'Player')}}
			{{Form::select('player_id', $game->players->lists('name', 'id'), null, ['class' => 'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('amount', 'Amount')}}
			{{Form::number('amount', null, ['class' => 'form-control'])}}
		</div>

		<div class="radio">
			<label>
				{{Form::radio('adjustmentType', 0, true)}}
				Penalty (Minus/Subtract Points)
			</label>
		</div>

		<div class="radio">
			<label>
				{{Form::radio('adjustmentType', 1, false)}}
				Bonus Points (Add/Increase Points)
			</label>
		</div>

		<div class="form-group">
			{{Form::label('note', 'Note (optional)')}}
			{{Form::text('note', null, ['class' => 'form-control'])}}
		</div>

		{{Form::submit('Make Scoring Adjustment', ['class' => 'btn btn-danger btn-lg pull-right'])}}
	{{Form::close()}}
@stop

@section('footer-scripts')
	<script>
		$('#new-adjustment-form').submit(function(){
		    $('input[type=submit]').prop('disabled', true);
		    $('input[type=submit]').prop('value', 'Working...');
		});

		$('#new-adjustment-form').bind("keyup keypress", function(e) {
			var code = e.keyCode || e.which; 
			if (code  == 13) {               
				e.preventDefault();
				return false;
			}
		});
	</script>
@stop