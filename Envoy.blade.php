@servers(['production' => "-p 59967 asari.sajan.io"])

@task('deploy', ['on' => 'production'])
	export APP_ENV=production
	cd www/cardscore.in
	git pull
	php artisan migrate
@endtask