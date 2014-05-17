@extends('layouts.master')

@section('body')
	<h1>Game #{{$game->id}}</h1>

	<p>
		Started: {{$game->created_at->toDayDateTimeString()}}
		@if($game->created_at->gt(\Carbon\Carbon::now()->subHours(16)))
			{{HTML::linkRoute('game.deal.create', 'Deal Into This Game', $game->id, ['class' => 'pull-right btn btn-primary pull-right hidden-sm hidden-xs'])}}
		@endif
	</p>

	<div class="row">
		<div class="col-md-3 visible-sm visible-xs">
			@include('partials.scoreboard')
		</div>
		<div class="col-md-5">
			<h2>Deal History</h2>
			<?php $i = $game->deals()->count(); ?>
			@foreach($game->deals()->orderBy('created_at', 'desc')->get() as $deal)
				<div class="row">
					<div class="col-md-3 col-xs-3">
						<img src="{{asset('img/profiles/' . $deal->scores()->where('caller', true)->first()->player->id . '.jpg')}}" alt="profile" class="img-responsive img-rounded" style="margin:5px">
					</div>
					<div class="col-md-9 col-xs-9">
						<h4>{{$deal->scores()->where('caller', true)->first()->player->name}}</h4>
						<span class="label {{$deal->acheived ? 'label-success' : 'label-danger'}}">{{$deal->trump->name}} - {{$deal->high ? 'High' : 'Low'}} - {{$deal->point_value}}</span>
						<p>
							@foreach($deal->scores()->where('partner', true)->get() as $partner)
								<span class="label label-default">{{$partner->player->name}}</span>
							@endforeach
						</p>
						<small style="color:grey"><i>{{$deal->created_at->format('h:i A')}} - Deal #{{$i}}</i></small>
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
		<div class="col-md-3 hidden-sm hidden-xs">
			@include('partials.scoreboard')
		</div>
	</div>
@stop

@section('footer-scripts')
	<script>
		$('form').submit(function() {
			var c = confirm("Click OK To Confirm Deleting That Deal.");
			return c;
		});
		
		setTimeout(function(){
			location = ''
		}, 60000);
	</script>
@stop