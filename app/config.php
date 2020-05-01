<?php

return [
	'base_dir' => realpath(__DIR__."/../"),
	'base_url' => 'http://localhost/personal/sender',
	'default_route' => 'welcome',

	'database' => [
		'host'	=> getenv('HOST'),
		'user'	=> getenv('USER'),
		'pass'	=> getenv('PASS'),
		'db'	=> getenv('DB')
	]
];