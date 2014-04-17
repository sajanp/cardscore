@extends('layouts.master')

@section('body')
	<h1>Game #{{$game->id}} <small>{{$game->updated_at->diffForHumans()}}</small> {{HTML::linkRoute('game.deal.create', 'Deal Into This Game', $game->id, ['class' => 'pull-right btn btn-primary pull-right'])}}</h1>

	<p></p>

	<div class="row">
		<div class="col-md-9">
			<h2>Deal History</h2>

			<div class="table-responsive">
				<table class="table table-hover table-bordered table-condensed">
					<thead>
						<tr>
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
								<td>{{$deal->created_at->diffForHumans()}}</td>
								<td>{{$deal->trump->name}}</td>
								<td>{{$deal->point_value}}</td>
								<td>{{$deal->scores()->where('caller', true)->first()->player->name}}</td>
								<td>
									<p>
										@foreach($deal->scores()->where('partner', true)->get() as $partner)
											{{$partner->player->name}}
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
			@include('partials.scoreboard')
		</div>
	</div>

			
@stop