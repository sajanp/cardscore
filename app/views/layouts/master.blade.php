<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Rook Scoring System</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					{{HTML::linkRoute('home', 'Rook Scoring System', null, ['class' => 'navbar-brand'])}}
				</div>
			
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li>{{HTML::linkRoute('game.index', 'Games')}}</li>
						<li>{{HTML::linkRoute('player.index', 'Players')}}</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			<p class="alert alert-info">Feel free to play around, test, and tell me when you've broke things.  I will reset the data on Friday so you can start tracking your real data.</p>
			@include('partials.alerts')
			@yield('body')
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		@yield('footer-scripts')
	</body>
</html>

