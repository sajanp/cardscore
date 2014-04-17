<h2>Scoreboard</h2>
<?php

foreach ($game->players->all() as $player) {
	$scores[$player->name] = $player->scores()->where('game_id', $game->id)->sum('amount');
}

arsort($scores);
?>

<table class="table table-condensed table-hover table-bordered">
	@foreach($scores as $player => $score)
		<tr>
			<td>{{$player}}</td>
			<td>{{$score}}</td>
		</tr>
	@endforeach
</table>