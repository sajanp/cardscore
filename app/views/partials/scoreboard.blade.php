<h2>Scoreboard</h2>
<?php

foreach ($game->players->all() as $player) {
	$scores[$player->name] = $player->scores()->where('game_id', $game->id)->sum('amount') + $player->adjustments()->where('game_id', $game->id)->sum('amount');
}

arsort($scores);

$i = 1;
?>

<table class="table table-condensed table-hover table-striped">
	@foreach($scores as $player => $score)
		<tr>
			<td>#{{$i}} {{$player}}</td>
			<td>{{$score}}</td>
		</tr>

		<?php $i++; ?>
	@endforeach
</table>

@if($game->created_at->gt(\Carbon\Carbon::now()->subHours(16)))
	{{HTML::linkRoute('game.adjustment.create', 'Make Scoring Adjustment', $game->id, ['class' => 'pull-right btn btn-xs btn-warning pull-right hidden-sm hidden-xs'])}}
@endif