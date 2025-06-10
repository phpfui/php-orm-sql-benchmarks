<?php
return [
	'iterations' => 1, // default is 5000
	'tests' => [
		['namespace' => 'Cake', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'Cake', 'description' => 'sqlite::file:', 'dbname' => 'cake.sqlite'],
		['namespace' => 'Cake', 'driver' => 'mysql', 'description' => 'MySQL'],
		['namespace' => 'Cake', 'driver' => 'mysql', 'description' => 'MariaDB', 'port' => 3307],
		['namespace' => 'CakeCached', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'CakeCached', 'description' => 'sqlite::file:', 'dbname' => 'cakecached.sqlite'],
		['namespace' => 'CakeCached', 'driver' => 'mysql', 'description' => 'MySQL'],
		['namespace' => 'CakeCached', 'driver' => 'mysql', 'description' => 'MariaDB', 'port' => 3307],
		['namespace' => 'Doctrine', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'Doctrine', 'description' => 'sqlite::file:', 'dbname' => 'doctrine.sqlite'],
		['namespace' => 'Doctrine', 'driver' => 'mysql', 'description' => 'MySQL'],
		['namespace' => 'Doctrine', 'driver' => 'mysql', 'description' => 'MariaDB', 'port' => 3307],
		['namespace' => 'Eloquent', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'Eloquent', 'description' => 'sqlite::file:', 'dbname' => 'eloquent.sqlite'],
		['namespace' => 'Eloquent', 'driver' => 'mysql', 'description' => 'MySQL'],
		['namespace' => 'Eloquent', 'driver' => 'mysql', 'description' => 'MariaDB', 'port' => 3307],
		['namespace' => 'PHPFUI', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'PHPFUI', 'description' => 'sqlite::file:', 'dbname' => 'phpfui.sqlite'],
		['namespace' => 'PHPFUI', 'driver' => 'mysql', 'description' => 'MySQL'],
		['namespace' => 'PHPFUI', 'driver' => 'mysql', 'description' => 'MariaDB', 'port' => 3307],
	],
];

