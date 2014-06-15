<div class="row">
	<div class="col-md-6">
		<h4>Deals Called</h4>

		<?php

			foreach ($game->players->all() as $player)
			{
				if (Score::where('caller', true)->where('player_id', $player->id)->where('game_id', $game->id)->count())
				{
					$deals[$player->name] = Score::where('caller', true)->where('player_id', $player->id)->where('game_id', $game->id)->count();
				}

			}

			if (isset($deals))
			{
				arsort($deals);
			}
			else
			{
				$deals = array();
			}

		?>

		<table class="table table-condensed">
			<tbody>
				@foreach($deals as $player => $deals)
					<tr>
						<td>{{$player}}</td>
						<td>{{number_format($deals)}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<?php unset($deals); ?>
	</div>

	<div class="col-md-6">
		<h4>Deals Per Trump</h4>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Trump</th>
						<th># of Deals</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Trump::all() as $trump)
					<tr>
						<td>{{$trump->name}}</td>
						<td>{{number_format(Deal::where('trump_id', $trump->id)->where('game_id', $game->id)->count())}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	</div>

	<div class="col-md-6">
		<h4>High/Low Deals</h4>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>
							High
						</th>
						<td>
							{{Deal::where('high', true)->where('game_id', $game->id)->count()}}
						</td>
					</tr>
					<tr>
						<th>
							Low
						</th>
						<td>
							{{Deal::where('high', false)->where('game_id', $game->id)->count()}}
						</td>
					</tr>
				</thead>
			</table>
	</div>
</div>
