<?php

include __DIR__ . '/../../../vendor/autoload.php';

//$schema = new \SOB\SchemaLoader();	this uses SQLite

$settings = ['namespace' => 'PHPFUI', 'driver' => 'pgsql', 'description' => 'Postgre', 'port' => 5433, 'user' => 'postgres', 'password' => 'password'];

$config = new \SOB\Configuration($settings, 0);
$pdo = new \PHPFUI\ORM\PDOInstance($config->getPDOConnectionString(), $config->getUser(), $config->getPassword());

\PHPFUI\ORM::addConnection($pdo);
\PHPFUI\ORM::$namespaceRoot = __DIR__ . '/../../..';
\PHPFUI\ORM::$recordNamespace = 'SOB\PHPFUI\Record';
\PHPFUI\ORM::$tableNamespace = 'SOB\PHPFUI\Table';
\PHPFUI\ORM::$migrationNamespace = 'SOB\PHPFUI\Migration';
\PHPFUI\ORM::$idSuffix = '_id';

echo "Generate Record Models\n\n";

$generator = new \PHPFUI\ORM\Tool\Generate\CRUD();

$tables = \PHPFUI\ORM::getTables();

if (! \count($tables))
	{
	echo "No tables found. Check your database configuration settings.\n";

	exit;
	}

foreach ($tables as $table)
	{
	if ($generator->generate($table))
		{
		echo "{$table}\n";
		}
	}
