@extends('layouts.master')

@section('body')
	<h1>Game #{{$game->id}} <small>{{$game->created_at}}</small></h1>

	<p>{{HTML::linkRoute('game.deal.create', 'Deal Into This Game', $game->id, ['class' => 'pull-right btn btn-primary btn-lg btn-block'])}}</p>

	<div class="row">
		<div class="col-md-9">
			<h2>Deal History</h2>

			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Time</th>
							<th>Trump</th>
							<th>Points</th>
							<th>Caller</th>
							<th>Partners</th>
							<th>Acheived</th>
						</tr>
					</thead>
					<tbody>
						@foreach($game->deals()->orderBy('created_at', 'desc')->get() as $deal)
							<tr>
								<td>{{$deal->id}}</td>
								<td>{{$deal->created_at->diffForHumans()}}</td>
								<td>{{$deal->trump->name}}</td>
								<td>{{$deal->point_value}}</td>
								<td>{{$deal->players()->where('caller', true)->first()->name}}</td>
								<td>
									<p>
										@foreach($deal->players()->where('partner', true)->get() as $partner)
											{{$partner->name}} <br>
										@endforeach
									</p>
								</td>
								<td>
									@if($deal->acheived)
										<p class="text-success">YES</p>
									@else
										<p class="text-danger">NO</p>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-3">
			<h2>Players</h2>
			<ul>
			<pre></pre>
				@foreach($game->players->all() as $player)
					<li>
					{{$player->name}} - {{$player->deals()->wherePivot('partner', '=', true)->orWherePivot('caller', '=', true)->wherePivot('player_id', '=', $player->id)->where('acheived', '=', true)->where('game_id', '=', $game->id)->sum('point_value') + $player->deals()->wherePivot('partner', '=', false)->wherePivot('caller', '=', false)->wherePivot('player_id', '=', $player->id)->where('acheived', '=', false)->where('game_id', '=', $game->id)->sum('point_value')}}
					</li>
				@endforeach
			</ul>
		</div>
	</div>

			
@stop