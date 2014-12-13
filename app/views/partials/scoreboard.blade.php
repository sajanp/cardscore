<h2>Scoreboard</h2>
<?php

foreach ($game->players->all() as $player) {
	$scores[$player->name] = $player->scores()->where('game_id', $game->id)->sum('amount');
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