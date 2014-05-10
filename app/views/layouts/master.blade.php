<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Rook Scoring System</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container-fluid">
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
				</div>
			</nav>
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

