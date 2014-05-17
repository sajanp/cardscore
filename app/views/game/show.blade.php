@extends('layouts.master')

@section('body')
	<h1>
		Game #{{$game->id}} <small>{{$game->created_at->toDayDateTimeString()}}</small>
		@if($game->created_at->gt(\Carbon\Carbon::now()->subHours(16)))
			{{HTML::linkRoute('game.deal.create', 'Deal Into This Game', $game->id, ['class' => 'pull-right btn btn-primary pull-right'])}}
		@endif
	</h1>

	<p></p>

	<div class="row">
		<div class="col-md-5">
			<h2>Deal History</h2>
				<?php $i = $game->deals()->count(); ?>
				@foreach($game->deals()->orderBy('created_at', 'desc')->get() as $deal)
					<div class="row">
						<div class="col-md-3 col-xs-3">
							<img src="{{asset('img/profile.jpg')}}" alt="profile" class="img-responsive img-rounded" style="margin:5px">
						</div>
						<div class="col-md-9 col-xs-9">
							<h4>
								{{$deal->scores()->where('caller', true)->first()->player->name}}
								<small>{{$deal->created_at->format('h:i A')}} - #{{$i}}</small>
							</h4>
											
							<table class="table">
								<tbody>
									<tr class="{{$deal->acheived ? 'success' : 'danger'}}">
										<td>&hearts;</td>
										<td>{{$deal->high ? 'High' : 'Low'}}</td>
										<td>
											@if($deal->acheived)
												{{$deal->point_value}}
											@else
												{{$deal->point_value}}
											@endif
										</td>
									</tr>
								</tbody>
							</table>

							<p>
								@foreach($deal->scores()->where('partner', true)->get() as $partner)
									<span class="label label-default">{{$partner->player->name}}</span>
								@endforeach
							</p>

							@if($deal->created_at->gt(\Carbon\Carbon::now()->subMinutes(2)))
								{{Form::open(['method' => 'delete', 'route' => ['game.deal.destroy', $game->id, $deal->id]])}}
									{{Form::submit('Delete', ['class' => 'btn btn-danger btn-xs pull-right'])}}
								{{Form::close()}}
							@endif
						</div>
					</div>
					<hr>
					<?php $i--; ?>			
				@endforeach
		</div>
	</div>
@stop

@section('footer-scripts')
	<script>
		$('form').submit(function() {
			var c = confirm("Click OK To Confirm Deleting That Deal.");
			return c;
		});
	</script>
@stop